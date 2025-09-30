<?php $this->extend('layout/defaultlayout') ?>
<?php $this->section('content') ?>
<div class="row justify-content-center " style="text-align: center;">
  <h3>Blogs in Category: <?= !empty($blogs) ? $blogs[0]['category_name'] : "No Blog Found" ?></h3>
  <br><br>
  <br>
  <?php if (!empty($blogs)): ?>
    <div class="row  justify-content-center ">
      <?php foreach ($blogs as $row): ?>
        <div class="col-md-4 ">
          <div class="card mb-4 me-md-3">
            <?php
            $image = !empty($row['image'])
              ? base_url('public/uploads/trainings/images/' . $row['image'])
              : base_url('public/uploads/trainings/images/defaultimage.jpg');
            ?>
            <img src="<?= base_url('public/uploads/trainings/images/' . $row['image']); ?>">

            <div class="card-body border-radius-12">
              <div class="d-flex align-items-start mb-3">
                <h5 class="me-2 fw-bold" style="width: 100px;">Title:</h5>
                <h5 class="card-title mb-0"><?= $row['title']; ?></h5>
              </div>

              <div class="d-flex align-items-start mb-3">
                <h5 class="me-2 fw-bold" style="width: 100px;">Content:</h5>
                <h5 class="card-title mb-0" style="text-align: justify;">
                  <?= $row['content']; ?>
                </h5>
              </div>

              <div class="d-flex align-items-start">
                <h5 class="me-2 fw-bold" style="width: 100px;">Status :</h5>
                <span class="badge bg-success">Active</span>
              </div>
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
    <?= $this->endSection() ?>