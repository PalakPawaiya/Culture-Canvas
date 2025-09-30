<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
 <title>Document</title>
</head>
<html?>
    


<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg">
                <div class="card-header text-center  text-white" style="background-color: #FF671F"  >
                    <h4>Register</h4>
                </div>
                <div class="card-body">
                    <?php if(session()->getFlashdata('error')): ?>
                        <div class="alert alert-danger">
                            <?= session()->getFlashdata('error') ?>
                        </div>
                    <?php endif; ?>

                    <form method="post" action="<?= base_url('save') ?>">
                         
                        <div class="mb-3">
                            <label>Email</label>
                            <input type="text" name="user_id" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Password</label>
                            <input type="text" name="password" class="form-control" required>
                        </div>

                      

                        <button type="submit" class="btn  w-100" style="background-color: #FF671F" >Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="<?php echo base_url('/public/assets/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('/public/assets/js/jquery.js'); ?>"></script>
    <script src="<?// echo base_url($js_files) ?>"></script>
    

  </body>
  </html>
