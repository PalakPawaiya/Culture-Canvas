<?php

namespace App\Controllers;

use App\Models\DownloadModel;
use App\Models\PptModel;

class DownloadController extends BaseController
{
    public function ppt($pptId)
    {
       

       
        $downloadModel = new DownloadModel();
        $pptModel = new PptModel();
        $file = $this->request->getFile('filename');

        $pptName = null;

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $pptName = time() . '_' . $file->getClientName();
            $file->move(ROOTPATH . 'public/uploads/ppts/', $pptName);
        }
        $downloadModel->addDownload($pptId);
          $totalDownloads = $downloadModel->countDownloads(); 
         [ 'ppts' => $pptName,
        'totalDownloads' => $totalDownloads
    ];

    return redirect()->back()->with( 'success', 'File downloaded successfully' );
      
       
    }
}
