<?= $this->extend('layout/defaultlayout') ?>
<?= $this->section('content') ?>

<div class="content">
    <h2>Welcome, Blogs ✍️ </h2>
    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card bg-primary text-white p-3">
                <h5>Total Blogs ✍️</h5>
                <h3><?php $total = isset($blogs) && is_array($blogs) ? count($blogs) : 0;
                    echo $total ?></h3>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-success text-white p-3">
                <h5>Active Blogs ✍️</h5>
                <?php
                $active_blogs = 0;
                $inactive_blogs = 0;
                if (isset($blogs) && is_array($blogs)) {
                    foreach ($blogs as $blog) {
                        if ($blog['status'] == 'Active') {
                            $active_blogs = $active_blogs + 1;
                        } else {
                            $inactive_blogs = $inactive_blogs + 1;
                        }
                    }
                } ?>
                <h3><?php echo $active_blogs; ?></h3>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-danger text-white p-3">
                <h5>Inactive Blogs ✍️</h5>
                <h3> <?php echo $inactive_blogs; ?></h3>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top: 65px; min-width: 1080px; ">
        <div class="row">
            <div class="col-md-12">
                <div class="card border">
                    <div class="card-header border px-4">
                        <h4> Blogs
                            <a href="<?= base_url('blogs/addblog') ?>" class="btn btn-primary float-end"> <span style="color: yellow;">➕</span>Add Blogs </a>

                        </h4><br>

                        <table id="blogTable" class="display" class="table table-bordered col-md-4">
                            <thead class="table table-bordered col-md-4">
                                <tr>
                                    <th style="text-align: center;">S. No.</th>
                                    <th style="text-align: center;">Title</th>
                                    <th style="text-align: center;">Category Name</th>
                                    <th style="text-align: center;">Status</th>
                                    <th style="text-align: center; ">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php if (isset($blogs) && is_array($blogs)) {
                                    foreach ($blogs as $row) : ?>
                                        <tr>
                                            <td style="text-align: center;"><?= $i++;
                                                                            $row['id'] ?></td>
                                            <td style="text-align: center;"><?= $row['title'] ?></td>
                                            <td style="text-align: center;"><?= $row['category_name'] ?></td>
                                            <td style="text-align: center;"><?= $row['status'] ?></td>

                                            <td>
                                                <a type="button" class="btn btn-primary btn-sm" style="min-width: 80px;" data-bs-toggle="modal" data-bs-target="#viewModal<?= $row['id'] ?>">
                                                    View
                                                </a>

                                                <a href="<?= base_url('blogs/editblog/' . $row['id']) ?>" class="btn btn-success btn-sm " style="text-align: center; vertical-align: middle; margin: 2px; min-width: 50px;">Edit</a>

                                                <a href="<?= base_url('blogs/inactiveblog/' . $row['id'] . '/' . $row['status']) ?>" class="btn btn-danger btn-sm action-btn" style="min-width: 80px;"><?php echo  $row['status']  == 'Active' ? "Inactivate" : "Activate";  ?></a>
                                                <a href="<?= base_url('blogs/deleteblog/' . $row['id']) ?>" class="btn btn-danger btn-sm " onclick="return confirm('Are you sure you want to delete this blog ?');" style="min-width: 50px;">Delete</a>
                                                <!-- Modal -->
                                                <div class="modal fade" id="viewModal<?= $row['id'] ?>" tabindex="-1">
                                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Blog Details</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <table class="table table-bordered table-sm">
                                                                    <div class="row">
                                                                        <div class="col-md-6 text-center">
                                                                            <?php
                                                                            $image = !empty($row['image'])
                                                                                ? base_url('public/uploads/trainings/images/' . $row['image'])
                                                                                : base_url('public/uploads/trainings/images/defaultimage.jpg');
                                                                            ?>
                                                                            <img src="<?= base_url('public/uploads/trainings/images/' . $row['image']) ?>" alt="Thumbnail" class="img-fluid" style="max-width: 100%; height: auto;">

                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <h5><b>Title:</b> <?= $row['title']; ?></h5>
                                                                            <h5>
                                                                                <p><b>Category Name:</b>
                                                                                    <a href="<?= base_url('blogs/blogbycategory/' . $row['category_id']); ?>">
                                                                                        <?= $row['category_name']; ?>
                                                                                    </a>



                                                                                </p>
                                                                                <h5><b>Content:</b> <?= $row['content']; ?></h5>
                                                                            </h5>
                                                                            <h5>
                                                                                <p><b>Status:</b>
                                                                                    <?php if ($row['status'] == 'Active'): ?>
                                                                                        <span class="badge bg-success">Active</span>
                                                                                    <?php else: ?>
                                                                                        <span class="badge bg-danger">Inactive</span>
                                                                                    <?php endif; ?>
                                                                                </p>
                                                                            </h5>
                                                                            <!-- Write Comment Button -->
                                                                             <button type="button" class="btn btn-info btn-sm mt-2" id="openReviewBtn" data-bs-target="#reviewModal" data-bs-dismiss="modal">
                                                                                View Reviews
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </table>


                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    <button type="button" class="btn btn-primary">Understood</button>
                                                                </div>
                                                                 <!-- Review Modal -->
                                                                <div class="modal fade" id="reviewModal" tabindex="-1" aria-labelledby="reviewModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog modal-lg">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="reviewModalLabel">Reviews</h5>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <table class="table table-bordered table-striped">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th>Name</th>
                                                                                            <th>Email</th>
                                                                                            <th>Review</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        <?php if (!empty($reviews)): ?>
                                                                                            <?php foreach ($reviews as $rev): ?>
                                                                                                <tr>
                                                                                                    <td><?= esc($rev['name']); ?></td>
                                                                                                    <td><?= esc($rev['email']); ?></td>
                                                                                                    <td><?= esc($rev['review']); ?></td>
                                                                                                </tr>
                                                                                            <?php endforeach; ?>
                                                                                        <?php else: ?>
                                                                                            <tr>
                                                                                                <td colspan="3" class="text-center">No Reviews Found</td>
                                                                                            </tr>
                                                                                        <?php endif; ?>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                            </td>
                                            </td>
                                        </tr>
                                        <!-- Comment Modal -->
                                        <div class="modal fade" id="commentModal" tabindex="-1" aria-labelledby="commentModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form action="<?= base_url('/savecomments') ?>" method="post">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="commentModalLabel">Add Your Comment</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <input type="hidden" name="comment_type" id="commentType"> <!-- or ppt, thumbnail -->
                                                            <input type="hidden" name="comment_typeId" value="<?= $row['id'] ?>"> <!-- dynamic ID -->

                                                            <div class="mb-3">
                                                                <label for="commentText">Your Comment</label>
                                                                <textarea class="form-control" id="commentText" name="comment" rows="4" placeholder="Write your comment here..." required></textarea>
                                                            </div>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                            <!-- type="submit" zaroori hai -->
                                                            <button type="submit" class="btn btn-success">Post Comment</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                <?php endforeach;
                                } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="5" style="text-align: center;">
                                        <?php
                                        $total = isset($blogs) && is_array($blogs) ? count($blogs) : 0;
                                        if ($total > 0) {
                                            echo "";
                                        } else {
                                            echo "no rows found";
                                        }

                                        ?>
                                    </td>
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
        document.addEventListener("DOMContentLoaded", function() {
            // button select karo
            var reviewBtn = document.getElementById("openReviewBtn");

            // modal element select karo
            var reviewModal = document.getElementById("reviewModal");
            var viewModal = document.getElementById("viewModal");

            if (reviewBtn && reviewModal) {
                reviewBtn.addEventListener("click", function() {
                    var pptInstance = bootstrap.Modal.getInstance(viewModal);
                    if (pptInstance) {
                        pptInstance.hide();
                    }

                    // bootstrap modal instance banao
                    var reviewInstance = new bootstrap.Modal(reviewModal);
                    reviewInstance.show(); // modal open karega
                });
                viewModal.addEventListener('hidden.bs.modal', function() {
                    var reviewInstance = new bootstrap.Modal(reviewModal);
                    reviewInstance.show();
                }, {
                    once: true
                });
            }
        });
    </script>

 <script>
 $(document).ready(function() {
            $('#blogTable').DataTable({
            
                "pageLength": 5, // ek page pe 5 rows
                "lengthMenu": [5, 10, 20, 50], // user change kar sake rows per page
                "ordering": true, // sorting enable
                "searching": true, // search bar enabl

            });
            
        });
</script> 


















    <?= $this->endSection() ?>