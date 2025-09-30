<?= $this->extend('frontend/layouts/front_layout') ?>

<?= $this->section('frontend_content') ?>
<br><br><br><br><br><br>

<section class="py-5 overflow-hidden" style="background-color:whitesmoke;">
    <div class="container-lg">
        <div class="row">
            <div class="col-md-12">

                <div class="section-header d-flex flex-wrap justify-content-between mb-5">
                    <h2 class="section-title"> Our Videos
                        🎬 </h2>

                    <div class="d-flex align-items-center">
                        <a href="video" class="btn btn-primary me-2">View All</a>
                        <div class="swiper-buttons">
                            <button class="swiper-prev category-carousel-prev btn btn-yellow">❮</button>
                            <button class="swiper-next category-carousel-next btn btn-yellow">❯</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="row g-4">

            <div class="category-carousel swiper">
                <div class="swiper-wrapper">

                    <?php

                    if (isset($videothumbnails) && is_array($videothumbnails)) {


                        foreach ($videothumbnails as $row) :
                    ?>
                            <div class="swiper-slide">
                                <div class="card h-100 shadow-sm border-0 blog-card">

                                    <div class="category-img-container">


                                        <a href="https://www.youtube.com/watch?v=EFZErAelIAI&t=2s" target="_blank">
                                            <img src="<?= base_url('public/uploads/trainings/images/' . $row['image']); ?>"
                                                class="image-hover-effect video-thumbnail" alt="Sample Image"
                                                alt="<?= $row['title'] ?> "
                                                style=" border: 2px solid black; border-radius: 3px; "
                                                style="height: auto; width: 400px; font-size: 20px;">

                                        </a>
                                    </div>
                                    <div class="card-body text-center">
                                        <p class="mt-3 fw-bold text-dark" style=" font-size: 20px; "><?= esc($row['title']) ?></p>
                            
                                        <!-- Buttons -->
                                        <div class="d-flex flex-column gap-2 align-items-center">
                                            <a href="<?= $row['ytvideolink']; ?>" class="btn btn-primary w-70"
                                                target="_blank" style="height: 40px; min-width:260px; white-space: nowrap; margin-top: 1px; "> View Video</a>

                                        </div>
                                        <div class="d-flex justify-content-center gap-2 mt-1">
                                            <!-- Like Button -->
                                            <button class="btn btn-primary w-35 share-btn"
                                                style="height: 40px; min-width: 120px; white-space: nowrap; margin-top: 10px;"
                                                data-link="<?= $row['ytvideolink']; ?>">
                                                <i class="fas fa-share-alt"></i> &nbsp; Share
                                            </button>



                                            <?php
                                            $LikeCount = 0;
                                            if (isset($likesById) && is_array($likesById)) {
                                            foreach ($likesById as $likecount) {
                                                if (in_array($row['id'], $likecount)) {
                                                    $LikeCount =  $likecount['no_of_likes'];
                                                }
                                            }
                                            }
                                            ?>
                                            <form action="<?= base_url('likes/toggleLike/video/' . $row['id']) ?>" method="post" style="display:inline;">
                                                <?= csrf_field() ?>
                                                <button type="submit" class="btn btn-outline-danger btn-primary d-flex align-items-center justify-content-center" style="height: 40px; min-width: 160px; ">
                                                    👍 Like (<?= $LikeCount + 10000 ?>)
                                                </button>
                                            </form>
                                        </div>
                                    </div>


                                </div>
                            </div>


                    <?php endforeach;
                    } ?>

                    <?php

                    $total =  isset($videothumbnails) && is_array($videothumbnails) ?  count($videothumbnails) : 0;
                    if ($total > 0) {
                        echo "";
                    } else {
                        echo "no videos found";
                    }
                    ?>









                </div>
            </div>



        </div>
    </div>
</section>
<hr>

<section class="py-5 overflow-hidden" style="background-color:whitesmoke;">
    <div class="container-lg">
        <div class="row">
            <div class="col-md-12">

                <div class="section-header d-flex flex-wrap justify-content-between mb-5">
                    <h2 class="section-title">Our PPT's 📑</h2>

                    <div class="d-flex align-items-center">
                        <a href="ppt" class="btn btn-primary me-2">View All</a>
                        <div class="swiper-buttons">
                            <button class="swiper-prev category-carousel-prev btn btn-yellow">❮</button>
                            <button class="swiper-next category-carousel-next btn btn-yellow">❯</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="row g-4">

            <div class="category-carousel swiper">
                <div class="swiper-wrapper">


                    <?php if (isset($ppts) && is_array($ppts)) {
                        foreach ($ppts as $row) : ?>

                            <div class="swiper-slide">


                                <div class="card h-100 shadow-sm border-0 blog-card">

                                    <div class="category-img-container">



                                        <img src="<?= base_url('public/uploads/trainings/images/' . $row['image']); ?>"
                                            alt="<?= $row['title'] ?>  "
                                            class="image-hover-effect ppt-img"
                                            style="border: 2px solid black; border-radius: 3px;  " style="height: 190px; width: 370px; font-size: 20px;">
                                    </div>
                                    <!-- Category Name -->
                                    <p class="mt-2 fw-bold text-dark" style=" font-size: 20px; "><?= esc($row['title']) ?></p>
                                    <div class="text-center">

                                        <div class="d-flex align-items-center gap-3" style="margin-bottom: 10px;">
                                            <a href="<?= $row['ytvideolink']; ?>" class="btn btn-primary d-flex align-items-center justify-content-center" target="_blank" style="height: 40px; min-width: 120px; white-space: nowrap;  ">View Video</a></h5>
                                            <button class="btn btn-primary d-flex align-items-center justify-content-center share-btn"
                                                style="height: 40px; min-width: 120px; white-space: nowrap; margin-top: 1px; "


                                                data-title="<?= esc($row['title']); ?>"
                                                data-link="<?= base_url('public/uploads/ppts/' . $row['filename']); ?>">
                                                <i class="fas fa-share-alt"></i> &nbsp; Share
                                            </button>
                                        </div>
                                        <div class="mb-2 text-center ">
                                            <?php
                                            $pptDownloadCount = 0;
                                            if (isset($downloadsById) && is_array($downloadsById)) {
                                            foreach ($downloadsById as $downloadcount) {
                                                if (in_array($row['id'], $downloadcount)) {
                                                    $pptDownloadCount =  $downloadcount['no_of_downloads'];
                                               }
                                            }
                                            }

                                            ?>

                                             <a href="<?= base_url('download/ppt/' . $row['id']); ?>" class="btn btn-primary" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="PPT used in video" style="margin-top: 4px; margin-right: 11px;">
                                                ⬇ Download PPT
                                            </a>
                                        </div>
                                        <p class="mb-1">
                                            Total Downloads: <?= $pptDownloadCount ?><br>
                                        </p>
                                    </div>
                                </div>
                            </div>

                    <?php endforeach;
                    } ?>

                    <?php $total =  isset($ppts) && is_array($ppts) ?  count($ppts) : 0;
                    if ($total > 0) {
                        echo "";
                    } else {
                        echo "no ppts found";
                    }
                    ?>








                </div>
            </div>



        </div>
    </div>
