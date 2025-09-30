<?php

namespace App\Controllers;

use App\Models\VisitorModel;

class VisitorController extends BaseController
{
     public function __construct()
  {
   
     $session = session(); 
        if (!$session->get('isLoggedIn')) {
          
            return redirect()->to('login');
        }
  }

    public function index(): string
    {
        $visitorModel = new VisitorModel();
        // $row = $visitorModel->getCount();      
        // $count = $row ? (int) $row['counts'] : 0;
        $count = $visitorModel->increaseCount();

        // Pass to view
        return view('/', ['counts' => $count]);
    }
}
