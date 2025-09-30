<?= $this->extend('layout/defaultlayout') ?>
<?= $this->section('content') ?>

<body>
    <div class="container mt-5">
        <h2 style="text-align: center;">Edit Ppt 📑</h2><br>
        <div class="row">
            <div class="col-md-6" style="margin-left: 290px;">
                <div class="card border">
                    <div class="card-header border-px-4">
                        <h4> Edit Ppt 📑
                            <!-- <a href="<?= base_url('ppt/ppt') ?>" class="btn btn-danger float-end"> </a> -->
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('updateppt/' . $ppts[0]['id']) ?>" method="POST">
                            <input type="hidden" name="_method" value="PUT" />
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label"> <b>Title </b></label>
                                    <input type="text" name="title" value="<?= $ppts[0]['title'] ?>" class="form-control" placeholder="title" style="width: 500px;">
                                </div>
                            </div>
                            <div class="mb-3 px-1">
                                <label class="form-label"><b> Categories</b></label>
                                <select class="form-select" name="category_id" value="<?= esc($categories[0]['category_id'] ?? '') ?>" class="form-control" style="width: 500px;" required>
                                    <option value=""> Select </option>

                                    <?php foreach ($categories as $category): ?>
                                        <option value="<?php echo $category['id']; ?>"
                                            <?php if ($ppts[0]['category_id'] == $category['id']): ?>
                                            selected="selected"
                                            <?php endif; ?>>
                                            <?php echo  $category['category_name']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label"> <b>Meta Tags</b></label>
                                        <textarea type="text-area" name="metatags" value="<?= $ppts[0]['metatags'] ?>" class="form-control" placeholder="metatags" style="width: 500px;"><?= $ppts[0]['metatags'] ?></textarea>
                                    </div><br>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label"> <b>Meta Description </b></label>
                                        <textarea type="text-area" name="metadescriptions" class="form-control" placeholder="metadescriptions" style="width: 500px;"><?= $ppts[0]['metadescriptions'] ?></textarea>
                                    </div><br>
                                </div>


                                <div class="mb-3">
                                    <label>Image</label>
                                    <input type="file" name="image" value="<?= $ppts[0]['image'] ?>" class="form-control" style="width: 500px;">
                                </div>
                                <div class="mb-3">
                                    <label>Filename</label>
                                    <input type="file" name="filename" value="<?= $ppts[0]['filename'] ?>" class="form-control" style="width: 500px;">
                                </div>
                                 <div class="mb-3">
                                    <label>Video Link</label>
                                    <input type="text" name="ytvideolink" value="<?= $ppts[0]['ytvideolink'] ?>" class="form-control" style="width: 500px;">
                                </div>
                                <label for="status" class="form-label">Status</label>
                                <div class="btn-group col-md-12">
                                    <div class="form-group"></div>
                                    <select class="form-select" name="status" value="<?= $ppts[0]['status'] ?>" class="form-control" aria-label="Default select example" style="height: 35px; width: 500px; ">
                                        <option selected>Select</option>

                                        <option value="Active" <?= ($ppts[0]['status'] == 'Active') ? 'selected' : '' ?>>Active</option>
                                        <option value="Inactive" <?= ($ppts[0]['status'] == 'Inactive') ? 'selected' : '' ?>>Inactive</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary px-4" style="margin-left: 15px; margin-bottom: 10px;">Update Ppt</button>
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