<?php

namespace App\Controllers;

use App\Models\LikeModel;
use App\Models\ThumbnailModel;
use App\Models\PptModel;
use App\Models\BlogModel;
use App\Models\CategoryModel;
use App\Models\ReviewModel;
use App\Models\DownloadModel;
use App\Models\RatingModel;
use App\Models\VisitorModel;
use App\Models\VideosViewModel;


class Home extends BaseController
{
    public function culturecanvas()
    {

        $this->categories = new CategoryModel;
        $this->data['categories'] = $this->categories->getCategory(3);

        $this->videothumbnails = new ThumbnailModel;

        $this->data['videothumbnails'] = $this->videothumbnails->getthumbnails(3);

        $this->ppts = new PptModel;
        $this->data['ppts'] = $this->ppts->getppts(3);

        $this->blogs = new BlogModel;
        $this->data['blogs'] = $this->blogs->getblogs(4);

        $this->downloads = new DownloadModel;
        $this->data['totalDownloads'] = $this->downloads->countDownloads();
        $this->data['downloadsById'] = $this->downloads->countDownloadsById();
     

       // print_r($this->data['downloadsById']); exit;

        $this->likes = new LikeModel();
        $this->data['totalLikes'] = $this->likes->countLikes();
        $this->data['likesById'] = $this->likes->countLikesById();

        $this->ratings = new RatingModel();
        $this->data['totalRatings'] = $this->ratings->countRatings();
        $this->data['ratingsById'] = $this->ratings->countRatingsById();

        $this->visitor_counter = new VisitorModel();
        $this->data['visitors'] = $this->visitor_counter->increaseCount();

        $this->data['title'] = 'Cultural canvas';



        return view('frontend/pages/index', $this->data);
    }
   

    public function video()
    {
        $this->videothumbnails = new ThumbnailModel;

        $search = $this->request->getGet('q');
        $page   = $this->request->getGet('page') ?? 1;
        $perPage = 6;

        $result = $this->videothumbnails->getThumbnailss($perPage, $page, $search);

        $this->data['videothumbnails'] = $result['data'];
        $this->data['totalPages']      = $result['totalPages'];
        $this->data['currentPage']     = $result['page'];
        $this->data['search']          = $search;

        $this->data['videothumbnails'] = $this->videothumbnails->getthumbnails();

        $this->likes = new LikeModel();
        $this->data['totalLikes'] = $this->likes->countLikes();
        $this->data['likesById'] = $this->likes->countLikesById();

         $this->data['title'] = 'Cultural canvas';

        return view('frontend/pages/video', $this->data);
    }
    public function ppt()
    {
        $this->ppts = new PptModel;
        $this->data['ppts'] = $this->ppts->getppt();

        $this->downloads = new DownloadModel;
        $this->data['totalDownloads'] = $this->downloads->countDownloads();
        $this->data['downloadsById'] = $this->downloads->countDownloadsById();
         $this->data['title'] = 'Cultural canvas';

        return view('frontend/pages/ppt', $this->data);
    }
    public function blog()
    {
        $this->blogs = new BlogModel;
        $this->data['blogs'] = $this->blogs->getBlog();

         $this->data['title'] = 'Cultural canvas';
        return view('frontend/pages/blog', $this->data);
    }
    public function category()
    {
        $this->categories = new CategoryModel;
        $this->data['categories'] = $this->categories->getCategories();
         $this->data['title'] = 'Cultural canvas';

        return view('frontend/pages/category', $this->data);
    }
    
}
