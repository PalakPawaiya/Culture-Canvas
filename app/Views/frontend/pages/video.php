<?= $this->extend('frontend/layouts/front_layout1') ?>

<?= $this->section('frontend_content') ?>






<section id="ppts" class="products-grid py-5" style="background-color:whitesmoke;">
  <div class="container-lg">
    <div class="row mb-4">
      <div class="col-md-12 d-flex justify-content-center align-items-center">
        <h2 class="section-title text-center" style="text-align: center;" >View All Video's 🎬
</h2>

        
      </div>
    </div>
<br><br>
    <div class="row g-4">
      <?php if (!empty($videothumbnails)): ?>
        <?php foreach ($videothumbnails as $row): ?>
         <div class="col-md-4">


            <div class="card h-100 shadow-sm border-0 blog-card">

              <div class="category-img-container">


              <a href="https://www.youtube.com/watch?v=EFZErAelIAI&t=2s" target="_blank">
                <img src="<?= base_url('public/uploads/trainings/images/' . $row['image']); ?>"
                  class="image-hover-effect video-thumbnail" alt="Sample Image"
                  alt="<?= esc($row['title']) ?> "
                  style="max-width: 300px; border: 2px solid black; border-radius: 3px; "
                   style="height: auto; width: 400px; font-size: 20px;">

              </a>
              </div>
              <div class="card-body text-center">
                <p class="mt-3 fw-bold text-dark" style=" font-size: 20px; "><?= esc($row['title']) ?></p>

                <!-- Buttons -->
                <div class="d-flex flex-column gap-2 align-items-center">
                  <a href="<?= $row['ytvideolink']; ?>" class="btn btn-primary w-70"
                    target="_blank" style="height: 40px; min-width:260px; white-space: nowrap; margin-top: 1px; "> View Video</a>

                </div>
                <div class="d-flex justify-content-center gap-2 mt-1">
                  <!-- Like Button -->
                  <button class="btn btn-primary w-35 share-btn"
                    style="height: 40px; min-width: 120px; white-space: nowrap; margin-top: 10px;"
                    data-link="<?= $row['ytvideolink']; ?>">
                    <i class="fas fa-share-alt"></i> &nbsp; Share
                  </button>



                  <?php
                  $LikeCount;
                  foreach ($likesById as $likecount) {
                    if (in_array($row['id'], $likecount)) {
                      $LikeCount =  $likecount['no_of_likes'];
                    }
                  }
                  ?>
                  <form action="<?= base_url('likes/toggleLike/video/' . $row['id']) ?>" method="post" style="display:inline;">
                    <?= csrf_field() ?>
                    <button type="submit" class="btn btn-outline-danger btn-primary d-flex align-items-center justify-content-center" style="height: 40px; min-width: 140px; ">
                      👍 Like (<?= $LikeCount + 10000 ?>)
                    </button>
                  </form>
                </div>
              </div>


            </div>

          </div>

        <?php endforeach; ?>
      <?php else: ?>
        <li>No Categories Found</li>
      <?php endif; ?>


    </div>
  </div>

</section>

<hr>









<?= $this->endSection() ?>