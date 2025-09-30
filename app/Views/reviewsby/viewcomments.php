<?php foreach ($comments as $c): ?>
  <div class="card mt-2">
    <div class="card-body">
      <h6><?= esc($c['user_name']) ?> <small class="text-muted"><?= $c['created_at'] ?></small></h6>
      <p><?= esc($c['comment']) ?></p>
    </div>
  </div>
<?php endforeach; ?>