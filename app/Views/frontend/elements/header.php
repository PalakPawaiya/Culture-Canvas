 <header>
   <div class="container-fluid">
     <div class="row py-3 border-bottom">

       <div class="col-sm-4 col-lg-2 text-center text-sm-start d-flex gap-3 justify-content-center justify-content-md-start">
         <div class="d-flex align-items-center my-3 my-sm-0">


           <img src="<?= base_url('public/'); ?>assets/fe/images/logo.jpg" alt="Logo" height="70" width="70">


         </div>
         <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
           aria-controls="offcanvasNavbar">
           <svg width="24" height="24" viewBox="0 0 24 24">
             <use xlink:href="#menu"></use>
           </svg>
         </button>
       </div>


      <div class="col-lg-4">
            <ul class="navbar-nav list-unstyled d-flex flex-row gap-3 gap-lg-5 justify-content-center flex-wrap align-items-center mb-0 fw-bold text-uppercase text-dark">
              <li class="nav-item active">
                <a href="index.html" class="nav-link">Home</a>
              </li>
               <li class="nav-item active">
                <a href="index.html" class="nav-link">About Us</a>
              </li>
              <li class="nav-item dropdown" style="margin-bottom: 12px;" >
                <a class="nav-link dropdown-toggle pe-1" role="button" id="pages" data-bs-toggle="dropdown" aria-expanded="false">Pages</a>
                <ul class="dropdown-menu dropdown-menu-end border-0 p-3 rounded-0 shadow" aria-labelledby="pages">
                  <li><a href="video" class="dropdown-item">Videos </a></li>
                  <li><a href="ppt" class="dropdown-item">PPT'S </a></li>
                  <li><a href="blog" class="dropdown-item">Blogs </a></li>
                  <li><a href="#" class="dropdown-item">Others </a></li>
                 
                </ul>
              </li>
            </ul>
          </div>
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       <div class="col-sm-8 col-lg-2 d-flex gap-5 align-items-center justify-content-center justify-content-sm-end">
         <ul class="d-flex justify-content-end list-unstyled m-0">
           <li>
             <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
               <svg width="24" height="24">
                 <use xlink:href="#user"></use>
               </svg>
             </a>
             <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
               <?php if (session()->get('isLoggedIn')): ?>
                 <li><span class="dropdown-item-text"><strong>Name:</strong> <?= session()->get('name') ?></span></li>
                 <li><span class="dropdown-item-text"><strong>Email:</strong> <?= session()->get('email') ?></span></li>
                 <li>
                   <hr class="dropdown-divider">
                 </li>
                 <li><a class="dropdown-item" href="<?= base_url('logout') ?>">Logout</a></li>
               <?php else: ?>
                 <li>
                   <!-- Login Form inside dropdown -->
                   <form action="<?= base_url('/login') ?>" method="post" class="px-3 py-2">
                     <div class="mb-2">
                       <input type="email" name="email" class="form-control form-control-sm" placeholder="Email" required>
                     </div>
                     <br>
                     <div class="mb-2">
                       <input type="password" name="password" class="form-control form-control-sm" placeholder="Password" required>
                     </div>
                     <br>
                     <button type="submit" class="btn btn-primary btn-sm w-100">Login</button>

                     <div class="px-3 py-2 text-center">
                       <a href="<?= base_url('register') ?>">Register</a>
                     </div>
                   </form>
                 </li>
                 
               <?php endif; ?>
           
         </ul>
       </div>

     </div>
   </div>
 </header>