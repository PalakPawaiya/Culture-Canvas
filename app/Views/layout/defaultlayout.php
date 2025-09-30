<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <link rel="stylesheet" href="<?php echo base_url('/public/assets/css/bootstrap.min.css'); ?>">
  <link href="<?php echo base_url('/public/assets/js/main.js');?>">

  <title>Cluster Cnavas</title>
</head>

<body>
  <style>
    body {
      background-color: #f8f9fa;
    }

    .sidebar {
      height: 100vh;
      background-color: #FF671F;
      background-color: #FF671F;
      padding-top: 20px;
      position: fixed;
      left: 0;
      top: 0;
      width: 220px;
    }

    .sidebar a {
      color: white;
      text-decoration: brown;
      text-decoration: none;
      padding: 10px 10px 10px 40px;
      display: block;
    }

    .sidebar a i {
      font-size: 1.5rem;
      /* icon size */
      vertical-align: middle;
      color: white;
    }

    .sidebar a {
      display: flex;
      align-items: center;
      font-weight: bold;
      font-size: 20px;
    }

    .sidebar a:hover {
      background-color: #d46b3aff;
    }

    .content {
      margin-left: 230px;
      padding: 20px;
    }

    .card {
      border: none;
      border-radius: 10px;
    }

    .media-row {
      margin-top: 30px;
      display: flex;
      justify-content: center;
      /* Centers the row horizontally */
      align-items: flex-end;
      flex-wrap: wrap;
      gap: 20px;

    }

    .media-card {
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      padding: 10px;
      height: 350px;
      /* Fixed height for both */
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .media-header {
      font-weight: bold;
      font-size: 16px;
      color: #fff;
      gap: 15px;
      background-color: #007bff;
      padding: 8px 12px;
      border-radius: 6px 6px 0 0;
    }

    .right-align {
      display: block;
      margin-left: auto;
      margin-right: 0;
    }


    .media-content img,
    .media-content video {
      justify-content: flex-end;
      width: 100%;
      height: 280px;
      object-fit: cover;
      border-radius: 6px;
    }
  </style>
  <!-- Sidebar -->
  <div class="sidebar">
    <h3 style="margin-left: 10px; color: white;"><b>Admin View 🛡️</b> </h3>
    <a href="<?= base_url('dashboard') ?>"><i class="bi bi-speedometer2 me-2"></i>📊 Dashboard</a>
    <a href="<?= base_url('category/categories') ?>"><i class="bi bi-people me-2"></i>🗂️ Categories</a>
    <a href="<?= base_url('thumbnail/thumbnail') ?>"><i class="bi bi-people me-2"></i> 🖼️ Thumbnails</a>
    <a href="<?= base_url('ppt/ppt') ?>"><i class="bi bi-journal-text me-2"></i> 📑 PPT</a>
    <a href="<?= base_url('blogs/blog') ?>"><i class="bi bi-list-check me-2"></i> ✍️ Blogs</a>
    <a href="<?= base_url('reviewsby/reviews') ?>"><i class="bi bi-list-check me-2"></i> ✏️ Review</a>

    <a href="<?= base_url('logout') ?>"><i class="bi bi-box-arrow-right me-2"></i>🚪Logout</a>
  </div>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@joeattardi/emoji-button@4.6.2/dist/index.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

  <!-- <script src="<? // echo base_url($js_files) 
                    ?>" type="text/javascript"></script> -->

          ?>
  <div style="padding: 20px;">
    <?= $this->renderSection('content') ?>
  </div>

</body>
<!-- Quill JS -->

</html>