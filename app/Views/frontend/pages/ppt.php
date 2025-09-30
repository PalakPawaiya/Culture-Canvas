<?= $this->extend('frontend/layouts/front_layout1') ?>

<?= $this->section('frontend_content') ?>



<section id="ppts" class="products-grid py-5" style="background-color:whitesmoke;">
  <div class="container-lg">
    <div class="row mb-4">
      <div class="col-md-12 d-flex justify-content-center align-items-center">
        <h2 class="section-title text-center" style="text-align: center;">View All PPT'S 📊
        </h2>


      </div>
    </div>
    <br><br>

    <div class="row g-4">
      <?php if (!empty($ppts)): ?>
        <?php foreach ($ppts as $row): ?>
          <div class="col-md-4">


            <div class="card h-100 shadow-sm border-0 blog-card">

              <div class="category-img-container">



                <img src="<?= base_url('public/uploads/trainings/images/' . $row['image']); ?>"
                  alt="<?= esc($row['title']) ?>  "
                  class="image-hover-effect ppt-img"
                  style="border: 2px solid black; border-radius: 3px;  " style="height: 190px; width: 370px; font-size: 20px;">
              </div>
              <!-- Category Name -->
              <p class="mt-2 fw-bold text-dark" style=" font-size: 20px; "><?= esc($row['title']) ?></p>
              <div class="text-center">

                <div class="d-flex align-items-center gap-3" style="margin-bottom: 10px;">
                  <a href="<?= $row['ytvideolink']; ?>" class="btn btn-primary d-flex align-items-center justify-content-center" target="_blank" style="height: 40px; min-width: 120px; white-space: nowrap;  ">View Video</a></h5>
                  <button class="btn btn-primary d-flex align-items-center justify-content-center share-btn"
                    style="height: 40px; min-width: 120px; white-space: nowrap; margin-top: 1px; "


                    data-title="<?= esc($row['title']); ?>"
                    data-link="<?= base_url('public/uploads/ppts/' . $row['filename']); ?>">
                    <i class="fas fa-share-alt"></i> &nbsp; Share
                  </button>
                </div>
                <div class="mb-2 text-center ">
                  <?php
                  $pptDownloadCount;
                  foreach ($downloadsById as $downloadcount) {
                    if (in_array($row['id'], $downloadcount)) {
                      $pptDownloadCount =  $downloadcount['no_of_downloads'];
                    }
                  }

                  ?>

                  <a href="<?= base_url('download/ppt/' . $row['id']) ?>" class="btn btn-primary" data-bs-toggle="tooltip"
                    data-bs-placement="top" title="PPT used in video" style="margin-top: 4px; margin-right: 11px;">
                    ⬇ Download PPT
                  </a>
                </div>
                <p class="mb-1">
                  Total Downloads: <?= $pptDownloadCount ?><br>
                </p>
              </div>
            </div>
          </div>

        <?php endforeach; ?>
      <?php else: ?>
        <li>No Categories Found</li>
      <?php endif; ?>
      </a>


    </div>
  </div>
</section>

<hr>





<?= $this->endSection() ?>