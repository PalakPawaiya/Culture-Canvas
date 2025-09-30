<?= $this->extend('layout/defaultlayout') ?>
<?= $this->section('content') ?>

<div class="content">
    <h2>Welcome, Categories 🗂️ </h2>
    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card bg-primary text-white p-3">
                <h5>Total Categories 🗂️ </h5>
                <h3><?php $total =  isset($categories) && is_array($categories) ?  count($categories) : 0;
                    echo $total;
                    ?>

                </h3>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-success text-white p-3">
                <h5>Active Categories 🗂️ </h5>
                <?php
                $active_categories = 0;
                $inactive_categories = 0;
                if (isset($categories) && is_array($categories)) {
                    foreach ($categories as $category) {
                        if ($category['status'] == 'Active') {
                            $active_categories = $active_categories + 1;
                        } else {
                            $inactive_categories = $inactive_categories + 1;
                        }
                    }
                } ?>
                <h3><?php echo $active_categories; ?></h3>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-danger text-white p-3">
                <h5>Inactive Categories 🗂️ </h5>
                <h3> <?php echo $inactive_categories; ?></h3>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top: 65px; min-width: 1080px; ">
        <div class="row">
            <div class="col-md-12">
                <div class="card border">
                    <div class="card-header border px-4 ">
                        <h4>Categories 🗂️
                            <a href="<?= base_url('category/addcategories') ?>" class="btn btn-primary float-end"> <span style="color: yellow;">➕</span> Add Categories </a>

                        </h4><br>

                        <table id="categoriesTable" class="display" class="table table-bordered col-md-4 ">
                            <thead>
                                <tr>
                                    <th style="text-align: center; background-color: white">S. No.</th>
                                    <th style="text-align: center; background-color: white">Category Name</th>

                                    <th style="text-align: center; background-color: white">Status</th>

                                    <th style="text-align: center; background-color: white">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php if (isset($categories) && is_array($categories)) {
                                    foreach ($categories as $row) : ?>
                                        <tr>
                                            <td style="text-align: center; background-color: wahite"><?= $i++;
                                                                                                        $row['id'] ?></td>
                                            <td style="text-align: center; background-color:white"><?= $row['category_name'] ?></td>

                                            <td style="text-align: center;background-color: white"><?= $row['status'] ?></td>


                                            <td style="background-color: white ">
                                                <a type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#viewModal<?= $row['id'] ?>">
                                                    View
                                                </a>
                                                
                                                <a href="<?= base_url('category/editcategories/' . $row['id']) ?>" class="btn btn-success btn-sm " style="text-align: center; vertical-align: middle; margin: 2px;">Edit</a>

                                                <a href="<?= base_url('category/inactivecategories/' . $row['id'] . '/' . $row['status']) ?>" class="btn btn-danger btn-sm action-btn" style="min-width: 80px;"><?php echo  $row['status']  == 'Active' ? "Inactivate" : "Activate";  ?></a>
                                                <a href="<?= base_url('category/deletecategories/' . $row['id']) ?>" class="btn btn-danger btn-sm " onclick="return confirm('Are you sure you want to delete this category ?');">Delete</a>
                                                <!-- Modal -->
                                                <div class="modal fade" id="viewModal<?= $row['id'] ?>" tabindex="-1">
                                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Category Details</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="d-flex align-items-center mb-3">
                                                                    <table class="table table-bordered table-striped text-center align-middle">
                                                                        <thead class="table-dark">
                                                                            <tr>
                                                                                <th>📂 Item</th>
                                                                                <th>🔗 Action</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>
                                                                                    <b>🖼️ View Thumbnails:</b>
                                                                                </td>


                                                                                <td>
                                                                                    <a class="btn btn-primary " href="<?= base_url('thumbnail/bycategory/' . $row['id']); ?>">View Thumbnail 🖼️

                                                                                    </a>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>

                                                                                <td><b>📑 View ppt's : </b></td>
                                                                                <td>
                                                                                    <a class="btn btn-success " href="<?= base_url('ppt/pptbycategory/' . $row['id']); ?>">View Ppts 📑</a>
                                                                                </td>
                                                                            </tr>

                                                                            <tr>

                                                                                <td> <b>✍️ View Blogs :</b></td>

                                                                                <td>
                                                                                    <a class="btn btn-danger " href="<?= base_url('blogs/blogbycategory/' . $row['id']); ?>">View Blogs ✍️</a>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>

                                                                    <div class="modal-footer text-end mt-3">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                        <button type="button" class="btn btn-primary">Understood</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </td>

                                        </tr>
                                <?php endforeach;
                                } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="4" style="text-align: center;"> <?php $total =  isset($categories) && is_array($categories) ?  count($categories) : 0;
                                                                                    if ($total > 0) {
                                                                                        echo "";
                                                                                    } else {
                                                                                        echo "no rows found";
                                                                                    } ?></td>
                                </tr>
                            </tfoot>
                        </table>



                    </div>
                </div>
            </div>
        </div>
    </div>

    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

 <script>
 $(document).ready(function() {
            $('#categoriesTable').DataTable({
            
                "pageLength": 5, // ek page pe 5 rows
                "lengthMenu": [5, 10, 20, 50], // user change kar sake rows per page
                "ordering": true, // sorting enable
                "searching": true, // search bar enabl

            });
            
        });
</script> 


















    <?= $this->endSection() ?>