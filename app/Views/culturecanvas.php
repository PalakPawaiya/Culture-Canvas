<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Culture Canvas Website</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="public/assets/css/culture.css">

</head>

<body>


  <!--  Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">


    <a class="navbar-brand" href="#">
      <div class="glow-logo">
        <img src="public/uploads/trainings/images/logo.png" alt="Logo" width="40" height="40" class="d-inline-block align-text-top">
      </div>
    </a>
    <a class="navbar-brand fw-bold" href="#">Culture Canvas</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>&nbsp;&nbsp;&nbsp;
        <li class="nav-item"><a class="nav-link active" href="#">Culture Canvas</a></li>&nbsp;&nbsp;&nbsp;
        <li class="nav-item"><a class="nav-link active" href="#">Videos</a></li> &nbsp;&nbsp;&nbsp;
        <li class="nav-item"><a class="nav-link active" href="#">PPTs</a></li>&nbsp;&nbsp;&nbsp;
        <li class="nav-item"><a class="nav-link active" href="#">Blogs</a></li>&nbsp;&nbsp;&nbsp;
        <li class="nav-item"><a class="nav-link active" href="#">Contact</a></li>&nbsp;&nbsp;&nbsp;
      </ul>

    </div>
  </nav>


  <div id="mainCarousel" class="carousel slide" data-bs-ride="carousel" style="height: 400px;">
    <div class="carousel-inner">

      <!-- Slide 1 -->
      <div class="carousel-item active">
        <video autoplay muted loop playsinline class="w-100" style="object-fit: cover; height: 90vh; ">
          <source src="<?= base_url('public/uploads/trainings/images/culturecanvasvideo.mp4') ?>" type="video/mp4">
        </video>
        <div class="carousel-caption">
          <h2>Videos</h2>
          <p>Explore our latest videos to enhance your skills.</p>
          <a href="<?= base_url('thumbnail/bycategory') ?>" class="btn btn-primary">View Videos</a>
        </div>
      </div>


      <!-- Slide 2 -->
      <div class="carousel-item">
        <video autoplay muted loop playsinline class="w-100" style="object-fit: cover; height: 90vh;">
          <source src="<?= base_url('public/uploads/trainings/images/culture2.mp4') ?>" type="video/mp4">
        </video>
        <div class="carousel-caption">
          <h2>PPTs</h2>
          <p>Access and download study PPTs and learning resources.</p>
          <a href="#" class="btn btn-success">View PPTs</a>
        </div>
      </div>

      <!-- Slide 3 -->
      <div class="carousel-item">
        <video autoplay muted loop playsinline class="w-100" style="object-fit: cover; height: 90vh;">
          <source src="<?= base_url('public/uploads/trainings/images/culture3.mp4') ?>" type="video/mp4">
        </video>
        <div class="carousel-caption">
          <h2>Blogs</h2>
          <p>Read our blogs to stay updated with the latest information.</p>
          <a href="#" class="btn btn-warning">Read Blogs</a>
        </div>
      </div>

    </div>


    <button class="carousel-control-prev" type="button" data-bs-target="#mainCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#mainCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon"></span>
    </button>
  </div>
  <br>
  <br><br><br>
  <br><br><br><br>
  <div class="container" style="background-color: rgba(29, 62, 80, 1)">
    <h1 style="text-align: center;">🎥 Our Videos</h1>
    <?php if (!empty($videothumbnails)): ?>

      <div class="row">

        <?php foreach ($videothumbnails as $row): ?>
          <div class="col-md-4 mb-4">
            <?php
            $image = !empty($row['image'])
              ? base_url('public/uploads/trainings/images/' . $row['image'])
              : base_url('public/uploads/trainings/images/defaultimage.jpg');
            ?>

            <img src="<?= $image ?>" class="card-img-top" alt="Video Thumbnail"><br><br>
            <h5 class="card-title" style="text-align: center;"><?= $row['title']; ?></h5>

            <div class="text-center mt-3">
              <iframe width="330" height="200"
                src="https://www.youtube.com/embed/Gs8bccjIPt0"
                title="YouTube video player"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen>
              </iframe>
              <a href="<?= $row['ytvideolink']; ?>" class="btn btn-primary" style="align-items: center;"> View Video</a>
            </div>
            <br>
            <!-- Button to open modal -->
            <?php foreach ($reviews as $review): ?>
             


                <!-- Comment Modal Button -->
                 <div class="text-center mt-3">
                <button class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#commentModal<?= $review['id'] ?>"  >
                  Add Comment
                </button>
                 </div>

              <!-- Modal -->
              <div class="modal fade" id="commentModal<?= $review['id'] ?>" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <form action="<?= base_url('/savereviews') ?>" method="post">
                      <div class="modal-body">
                        <input type="hidden" name="review_type" value="thumbnail">
                        <input type="hidden" name="review_typeId" value="<?= $review['id'] ?>">
                       
                        <h4>Add Your Review</h4>
                        <textarea class="form-control" name="review" rows="4" placeholder="write your review here..." required></textarea>

                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Submit</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>

          </div>

        <?php endforeach; ?>
      </div>
  </div>
