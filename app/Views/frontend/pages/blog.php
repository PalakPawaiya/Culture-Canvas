<?= $this->extend('frontend/layouts/front_layout1') ?>

<?= $this->section('frontend_content') ?>



<section id="blogs" class="products-carousel" style="background-color:whitesmoke;">
  <div class="container-lg overflow-hidden py-5">
    <div class="row">
      <div class="col-md-12">

        <div class="section-header d-flex flex-wrap justify-content-center my-4" style="margin-bottom: 10px;" >

          <h2 class="section-title">View All Blog'S ✍️</h2>

      
        </div>

      </div>
    </div>


   <br><br>


    <div class="row">
      <?php if (!empty($blogs)): ?>

        <?php foreach ($blogs as $i => $row): ?>


          <div class="col-md-4">


            <div class="card h-100 shadow-sm border-0 blog-card">

              <div class="category-img-container">

                <img src="<?= base_url('public/uploads/trainings/images/' . $row['image']); ?>"
                  alt="<?= esc($row['title']) ?> "
                  class="image-hover-effect"
                  style="border: 2px solid black; border-radius: 3px;"
                  style="height: 190px; width: 370px; font-size: 20px; ">
              </div>
              <!-- Category Name -->
              <p class="mt-2 fw-bold text-dark"><?= esc($row['title']) ?></p>
              <div style="text-align: cneter;">
                <h5>Content:</h5>
                <p id="content-<?= $i ?>" class="blog-content">
                  <?= substr(strip_tags($row['content']), 0, 120) ?>...
                </p>
                <button class="btn btn-primary btn-sm read-more-btn"
                  data-id="<?= $i ?>"
                  data-full="<?= htmlspecialchars($row['content'], ENT_QUOTES) ?>">
                  Read More
                </button>
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