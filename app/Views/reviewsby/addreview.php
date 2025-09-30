<?= $this->extend('layout/defaultlayout') ?>
<?= $this->section('content') ?>

 <div class="container mt-5">
        <h2 style="text-align: center;">Add reviews 🗂️</h2><br>
        <div class="row">
            <div class="col-md-6" style="margin-left: 290px;">
                <div class="card border ">
                   
                    <!-- <div class="card-body">
                        <form action="<?= base_url('/savereviews') ?>" method="POST"> -->



                            <!-- <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label"> <b> Name </b></label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Name" style="width: 500px;">
                                </div><br>
                            </div>
                             <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label"> <b> Email </b></label>
                                    <input type="text" name="email" class="form-control" placeholder="Name" style="width: 500px;">
                                </div><br>
                            </div>
                             <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label"> <b> Comment Type </b></label>
                                     <select class="form-select" name="comment_type" aria-label="Default select example" style="height: 35px; width: 500px;">
                                    <option selected>Select</option>
                                    <option value="Thumbnail">Thumbnail</option>
                                    <option value="Ppt">Ppt</option>
                                    <option value="Blog">Blog</option>
                                </select>
                            </div><br>
                            </div>
                             <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label"> <b> Comment Type Id </b></label>
                                   <input type="text" name="comment_typeId" class="form-control" placeholder="Name" style="width: 500px;">
                              

                                 </div><br>
                            </div>
                             <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label"> <b> Comment </b></label>
                                    <input type="text" name="comment" class="form-control" placeholder="Name" style="width: 500px;">
                                </div><br>
                            </div>
                             <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label"> <b> Approved By </b></label>
                                    <input type="text" name="approved_by" class="form-control" placeholder="Name" style="width: 500px;">
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

                                    <button type="submit" class="btn btn-primary px-4">Save categories</button>
                                </div>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div> -->




<?= $this->endSection()?>