<?php else: ?>
  <div class="alert alert-warning text-center w-50">
    <b>No Data Found</b>
  </div>
<?php endif; ?>
</div>
</div>

</div>
<hr>
<hr>

<div class="container" style="background-color: rgba(29, 62, 80, 1)">
  <h1 style="text-align: center;">🖥 Our Presentation's</h1>
  <?php if (!empty($ppts)): ?>
    <div class="row justify-content-center">
      <?php foreach ($ppts as $row): ?>
        <div class="col-md-4 ">
          <div class="card">
            <?php
            $image = !empty($row['image'])
              ? base_url('public/uploads/trainings/images/' . $row['image'])
              : base_url('public/uploads/trainings/images/defaultimage.jpg');
            ?>
            <div class="image-wrapper">
              <img src="<?= base_url('public/uploads/trainings/images/' . $row['image']); ?>">
            </div>
          </div>
          <div class="text-center mt-3">
            <h5 class="card-title"><?= $row['title']; ?></h5>
            <br>
            <a href="<?= base_url('public/uploads/ppts/' . $row['filename']); ?>" class="btn btn-primary" target="_blank"> Download PPT</a></h5>
            <!-- Download PPT Button -->
            <a href="<?= base_url('public/uploads/ppts/' . $row['filename']); ?>" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#pptLoginModal">
              📥 Download PPT
            </a>

            <!-- Login Modal -->
            <div class="modal fade" id="pptLoginModal" tabindex="-1" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <form action="<?= base_url('/pptlogin') ?>" method="post">
                    <div class="modal-header">
                      <h5 class="modal-title">Enter Details to Download PPT</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                      <input type="text" name="name" class="form-control mb-2" placeholder="Enter Name" required>
                      <input type="email" name="user_id" class="form-control mb-2" placeholder="Enter Email" required>
                      <input type="password" name="password" class="form-control" placeholder="Enter Password">
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary">Proceed</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>

            <br><br>

            <a href="<?= $row['ytvideolink']; ?>" class="btn btn-primary" target="_blank" style="align-items: center;">View Video</a></h5>
          </div>
          <br>
          <br>

          <br>


        </div>
      <?php endforeach; ?>
    </div>

  <?php else: ?>
    <div class="alert alert-warning text-center w-50">
      <b>No Data Found</b>
    </div>
  <?php endif; ?>
</div>

<hr>
<hr>
<div class="container py-5" style="background-color: rgba(29, 62, 80, 1)">
  <h1 class="text-center mb-5 fw-bold">📖 Our Blogs</h1>
  <?php if (!empty($blogs)): ?>
    <div class="row  justify-content-center">
      <?php foreach ($blogs as $row): ?>
        <div class="col-md-4 mb-4" style="height: 270px;">
          <div class="card blog-card shadow-lg border-0 h-100">
            <?php
            $image = !empty($row['image'])
              ? base_url('public/uploads/trainings/images/' . $row['image'])
              : base_url('public/uploads/trainings/images/defaultimage.jpg');
            ?>
            <img src="<?= base_url('public/uploads/trainings/images/' . $row['image']); ?>" class="card-img-top" alt="Blog Image" style="height:200px; object-fit:cover;">

            <div class="card-body text-cneter">

              <h5 class="fw-bold text-warning">Title:</h5>
              <h5 class="fw-bold text-warning"><?= $row['title']; ?></h5>
            </div>


            <h5 class="me-2 fw-bold" style="width: 100px;">Content:</h5>
            <h5 class="card-title mb-0" style="text-align: justify;">
              <?= $row['content']; ?>
            </h5>
          </div>

        </div>
      <?php endforeach; ?>
    </div>
  <?php else: ?>
    <div class="alert alert-warning text-center w-50">
      <b>No Data Found</b>
    </div>
  <?php endif; ?>
