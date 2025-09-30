<?php $this->extend('layout/defaultlayout') ?>
<?php $this->section('content') ?>
<div class="row justify-content-center " style="text-align: center;">
  <h3>Ppts in Category: <?= !empty($ppts) ? $ppts[0]['category_name'] : 'No Category'; ?></h3>
  <br><br>
  <br>
  <?php if (!empty($ppts)): ?>
    <div class="row  justify-content-center ">
      <?php foreach ($ppts as $row): ?>
        <div class="col-md-4 ">
          <div class="card mb-4 me-md-3">
            <?php
            $image = !empty($row['image'])
              ? base_url('public/uploads/trainings/images/' . $row['image'])
              : base_url('public/uploads/trainings/images/defaultimage.jpg');
            ?>
            <img src="<?= base_url('public/uploads/trainings/images/' . $row['image']); ?>">

            <div class="card-body border-radius-12">

              <h5 class="card-title"><?= $row['title']; ?></h5>
             
              <a href="<?= base_url('public/uploads/ppts/' . $row['filename']); ?>" class="btn btn-primary" target="_blank"> Download PPT</a></h5>
              <p><b>Downloaded:</b> <?= $row['download_count'] ?> times</p>

              <a href="<?= $row['ytvideolink']; ?>" class="btn btn-primary" target="_blank">View Video</a></h5>
              <br>
              <br>
            
              <br>
              <p><b>Status:</b>
                <?php if ($row['status'] == 'Active'): ?>
                  <span class="badge bg-success">Active</span>
                <?php else: ?>
                  <span class="badge bg-danger">Inactive</span>
                <?php endif; ?>
              </p>
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