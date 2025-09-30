<?php

use CodeIgniter\Router\RouteCollection;

 /**
  * @var RouteCollection $routes
  */
$routes->get('/', 'Home::culturecanvas');
$routes->get('/page', 'Home::culturecanvas1');
$routes->get('video', 'Home::video');
$routes->get('ppt', 'Home::ppt');
$routes->get('blog', 'Home::blog');
$routes->get('category', 'Home::category');



$routes->post('/likes/toggleLike/(:any)/(:num)', 'LikeController::toggleLike/$1/$2');


$routes->post('video/rate/(:num)', 'RatingController::rateVideo/$1');



$routes->get('download/ppt/(:num)', 'DownloadController::ppt/$1');

$routes->get('video/(:num)', 'VideosViewController::watchVideo/$1');

$routes->get('videos', 'Home::video');




// User Login/Register
$routes->get('register', 'AuthController::register');
$routes->post('save', 'AuthController::saveRegister');
$routes->get('login', 'AuthController::login');
$routes->post('login', 'AuthController::loginpost');
$routes->get('logout', 'AuthController::logout', ['filter' => 'auth']);
$routes->get('dashboard', 'AuthController::dashboard', ['filter' => 'auth']);

// Categories
$routes->get('category/categories', 'CategoryController::index', ['filter' => 'auth']);

$routes->get('category/addcategories', 'CategoryController::addcategories');
$routes->get('category/categories', 'CategoryController::save');
$routes->post('/savecategories', 'CategoryController::save');
$routes->get('category/editcategories/(:any)', 'CategoryController::editcategories/$1');
$routes->put('updatecategories/(:num)', 'CategoryController::updatecategories/$1');
$routes->get('category/deletecategories/(:num)', 'CategoryController::deletecategories/$1');
$routes->get('category/inactivecategories/(:any)', 'CategoryController::inactivecategories/$1/$2');

// Thumbnails
$routes->get('thumbnail/thumbnail', 'ThumbnailController::index', ['filter' => 'auth']);
$routes->get('thumbnail/bycategory/(:num)', 'ThumbnailController::thumbnailByCategoryID/$1');
$routes->get('thumbnail/addthumbnail', 'ThumbnailController::addthumbnail');
$routes->get('thumbnail/thumbnail', 'ThumbnailController::save');
$routes->post('/savethumbnail', 'ThumbnailController::save');
$routes->get('thumbnail/editthumbnail/(:any)', 'ThumbnailController::editthumbnail/$1');
$routes->put('updatethumbnail/(:num)', 'ThumbnailController::updatethumbnail/$1');
$routes->get('thumbnail/deletethumbnail/(:num)', 'ThumbnailController::deletethumbnail/$1');
$routes->get('thumbnail/inactivethumbnail/(:any)', 'ThumbnailController::inactivethumbnail/$1/$2');



// Presentations
$routes->get('ppt/ppt', 'PptController::index', ['filter' => 'auth']);
$routes->get('ppt/pptbycategory/(:num)', 'PptController::PptByCategoryID/$1');
$routes->get('ppt/addppt', 'PptController::addppt');
$routes->get('ppt/ppt', 'PptController::save');
$routes->post('/saveppt', 'PptController::save');
$routes->get('ppt/editppt/(:any)', 'PptController::editppt/$1');
$routes->put('updateppt/(:num)', 'PptController::updateppt/$1');
$routes->get('ppt/deleteppt/(:num)', 'PptController::deleteppt/$1');
$routes->get('ppt/inactiveppt/(:any)', 'PptController::inactiveppt/$1/$2');
$routes->post('/pptlogin', 'PptController::pptlogin');



// Blogs
$routes->get('blogs/blog', 'BlogController::index', ['filter' => 'auth']);
$routes->get('blogs/blogbycategory/(:num)', 'BlogController::BlogByCategoryID/$1');
$routes->get('blogs/addblog', 'BlogController::addblog');
$routes->get('blogs/blog', 'BlogController::save');
$routes->post('/saveblog', 'BlogController::save');
$routes->get('blogs/editblog/(:any)', 'BlogController::editblog/$1');
$routes->put('updateblog/(:num)', 'BlogController::updateblog/$1');
$routes->get('blogs/deleteblog/(:num)', 'BlogController::deleteblog/$1');
$routes->get('blogs/inactiveblog/(:any)', 'BlogController::inactiveblog/$1/$2');


$routes->get('reviewsby/reviews', 'ReviewController::index', ['filter' => 'auth']);
$routes->get('reviewsby/blogbycategory/(:num)', 'ReviewController::BlogByCategoryID/$1');
$routes->get('reviewsby/addreview', 'ReviewController::addreviews');

$routes->get('reviewsby/reviews', 'ReviewController::savereview');

$routes->get('reviewsby/editreview/(:any)', 'ReviewController::editreview/$1');
$routes->put('reviewsby/(:num)', 'ReviewController::updateblog/$1');
$routes->get('reviewsby/deletereview/(:num)', 'ReviewController::deletereview/$1');
$routes->get('reviewsby/inactivereview/(:any)', 'ReviewController::inactivereview/$1/$2');

$routes->get('frontend/home', 'FrontendController::frontend');
$routes->get('/visitors', 'VisitorController::index', ['filter' => 'auth']);



