<?php

namespace App\Controllers;

use App\Models\CategoryModel;
use App\Models\PptModel;
use App\Models\ReviewModel;

class ReviewController extends BaseController
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
    $this->reviews = new ReviewModel;
    $this->data['reviews'] = $this->reviews->getreviews();
    return view('reviewsby/reviews', $this->data);
  }

  public function addreviews()
  {
    
    return view('reviewsby/addreview');
  }

  public function savereview(){
    dd($this->request->getPost()); 
    $reviews = new ReviewModel();
    $data = [
      'review'    => $this->request->getPost('review'),
        'review_type'   => $this->request->getPost('review_type'),   // blog, ppt, thumbnail
        'review_typeId' => $this->request->getPost('review_typeId'),
      //  'name'    => $this->request->getPost('name'),
      //  'email'    => $this->request->getPost('email'),
      // 'status'      => $this->request->getPost('status')
    ];
    
   $reviews->insert($data);
    return redirect()->to(base_url('reviewsby/reviews'))->with('success',   'review saved on ' . ucfirst($data['review_type']) . ' ID: ' . $data['review_typeId']
  );
  }

public function viewreviews()
  {
    $this->reviews = new ReviewModel();
    $this->data['reviews'] = $this->reviews->viewreviews();
    return view('reviewsby/viewreviews', $this->data);
  }
  public function editreview($id)
  {
    $this->reviews = new ReviewModel();
    $this->data['reviews'] = $this->reviews->getreviewById($id);
    return view('reviewsby/editreview', $this->data);
  }
  public function updatereview($id)
  {
    $review = new ReviewModel();
    $data = [
      'review_id'    => $this->request->getPost('review_id'),
      'review_title'    => $this->request->getPost('review_title'),
      'review_description'    => $this->request->getPost('review_description'),
      'review_status'      => $this->request->getPost('review_status')
    ];
    $review->updatereview($id, $data);
    return redirect()->to(base_url('reviewsby/reviews'))->with('status', 'User Updated Successfully');

  }

  public function deletereview($id)
  {
    $review = new ReviewModel();
    $isDeleted = $review->deletereview($id);
    return redirect()->to(base_url('reviewsby/reviews'))->with('status', 'User Deleted Successfully');
  }
  public function inactivereview($id, $status)
  {
    $review = new ReviewModel();
    $isInactive = $review->inactivereview($id, $status);
    return redirect()->to('reviewsby/reviews')->with('message', 'User marked as inactive');
  }



}