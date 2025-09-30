<?php $this->extend('layout/defaultlayout') ?>
<?php $this->section('content') ?>

<body>
    <div class="container mt-5">
        <h2 style="text-align: center;">Create Categories 🗂️</h2><br>
        <div class="row">
            <div class="col-md-6" style="margin-left: 290px;">
                <div class="card border ">
                    <div class="card-header border px-4">
                        <h4> Add Categories 🗂️
                            <!-- <a href="<?= base_url('category/categories') ?>" class="btn btn-danger float-end"> </a> -->
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('savecategories') ?>" enctype="multipart/form-data" method="POST">



                            <!-- <div class="row"> -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label"> <b>Category Name </b></label>
                                    <input type="text" name="category_name" class="form-control" placeholder="Name" style="width: 500px;">
                                </div><br>
                            </div>
                              <div class="mb-3">
                                    <label>Image</label>
                                    <input type="file" name="image" class="form-control" style="width: 500px;">
                                </div>

                            <label for="department" class="form-label"><b>Status</b></label>
                            <div class="btn-group col-md-12">

                                <select class="form-select" name="status" aria-label="Default select example" style="height: 35px; width: 500px;">
                                    <option selected>Select</option>
                                    <option value="Active">Active</option>
                                    <option value="Inactive">Inactive</option>
                                </select>
                            </div>
                            <div class="col-md-6"><br>
                                <div class="form-group">

                                    <button type="submit" class="btn btn-primary px-4">Save categories</button>
                                </div>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

<?= $this->endSection() ?>