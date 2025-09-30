<?php

namespace App\Controllers;

use App\Models\CategoryModel;

class CategoryController extends BaseController
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
     
    $this->categories = new CategoryModel;
    $this->data['categories'] = $this->categories->getCategories();
    return view('category/categories', $this->data);
  }

  public function addcategories()
  {
    return view('category/addcategories');
  }
  public function save()
  {
    $categories = new CategoryModel();

     $image = $this->request->getFile('image');
      $imageName = 'defaultimage.jpg';
    if ($image && $image->isValid() && !$image->hasMoved()) {
      $imageName = time() . '_' . $image->getClientName();
      $image->move(ROOTPATH . 'public/uploads/trainings/images', $imageName);
      $data['image'] = $imageName;
      
    $data = [
      'category_name'    => $this->request->getPost('category_name'),
      'status'      => $this->request->getPost('status'),
       'image'      => $imageName
    ];
  }
    $categories->savecategories($data);
    return redirect()->to(base_url('category/categories'))->with('status', 'User Added Successfully');
  }
  public function  editcategories($id)
  {
    $this->categories = new CategoryModel;
    $this->data['categories'] = $this->categories->getCategoriesById($id);
    return view('category/editcategories', $this->data);
  }
  public function updatecategories($id)
  {
    $categories = new CategoryModel();
    $data = [
      'category_name'    => $this->request->getPost('category_name'),
      'status'      => $this->request->getPost('status')
    ];
    $categories->updateCategories($id, $data);
    return redirect()->to(base_url('category/categories'))->with('status', 'User Updated Successfully');
  }

  public function deletecategories($id)
  {
    $this->categories = new CategoryModel();
    $isDeleted = $this->categories->deleteCategories($id);
    return redirect()->to(base_url('category/categories'))->with('status', 'User Deleted Successfully');
  }

  public function inactivecategories($id, $status)
  {
    $this->categories = new CategoryModel();
    $isInactive = $this->categories->inactiveCategories($id, $status);
    return redirect()->to('category/categories')->with('message', 'User marked as inactive');
  }
   public function allByCategoryID($id)
 {
 

  $this->ppts = new PptModel();
  $this->data['ppts'] = $this->ppts->getPptByCategoryID($id);
  $this->videothumbnails = new ThumbnailModel();
  $this->data['videothumbnails'] = $this->videothumbnails->getthumbnailByCategoryID($id);
  $this->blogs = new BlogModel();
  $this->data['blogs'] = $this->blogs->getBlogByCategoryID($id);

  return view('category/allbycategory', $this->data);
 
 }
}
