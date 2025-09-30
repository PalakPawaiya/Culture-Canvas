<?php

namespace App\Controllers;

use App\Models\LikeModel;

class LikeController extends BaseController

{
     

    public function toggleLike($type, $id)
    {
        $likeModel = new LikeModel();
      
        $likeModel->addLike( $type, $id);
        $totalLikes = $likeModel->countLikes();
         [ 
        'totalLikes' => $totalLikes
    ];

    return redirect()->back()->with( 'success', 'File downloaded successfully' );
    
    }
}
