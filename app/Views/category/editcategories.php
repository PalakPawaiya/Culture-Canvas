<?= $this->extend('layout/defaultlayout') ?>
<?= $this->section('content') ?>

<body>
    <div class="container mt-5">
        <h2 style="text-align: center;">Edit Categories 🗂️</h2><br>
        <div class="row">
            <div class="col-md-6" style="margin-left: 290px;">
                <div class="card border">
                    <div class="card-header border-px-4">
                        <h4> Edit Categories 🗂️
                            <!-- <a href="<?= base_url('category/categories') ?>" class="btn btn-danger float-end"> </a> -->
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('updatecategories/' . $categories[0]['id']) ?>" method="POST">
                            <input type="hidden" name="_method" value="PUT" />
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label"> <b>Category Name </b></label>
                                    <input type="text" name="category_name" value="<?= $categories[0]['category_name'] ?>" class="form-control" placeholder="Name" style="width: 500px;">
                                </div>
                            </div>



                            <label for="status" class="form-label">Status</label>
                            <div class="btn-group col-md-12">
                                <div class="form-group"></div>
                                <select class="form-select" name="status" value="<?= $categories[0]['status'] ?>" class="form-control" aria-label="Default select example" style="height: 35px; width: 500px; ">
                                    <option selected>Select</option>

                                    <option value="Active" <?= ($categories[0]['status'] == 'Active') ? 'selected' : '' ?>>Active</option>
                                    <option value="Inactive" <?= ($categories[0]['status'] == 'Inactive') ? 'selected' : '' ?>>Inactive</option>
                                </select>
                            </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary px-4" style="margin-left: 15px; margin-bottom: 10px;">Update Categories</button>
                        </div>
                    </div>
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