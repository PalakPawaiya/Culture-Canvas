<?php 

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserlogsModel;

class Auth extends Controller
{
    // Login form page
    // public function loginForm()
    // {
    //     return view('login'); // aapka login view
    // }

    // // Login process
    // public function loginProcess()
    // {
    //     $session = session();
    //     $email = $this->request->getPost('user_id');
    //     $password = $this->request->getPost('password');

    //     $conditionArray = [

    //         'user_id' => $this->request->getPost('user_id'),
    //         'password' => $this->request->getPost('password'),

    //     ];

    //     $this->userlogsModel = new UserlogsModel();
    //     $this->result = $this->userlogsModel->checkUser($conditionArray);
    //     print_r($this->result);
    //     if (isset($this->result) && is_array($this->result)) {
    //         $session->set([
    //             'isLoggedIn' => true,
    //             'user_id' => $this->result[0]['user_id'],
    //             'password'       => $this->result[0]['password']

    //         ]);
    //         return redirect()->to('/'); // login success
    //     } else {
    //         return redirect()->back()->with('error', 'Invalid credentials');
    //     }
    // }
}