</section>

<hr>
<section class="py-5 overflow-hidden" id="ppts" style="background-color:whitesmoke;">

    <div class="container-lg">

        <div class="bg-secondary text-light py-5 my-5" style="background: url('images/banner-newsletter.jpg') no-repeat; background-size: cover;">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-5 p-3">
                        <div class="section-header">
                            <h2 class="section-title display-5 text-light">Download PPT'S for more knowledge</h2>
                        </div>
                        <p>Just Sign Up & Register for download PPT'S.</p>
                    </div>
                    <div class="col-md-5 p-3">
                        <form>
                            <div class="mb-3">
                                <label for="name" class="form-label d-none">Name</label>
                                <input type="text"
                                    class="form-control form-control-md rounded-0" name="name" id="name" placeholder="Name">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label d-none">Email</label>
                                <input type="email" class="form-control form-control-md rounded-0" name="email" id="email" placeholder="Email Address">
                            </div>
                            <label>
                                <input type="checkbox" required>
                                Check</a>
                            </label><br>
                            <label>
                                <input type="checkbox" id="terms" name="terms" required>
                                I agree to the Terms & Conditions</a>
                            </label><br><br>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-dark btn-md rounded-0">Submit</button>
                            </div>
                        </form>

                    </div>

                </div>

            </div>
        </div>

    </div>
</section>

<hr>
<section class="py-5 overflow-hidden" style="background-color:whitesmoke;">
    <div class="container-lg">
        <div class="row">
            <div class="col-md-12">

                <div class="section-header d-flex flex-wrap justify-content-between mb-5">
                    <h2 class="section-title">Our Blog's ✍️</h2>

                    <div class="d-flex align-items-center">
                        <a href="blog" class="btn btn-primary me-2">View All</a>
                        <div class="swiper-buttons">
                            <button class="swiper-prev category-carousel-prev btn btn-yellow">❮</button>
                            <button class="swiper-next category-carousel-next btn btn-yellow">❯</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="row g-4">

            <div class="category-carousel swiper">
                <div class="swiper-wrapper">


                    <?php if (!empty($blogs)): ?>

                        <?php foreach ($blogs as $i => $row): ?>


                            <div class="swiper-slide">


                                <div class="card h-100 shadow-sm border-0 blog-card">

                                    <div class="category-img-container">

                                        <img src="<?= base_url('public/uploads/trainings/images/' . $row['image']); ?>"
                                            alt="<?= $row['title'] ?> "
                                            class="image-hover-effect"
                                            style="border: 2px solid black; border-radius: 3px;"
                                            style="height: 190px; width: 370px; font-size: 20px; ">
                                    </div>
                                    <!-- Category Name -->
                                    <p class="mt-2 fw-bold text-dark"><?= esc($row['title']) ?></p>
                                    <div style="text-align: cneter;">
                                        <h5>Content:</h5>
                                        <p id="content-<?= $i ?>" class="blog-content">
                                            <?= substr(strip_tags($row['content']), 0, 120) ?>...
                                        </p>
                                        <button class="btn btn-primary btn-sm read-more-btn"
                                            data-id="<?= $i ?>"
                                            data-full="<?= htmlspecialchars($row['content'], ENT_QUOTES) ?>">
                                            Read More
                                        </button>
                                    </div>
                                </div>
                            </div>


                        <?php endforeach; ?>

                    <?php else: ?>
                        <li>No Categories Found</li>
                    <?php endif; ?>





                </div>
            </div>



        </div>
    </div>
</section>

<section>
    <hr style="background-color:whitesmoke;">
    <section id="total" style="background-color:whitesmoke;">
        <div class="container" style="background-color:whitesmoke;">
            <div class="card" style="width: 550px;">

                <b>
                    <h2> Total Downloads: <?= $totalDownloads ?></h2>

                </b>
            </div>&nbsp;&nbsp;&nbsp;

        </div>
    </section>

    <hr>








    <?= $this->endSection() ?>