<?php

namespace App\Controllers;
use App\Models\RatingModel;

class RatingController extends BaseController {

    public function rateVideo($videoId, $id) { 
    {
        $ratingModel = new RatingModel();
          $userId = session()->get('user_id'); 
        if (!$userId) {
            return redirect()->to('category/login')->with('error', 'Login required');
        }
      

        $ratingModel->addRating($userId, $videoId, $id);
        $totalRatings = $ratingModel->countRatings();
         return view('ratings', [
       
        'totalRatings' => $totalRatings
    ]);
    }
}
}