<?= $this->extend('layout/defaultlayout') ?>
<?= $this->section('content') ?>

<div class="container mt-5">
    <h2 style="text-align: center;">Type Comment 🗂️</h2><br>
    <div class="row">
        <div class="col-md-6" style="margin-left: 290px;">
            <div class="card border ">

                <div class="card-body">
                    <form action="<?= base_url('updatereviews/' . $reviews[0]['id']) ?>" method="POST">
                        <input type="hidden" name="_method" value="PUT" />


                        <!-- <div class="row"> -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label"> <b> Name </b></label>
                                <input type="text" name="name" value="<?= $reviews[0]['name'] ?>" class="form-control" placeholder="Name" style="width: 500px;">
                            </div><br>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label"> <b> Email </b></label>
                                <input type="text" name="email" class="form-control" value="<?= $reviews[0]['email'] ?>" placeholder="Name" style="width: 500px;">
                            </div><br>
                        </div>
                        <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label"> <b> Comment Type </b></label>
                                     <select class="form-select" name="comment_type" value="<?= $reviews[0]['comment_type'] ?>" aria-label="Default select example" style="height: 35px; width: 500px;">
                                    <option selected>Select</option>
                                    <option value="Thumbnail"  <?= ($reviews[0]['comment_type'] == 'Thumbnail') ? 'selected' : '' ?>>Thumbnail</option>
                                    <option value="Ppt"  <?= ($reviews[0]['comment_type'] == 'Ppt') ? 'selected' : '' ?>>Ppt</option>
                                    <option value="Blog"  <?= ($reviews[0]['comment_type'] == 'Blog') ? 'selected' : '' ?>>Blog</option>
                                </select>
                            </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label"> <b> Comment Type Id </b></label>
                                <input type="text" name="comment_typeId" class="form-control" value="<?= $reviews[0]['comment_typeId'] ?>" placeholder="Name" style="width: 500px;">
                            </div><br>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label"> <b> Comment </b></label>
                                <input type="text" name="comment" class="form-control" value="<?= $reviews[0]['comment'] ?>" placeholder="Name" style="width: 500px;">
                            </div><br>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label"> <b> Approved By </b></label>
                                <input type="text" name="approved_by" class="form-control" value="<?= $reviews[0]['approved_by'] ?>" placeholder="Name" style="width: 500px;">
                            </div><br>
                        </div>


                        <label for="status" class="form-label">Status</label>
                        <div class="btn-group col-md-12">
                            <div class="form-group"></div>
                            <select class="form-select" name="status" value="<?= $reviews[0]['status'] ?>" class="form-control" aria-label="Default select example" style="height: 35px; width: 500px; ">
                                <option selected>Select</option>

                                <option value="Active" <?= ($reviews[0]['status'] == 'Active') ? 'selected' : '' ?>>Active</option>
                                <option value="Inactive" <?= ($reviews[0]['status'] == 'Inactive') ? 'selected' : '' ?>>Inactive</option>
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




<?= $this->endSection() ?>