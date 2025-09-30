<?= $this->extend('layout/defaultlayout') ?>
<?= $this->section('content') ?>

<div class="content">
    <h2>Welcome, Reviews 🗂️ </h2>
    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card bg-primary text-white p-3">
                <h5>Total Reviews 🗂️ </h5>
                <h3><?php $total =  isset($reviews) && is_array($reviews) ?  count($reviews) : 0;
                    echo $total;
                    ?>

                </h3>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-success text-white p-3">
                <h5>Active reviews 🗂️ </h5>
                <?php
                $active_reviews = 0;
                $inactive_reviews = 0;
                if (isset($reviews) && is_array($reviews)) {
                    foreach ($reviews as $review) {
                        if ($review['status'] == 'Active') {
                            $active_reviews = $active_reviews + 1;
                        } else {
                            $inactive_reviews = $inactive_reviews + 1;
                        }
                    }
                } ?>
                <h3><?php echo $active_reviews; ?></h3>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-danger text-white p-3">
                <h5>Inactive reviews 🗂️ </h5>
                <h3> <?php echo $inactive_reviews; ?></h3>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top: 65px; min-width: 1080px; ">
        <div class="row">
            <div class="col-md-12">
                <div class="card border">
                    <div class="card-header border px-4 ">
                        <h4>reviews 🗂️
                            
                        </h4><br>

                        <table id="reviewTable" class="display" class="table table-bordered col-md-4 ">
                            <thead>
                                <tr>
                                    <th style="text-align: center; background-color: white">S. No.</th>
                                    

                                    <th style="text-align: center; background-color: white">review</th>
                                    <th style="text-align: center; background-color: white">review Type</th>
                                    <th style="text-align: center; background-color: white">review Type Id</th>
                                    <th style="text-align: center; background-color: white">Status</th>
                                    <th style="text-align: center; background-color: white">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php if (isset($reviews) && is_array($reviews)) {
                                    foreach ($reviews as $row) : ?>
                                        <tr>
                                            <td style="text-align: center; background-color: wahite"><?= $i++;
                                                                                                        $row['id'] ?></td>
                                           
                                            <td style="text-align: center; background-color:white"><?= $row['review'] ?></td>
                                            <td style="text-align: center; background-color:white"><?= $row['review_type'] ?></td>
                                            <td style="text-align: center; background-color:white"><?= $row['review_typeId'] ?></td>
                                            <td style="text-align: center;background-color: white"><?= $row['status'] ?></td>


                                            <td style="background-color: white ">


                                                <a href="<?= base_url('reviewsby/editreview/' . $row['id']) ?>" class="btn btn-success btn-sm " style="text-align: center; vertical-align: middle; margin: 2px;">Edit</a>

                                                <a href="<?= base_url('reviewsby/inactivereview/' . $row['id'] . '/' . $row['status']) ?>" class="btn btn-danger btn-sm action-btn" style="min-width: 80px;"><?php echo  $row['status']  == 'Active' ? "Inactivate" : "Activate";  ?></a>
                                                <a href="<?= base_url('reviewsby/deletereview/' . $row['id']) ?>" class="btn btn-danger btn-sm " onclick="return confirm('Are you sure you want to delete this category ?');">Delete</a>


                                            </td>

                                        </tr>
                                <?php endforeach;
                                } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="5" style="text-align: center;"> <?php $total =  isset($reviews) && is_array($reviews) ?  count($reviews) : 0;
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
            $('#reviewTable').DataTable({
            
                "pageLength": 5, // ek page pe 5 rows
                "lengthMenu": [5, 10, 20, 50], // user change kar sake rows per page
                "ordering": true, // sorting enable
                "searching": true, // search bar enabl

            });
            
        });
</script> 

















    <?= $this->endSection() ?>