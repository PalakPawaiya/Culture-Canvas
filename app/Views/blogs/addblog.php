<?php $this->extend('layout/defaultlayout') ?>
<?php $this->section('content') ?>

<body>
    <div class="container mt-5">
        <h2 style="text-align: center;">Create Blog ✍️</h2><br>
        <div class="row">
            <div class="col-md-6" style="margin-left: 290px;">
                <div class="card border ">
                    <div class="card-header border px-4">
                        <h4> Add Blog ✍️
                            <!-- <a href="<?= base_url('blogs/blog') ?>" class="btn btn-danger float-end"> </a> -->
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('saveblog') ?>" enctype="multipart/form-data" method="POST">



                            <!-- <div class="row"> -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label"> <b>Title</b></label>
                                    <input type="text" name="title" class="form-control" placeholder="Name" style="width: 500px;">
                                </div><br>
                            </div>
                            <div class="mb-3 px-1">
                                <label class="form-label"><b> Categories</b></label>
                                <select class="form-select" name="category_name" class="form-control" style="width: 500px;" required>
                                    <option value=""> Select </option>

                                    <?php foreach ($categories as $category): ?>
                                        <option value="<?= $category['id'] ?>"><?= $category['category_name'] ?></option>
                                    <?php endforeach; ?>

                                </select>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label"> <b>Meta Tags</b></label>
                                        <textarea type="text-area" name="metatags" class="form-control" placeholder="metatags" style="width: 500px;"></textarea>
                                    </div><br>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label"> <b>Meta Description </b></label>
                                        <textarea type="text-area" name="metadescriptions" class="form-control" placeholder="metadescriptions" style="width: 500px;"></textarea>
                                    </div><br>
                                </div>
                                 <div class="mb-3">
                                    <label>Image</label>
                                    <input type="file" name="image" class="form-control" style="width: 500px;">
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label"> <b>Content </b></label>
                                        <textarea type="text-area" id="content" name="content" class="form-control" placeholder="content" style="width: 500px;"><?= old('content') ?></textarea>
                                    </div><br>
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

                                        <button type="submit" class="btn btn-primary px-4">Save blog</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</body>

<script src="https://cdn.tiny.cloud/1/fl556cbn40yifv89gu6w4d2hao741sbfisa2hu6bz45tmaqg/tinymce/6/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector: '#content',
         apiKey: 'fl556cbn40yifv89gu6w4d2hao741sbfisa2hu6bz45tmaqg',

        plugins: 'link image code',
        toolbar: 'undo redo | bold italic | alignleft aligncenter alignright | code'
    });
</script>
<?= $this->endSection() ?>