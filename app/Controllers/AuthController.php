<?php

namespace App\Controllers;

use App\Models\UserlogsModel;
use App\Models\BlogModel;
use App\Models\CategoryModel;
use App\Models\PptModel;
use App\Models\ThumbnailModel;

class AuthController extends BaseController
{

   public function __construct()
  {
   
     $session = session(); 
        if (!$session->get('isLoggedIn')) {
          
            return redirect()->to('login');
        }
  }

    public function register()
    {
        return view('register');
    }

    public function saveRegister()
    {
        $userlogsModel = new UserlogsModel();
        $data = [
            'user_id' => $this->request->getPost('user_id'),
            'password' => $this->request->getPost('password')
        ];

        $userlogsModel->saveuser($data);
        return redirect()->to(base_url('login'))->with('msg', 'Registration successful! Please login.');
    }

    public function login()
    {
       // echo "palak"; exit;
        return view('login');
    }

    public function loginpost()
    {
        $session = session();
        $user_id    = $this->request->getPost('user_id');
        $password = $this->request->getPost('password');

        $conditionArray = [

            'user_id' => $this->request->getPost('user_id'),
            'password' => $this->request->getPost('password'),

        ];

        $this->userlogsModel = new UserlogsModel();
        $this->result = $this->userlogsModel->checkUser($conditionArray);
       
        if (isset($this->result) && is_array($this->result)) {
            $session->set([
                'isLoggedIn' => true,
                'user_id' => $this->result[0]['user_id'],
                'password'       => $this->result[0]['password']

            ]);
            return redirect()->to(base_url('dashboard'));
        } 
        else
             {
            $session->setFlashdata('error', 'Invalid Email or Password');
            return redirect()->to(base_url('login'));
        }
    }


    public function logout()
    {  
        session()->destroy();
        return redirect()->to(base_url('login'));
    }
    public function dashboard()
    {
      // echo "dashboard"; exit;
        $session = session();
        if (!$session->get('isLoggedIn')) {
            
            return redirect()->to(base_url('login'));
        }

        $this->categories = new CategoryModel();
        $this->data['totalCategories'] = $this->categories->getTotalCategories();
        $this->videothumbnails = new ThumbnailModel;
        $this->data['totalThumbnails'] = $this->videothumbnails->getTotalThumbnail();
        $this->ppts = new PptModel;
        $this->data['totalPpts'] = $this->ppts->getTotalppt();
        $this->blogs = new BlogModel();
        $this->data['totalBlogs'] = $this->blogs->getTotalBlog();
        return view('dashboard', $this->data);
    }
}
