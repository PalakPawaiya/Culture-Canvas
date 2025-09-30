<?php

namespace App\Controllers;

use App\Models\CategoryModel;
use App\Models\PptModel;
use App\Models\ReviewModel;
use App\Models\PptDownloadModel;
use App\Models\DownloadModel;

class PptController extends BaseController
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
    $this->ppts = new PptModel;
    $this->data['ppts'] = $this->ppts->getppt();
    return view('ppt/ppt', $this->data);
  }

  public function addppt()
  {
    $this->categories = new CategoryModel;
    $this->data['categories']  = $this->categories->getCategories();
    return view('ppt/addppt', $this->data);
  }
  public function save()
  {
    $ppts = new PptModel();
   
    $image = $this->request->getFile('image');
      $imageName = 'defaultimage.jpg';
    if ($image && $image->isValid() && !$image->hasMoved()) {
      $imageName = time() . '_' . $image->getClientName();
      $image->move(ROOTPATH . 'public/uploads/trainings/images', $imageName);
      $data['image'] = $imageName;
   
     $file = $this->request->getFile('filename');

    $pptName = null;

    if ($file && $file->isValid() && !$file->hasMoved()) {
        $pptName = time() . '_' . $file->getClientName();
        $file->move(ROOTPATH . 'public/uploads/ppts/', $pptName);
    }
      
     $data = [

      'title'    => $this->request->getPost('title'),
      'category_id'    => $this->request->getPost('category_name'),
      'metatags'    => $this->request->getPost('metatags'),
      'metadescriptions'    => $this->request->getPost('metadescriptions'),
      'ytvideolink'    => $this->request->getPost('ytvideolink'),
      'image'    => $imageName,
      'filename'    => $pptName,
      
      'status'      => $this->request->getPost('status')
    ];
    
    $ppts->saveppt($data);
    return redirect()->to(base_url('ppt/ppt'))->with('status', 'User Added Successfully');
  
    }
  }


  public function  editppt($id)
  {
    $this->ppts = new PptModel;
    $this->data['ppts'] = $this->ppts->getPptById($id);

    $this->categories = new CategoryModel;
    $this->data['categories']  = $this->categories->getCategories();

    return view('ppt/editppt', $this->data);
  }
  public function updateppt($id)
  {
    $ppts = new PptModel();
    $data = [
      'title'    => $this->request->getPost('title'),
      'category_id'    => $this->request->getPost('category_id'),
      'metatags'    => $this->request->getPost('metatags'),
      'metadescriptions'    => $this->request->getPost('metadescriptions'),
      'image'    => $this->request->getPost('image'),
      'ytvideolink'    => $this->request->getPost('ytvideolink'),
      'status'      => $this->request->getPost('status')
    ];
    $ppts->updateppt($id, $data);
    return redirect()->to(base_url('ppt/ppt'))->with('status', 'User Updated Successfully');
  }

  public function deleteppt($id)
  {
    $this->ppts = new PptModel();
    $isDeleted = $this->ppts->deleteppt($id);
    return redirect()->to(base_url('ppt/ppt'))->with('status', 'User Deleted Successfully');
  }

  public function inactiveppt($id, $status)
  {
    $this->ppts = new PptModel();
    $isInactive = $this->ppts->inactiveppt($id, $status);
    return redirect()->to('ppt/ppt')->with('message', 'User marked as inactive');
  }

   public function PptByCategoryID($id)
 {
 
  $this->ppts = new PptModel();
  
  $this->data['ppts'] = $this->ppts->getPptByCategoryID($id);
   $this->downloads = new DownloadModel;
        $this->data['totalDownloads'] = $this->downloads->countDownloads();
        $this->data['downloadsById'] = $this->downloads->countDownloadsById();
   $this->reviews = new ReviewModel();
  $this->data['reviews'] = $this->reviews->getReviewByThumbnailID($id);
  return view('ppt/pptbycategory', $this->data);
 }
 public function pptlogin()
    {
        $session = session();
        $downloadpptModel = new PptDownloadModel();

        $user_id  = $this->request->getPost('user_id');   // email
        $password = $this->request->getPost('password');
        $name     = $this->request->getPost('name');

        // Check if user exists
        $user = $downloadpptModel->where('user_id', $user_id)->first();

        if (!$user) {
            // First-time user → generate password
            $newPassword = rand(100000, 999999);

            $downloadpptModel->insert([
                'name'     => $name,
                'user_id'  => $user_id,
                'password' => $newPassword
            ]);

            // Show generated password
            $session->setFlashdata('success', 
                "Your password is: $newPassword. Please use it next time to download PPT."
            );

            return redirect()->back();

        } else {
            // User exists → check password
            if ($user['password'] == $password) {
                // ✅ Allow PPT download
                return $this->response->download(ROOTPATH . 'public/uploads/ppts', null);

            } else {
                $session->setFlashdata('error', 'Incorrect password! Please try again.');
                return redirect()->back();
            }
        }
    }
}


