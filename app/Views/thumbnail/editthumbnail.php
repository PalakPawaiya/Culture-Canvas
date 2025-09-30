<?= $this->extend('layout/defaultlayout') ?>
<?= $this->section('content') ?>

<body>
    <div class="container mt-5">
        <h2 style="text-align: center;">Edit Thumnail 🖼️</h2><br>
        <div class="row">
            <div class="col-md-6" style="margin-left: 290px;">
                <div class="card border">
                    <div class="card-header border-px-4">
                        <h4> Edit Thumbnail 🖼️
                            <!-- <a href="<?= base_url('thumbnail/thumbnail') ?>" class="btn btn-danger float-end"> </a> -->
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('updatethumbnail/' . $videothumbnails[0]['id']) ?>" enctype="multipart/form-data" method="POST">
                            <input type="hidden" name="_method" value="PUT" />
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label"> <b>Title </b></label>
                                    <input type="text" name="title" value="<?= $videothumbnails[0]['title'] ?>" class="form-control" placeholder="title" style="width: 500px;">
                                </div>
                                <div class="mb-3 px-1">
                                    <label class="form-label"><b> Categories</b></label>
                                    <select class="form-select" name="category_id" value="<?= esc($videothumbnails[0]['category_id'] ?? '') ?>" class="form-control" style="width: 500px;" required>
                                        <option value=""> Select </option>

                                        <?php foreach ($categories as $category): ?>
                                            <option value="<?php echo $category['id']; ?>"
                                                <?php if ($videothumbnails[0]['category_id'] == $category['id']): ?>
                                                selected="selected"
                                                <?php endif; ?>>
                                                <?php echo  $category['category_name']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label"> <b>Meta Tags </b></label>
                                            <textarea type="text" name="metatags" class="form-control" placeholder="metatags" style="width: 500px;"><?= $videothumbnails[0]['metatags'] ?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label"> <b>Meta Description</b></label>
                                            <textarea type="text" name="metadescriptions" class="form-control" placeholder="metadescription" style="width: 500px;"><?= $videothumbnails[0]['metadescriptions'] ?></textarea>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label>Image</label>
                                        <input type="file" name="image" value="<?= $videothumbnails[0]['image'] ?>" class="form-control" style="width: 500px;">
                                  
    
                                    </div>




                                    <label for="status" class="form-label">Status</label>
                                    <div class="btn-group col-md-12">
                                        <div class="form-group"></div>
                                        <select class="form-select" name="status" value="<?= $videothumbnails[0]['status'] ?>" class="form-control" aria-label="Default select example" style="height: 35px; width: 500px; ">
                                            <option selected>Select</option>

                                            <option value="Active" <?= ($videothumbnails[0]['status'] == 'Active') ? 'selected' : '' ?>>Active</option>
                                            <option value="Inactive" <?= ($videothumbnails[0]['status'] == 'Inactive') ? 'selected' : '' ?>>Inactive</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary px-4" style="margin-left: 15px; margin-bottom: 10px;">Update PPT</button>
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