<?php

namespace App\Controllers;

use App\Models\CategoryModel;
use App\Models\ThumbnailModel;
use App\Models\ReviewModel;

class ThumbnailController extends BaseController
{
   public function __construct()
  {
   
     $session = session(); 
        if (!$session->get('isLoggedIn')) {
          
            return redirect()->to('login');
        }
  }

  public function index()
  {
    $session = session();
    if (!$session->get('isLoggedIn')) {
      return redirect()->to('category/login');
    }
    $this->videothumbnails = new ThumbnailModel;
    $this->data['videothumbnails'] = $this->videothumbnails->getThumbnail();
    
    return view('thumbnail/thumbnail', $this->data);
  }
public function getThumbnails()
    {
        $this->videothumbnails = new ThumbnailModel;
    $this->data['videothumbnails'] = $this->videothumbnails->getThumbnail();

        return $this->response->setJSON([
            "data" => $data
        ]);
    }
    
  public function addthumbnail()
  {
    $this->categories = new CategoryModel;
    $this->data['categories']  = $this->categories->getCategories();
    return view('thumbnail/addthumbnail', $this->data);
  }
  public function save()
  {
    $videothumbnails = new ThumbnailModel();

    $image = $this->request->getFile('image');
    $imageName = 'defaultimage.jpg';
    if ($image && $image->isValid() && !$image->hasMoved()) {
      $imageName = time() . '_' . $image->getClientName();
      $image->move(ROOTPATH . 'public/uploads/trainings/images', $imageName);
      $data['image'] = $imageName;
    }
    $data = [
      'title'    => $this->request->getPost('title'),
      'category_id'    => $this->request->getPost('category_name'),
      'image'    => $imageName,
      'ytvideolink'    => $this->request->getPost('ytvideolink'),
      'likes'    => 0,
      'metatags'    => $this->request->getPost('metatags'),
      'metadescriptions'    => $this->request->getPost('metadescriptions'),
      'status'      =>  $this->request->getPost('status'),
    ];
    $videothumbnails->saveThumbnail($data);
    return redirect()->to(base_url('thumbnail/thumbnail'))->with('status', 'User Added Successfully');
  }
  public function  editthumbnail($id)
  {
    $this->videothumbnails = new ThumbnailModel;
    $this->data['videothumbnails'] = $this->videothumbnails->getThumbnailById($id);

    $this->categories = new CategoryModel;
    $this->data['categories']  = $this->categories->getCategories();

    return view('thumbnail/editthumbnail', $this->data);
  }
  public function updatethumbnail($id)
  {
    $videothumbnails = new ThumbnailModel();
    $data = [
      'title'    => $this->request->getPost('title'),
      'category_id'    => $this->request->getPost('category_name'),
      'image'    => $this->request->getPost('image'),
      'metatags'    => $this->request->getPost('metatags'),
      'metadescriptions'    => $this->request->getPost('metadescriptions'),
      'status'      => $this->request->getPost('status')
    ];
    $videothumbnails->updateThumbnail($id, $data);
    return redirect()->to(base_url('thumbnail/thumbnail'))->with('status', 'User Updated Successfully');
  }

  public function deletethumbnail($id)
  {
    $this->videothumbnails = new ThumbnailModel();
    $isDeleted = $this->videothumbnails->deleteThumbnail($id);
    return redirect()->to(base_url('thumbnail/thumbnail'))->with('status', 'User Deleted Successfully');
  }

  public function inactivethumbnail($id, $status)
  {
    $this->videothumbnails = new ThumbnailModel();
    $isInactive = $this->videothumbnails->inactiveThumbnail($id, $status);
    return redirect()->to('thumbnail/thumbnail')->with('message', 'User marked as inactive');
  }

public function likes()
{
  $this->videothumbnails = new ThumbnailModel();
  $this->videothumbnails->like($this->request->getPost('thumbnail_id'));
  return $this->response->setJSON([
    "status" => "success"
  ]);
  
} 
  


  public function thumbnailByCategoryID($id)

  {

    $this->videothumbnails = new ThumbnailModel();
    $this->data['videothumbnails'] = $this->videothumbnails->getthumbnailByCategoryID($id);
    $this->reviews = new ReviewModel();
    $this->data['reviews'] = $this->reviews->getReviewByThumbnailID($id);

    //  $this->categories = new CategoryModel;
    //   $this->data['categories']  = $this->categories->getCategories();
    //    $this->data = [
    //       'videothumbnails' => $videothumbnails->where('category_id', $id)->findAll(),
    //       'category'        => $category
    //];
    return view('thumbnail/bycategory', $this->data);
  }
  
}