</div>



<div class="container my-4" style="background-color:  rgba(64, 105, 128, 1);">
  <h3 class="text-center mb-4 text-white">All Upcoming Programmes</h3>
  <div class="row justify-content-center">

    <!-- Card 1 -->
    <div class="col-md-4 mb-4">
      <div class="card shadow-sm h-100">
        <div class="card-body text-center">
          <h5 class="card-title">View All Videos</h5>
          <p class="mb-1"><strong>Topic</strong> &nbsp; Indian Knowledge System</p>
          <p><strong>Keep Learning</strong></p>
          <br>
          <div class="d-grid gap-2">
            <button class="btn btn-success text-uppercase fw-bold px-4 py-2" data-bs-toggle="modal" data-bs-target="#viewvideoCalendarModal">
              View All Videos
            </button> <br>
            <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#videoCalendarModal">
              Videos Calendar
            </button>

           
          </div>
        </div>
      </div>
    </div>
    <!-- Card 2 -->
    <div class="col-md-4 mb-4">
      <div class="card shadow-sm h-100">
        <div class="card-body text-center">
          <h5 class="card-title">View All PPT'S</h5>
          <p class="mb-1"><strong>All </strong> Information</p>
           <p><strong>Keep Learning</strong></p>
          <br>
          <div class="d-grid gap-2">
           <button class="btn btn-success text-uppercase fw-bold px-4 py-2" data-bs-toggle="modal" data-bs-target="#viewpptCalendarModal">
              View All PPT'S
            </button>  <br>
            <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#pptsCalendarModal">
              PPT'S Calendar
            </button>
           
          </div>
        </div>
      </div>
    </div>
    <!-- Card 3 -->
    <div class="col-md-4 mb-4">
      <div class="card shadow-sm h-100">
        <div class="card-body text-center">
          <h5 class="card-title">View All Blog's</h5>
          <p class="mb-1"><strong>All</strong> Topics</p>
          <p><strong>Keep Learning</strong></p>
          <br>
          <div class="d-grid gap-2">
              <button class="btn btn-success text-uppercase fw-bold px-4 py-2" data-bs-toggle="modal" data-bs-target="#viewblogCalendarModal">
              View All Blog's
            </button><br>
             <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#blogCalendarModal">
              Blog's Calendar
            </button>

           
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
<div class="modal fade" id="videoCalendarModal" tabindex="-1" aria-labelledby="calendarLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="calendarLabel">Video Calendar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered table-hover text-center">
          <thead class="table-dark">
            <tr>
              <th>Date</th>
              <th>Video Title</th>
              <th>Category Id</th>
              <th>Link</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($videothumbnails as $thumbnails): ?>
              <tr>
                <td><?php
                    $date = strtotime($thumbnails['created_by']);
                    echo ($date && $date > 0) ? date('d M Y', $date) : 'Date Not Available';
                    ?>
                </td>
                <td><?= $thumbnails['title'] ?></td>
                <td><?= ucfirst($thumbnails['category_id']) ?></td>
                <td>
                  <a href="<?= $thumbnails['ytvideolink'] ?>" class="btn btn-sm btn-primary" target="_blank">Watch</a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="pptsCalendarModal" tabindex="-1" aria-labelledby="calendarLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="calendarLabel">PPT'S Calendar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered table-hover text-center">
          <thead class="table-dark">
            <tr>
              <th>Date</th>
              <th>PPT'S Title</th>
              <th>Category Id</th>
              <th>Link</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($ppts as $ppt): ?>
              <tr>
                <td><?php
                    $date = strtotime($ppt['created_by']);
                    echo ($date && $date > 0) ? date('d M Y', $date) : 'Date Not Available';
                    ?>
                </td>
                <td><?= $ppt['title'] ?></td>
                <td><?= ucfirst($ppt['category_id']) ?></td>
                <td>
                  <a href="<?= $ppt['ytvideolink'] ?>" class="btn btn-sm btn-primary" target="_blank">Watch</a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="blogCalendarModal" tabindex="-1" aria-labelledby="calendarLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="calendarLabel">Blog's Calendar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered table-hover text-center">
          <thead class="table-dark">
            <tr>
              <th>Date</th>
              <th>Blog Title</th>
              <th>Category Id</th>
              <th>Link</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($blogs as $blog): ?>
              <tr>
                <td><?php
                    $date = strtotime($blog['created_by']);
                    echo ($date && $date > 0) ? date('d M Y', $date) : 'Date Not Available';
                    ?>
                </td>
                <td><?= $blog['title'] ?></td>
                <td><?= ucfirst($blog['category_id']) ?></td>
                <td>
                  <a href="<?= $blog['ytvideolink'] ?>" class="btn btn-sm btn-primary" target="_blank">Watch</a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="viewvideoCalendarModal" tabindex="-1" aria-labelledby="calendarLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="calendarLabel">View All Videos </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div class="row  justify-content-center ">
          <?php foreach ($videothumbnails as $row): ?>
            <div class="col-md-4 ">
              <div class="card mb-4 me-md-3">
                <?php
                $image = !empty($row['image'])
                  ? base_url('public/uploads/trainings/images/' . $row['image'])
                  : base_url('public/uploads/trainings/images/defaultimage.jpg');
                ?>
                <img src="<?= base_url('public/uploads/trainings/images/' . $row['image']); ?>"
                  class="card-img-top" alt="<?= $row['title']; ?>">




                <h5 class="card-title"><?= $row['title']; ?></h5>
                <h5 class="card-title"><a href="<?= $row['ytvideolink']; ?>" target="_blank"> View Video</a></h5>

              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="viewpptCalendarModal" tabindex="-1" aria-labelledby="calendarLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="calendarLabel">View All PPT'S </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div class="row  justify-content-center ">
          <?php foreach ($ppts as $row): ?>
            <div class="col-md-4 ">
              <div class="card mb-4 me-md-3">
                <?php
                $image = !empty($row['image'])
                  ? base_url('public/uploads/trainings/images/' . $row['image'])
                  : base_url('public/uploads/trainings/images/defaultimage.jpg');
                ?>
                <img src="<?= base_url('public/uploads/trainings/images/' . $row['image']); ?>"
                
                  class="card-img-top" alt="<?= $row['title']; ?>"><br><br>
               <a href="<?= base_url('public/uploads/ppts/' . $row['filename']); ?>" class="btn btn-primary w-70" target="_blank"> Download PPT</a></h5>
             



                <h5 class="card-title"><?= $row['title']; ?></h5>
                <h5 class="card-title"><a href="<?= $row['ytvideolink']; ?>" target="_blank"> View Video</a></h5>

              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="viewblogCalendarModal" tabindex="-1" aria-labelledby="calendarLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="calendarLabel">View All Blog's </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div class="row  justify-content-center ">
          <?php foreach ($blogs as $row): ?>
            <div class="col-md-4 ">
              <div class="card mb-4 me-md-3">
                <?php
                $image = !empty($row['image'])
                  ? base_url('public/uploads/trainings/images/' . $row['image'])
                  : base_url('public/uploads/trainings/images/defaultimage.jpg');
                ?>
                <img src="<?= base_url('public/uploads/trainings/images/' . $row['image']); ?>"
                  class="card-img-top" alt="<?= $row['title']; ?>">



                
                <h5 class="card-title"><?= $row['title']; ?></h5>
                <h5 class="card-title"><a href="<?= $row['ytvideolink']; ?>" target="_blank"> View Video</a></h5>

              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</div>
<br><br><br><br>


  <!-- Footer -->
  <footer class="bg-dark text-white text-center py-3 mt-4">
    &copy; 2025 My Project | All Rights Reserved
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</body>

</html>