<?php

namespace App\Controllers;

use App\Models\CategoryModel;
use App\Models\BlogModel;
use App\Models\CommentModel;

class BlogController extends BaseController
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
    
    $this->blogs = new BlogModel;
    $this->data['blogs'] = $this->blogs->getblog();
    return view('blogs/blog', $this->data);
  }

  public function addblog()
  {
    $this->categories = new CategoryModel;
    $this->data['categories']  = $this->categories->getCategories();
    return view('blogs/addblog', $this->data);
  }
  public function save()
  {
    $blogs = new BlogModel();
    $data = [
      'title'    => $this->request->getPost('title'),
      'category_id'    => $this->request->getPost('category_name'),
      'metatags'    => $this->request->getPost('metatags'),
      'metadescriptions'    => $this->request->getPost('metadescriptions'),
      'image'    => $this->request->getPost('image'),
      'content'    => $this->request->getPost('content'),
      'status'      => $this->request->getPost('status')
    ];

     $image = $this->request->getFile('image');
    if ($image && $image->isValid() && !$image->hasMoved()) {
      $imageName = time() . '_' . $image->getClientName();
      $image->move(ROOTPATH . 'public/uploads/trainings/images', $imageName);
      $data['image'] = $imageName;
    }
    $blogs->saveblog($data);
    return redirect()->to(base_url('blogs/blog'))->with('status', 'User Added Successfully');
  }
  public function  editblog($id)
  {
    $this->blogs = new BlogModel;
    $this->data['blogs'] = $this->blogs->getblogById($id);

    $this->categories = new CategoryModel;
    $this->data['categories']  = $this->categories->getCategories();

    return view('blogs/editblog', $this->data);
  }
  public function updateblog($id)
  {
    $blogs = new BlogModel();
    $data = [
      'title'    => $this->request->getPost('title'),
      'category_id'    => $this->request->getPost('category_name'),
      'metatags'    => $this->request->getPost('metatags'),
      'metadescriptions'    => $this->request->getPost('metadescriptions'),
      'image'    => $this->request->getPost('image'),
      'content'    => $this->request->getPost('content'),
      'status'      => $this->request->getPost('status')
    ];
    $blogs->updateblog($id, $data);
    return redirect()->to(base_url('blogs/blog'))->with('status', 'User Updated Successfully');
  }

  public function deleteblog($id)
  {
    $this->blogs = new BlogModel();
    $isDeleted = $this->blogs->deleteblog($id);
    return redirect()->to(base_url('blogs/blog'))->with('status', 'User Deleted Successfully');
  }

  public function inactiveblog($id, $status)
  {
    $this->blogs = new BlogModel();
    $isInactive = $this->blogs->inactiveblog($id, $status);
    return redirect()->to('blogs/blog')->with('message', 'User marked as inactive');
  }
  public function BlogByCategoryID($id)
 {
 
  $this->blogs = new BlogModel();
  $this->data['blogs'] = $this->blogs->getBlogByCategoryID($id);
   $this->comments = new CommentModel();
  $this->data['comments'] = $this->comments->getCommentByThumbnailID($id);
  return view('blogs/blogbycategory', $this->data);
 }
}
