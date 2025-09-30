<?php $this->extend('layout/defaultlayout') ?>
<?php $this->section('content') ?>
<div class="row justify-content-center " style="text-align: center;">
  <h3>Thumbnails in Category: <?= !empty($videothumbnails) ? $videothumbnails[0]['category_name'] : 'No Thumbnail'; ?></h3>
  <br><br>
  <br>
  <?php if (!empty($videothumbnails)): ?>
   
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