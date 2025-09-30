<?= $this->extend('layout/defaultlayout') ?>
<?= $this->section('content') ?>
<div class="content">
    <h2>Welcome, Admin Dashboard <span style="font-size:30px;">👋</span>
    </h2>
    <div class="container mt-5">
        <div class="row text-center">

            <div class="col-md-3 mb-3">
                <div class="card bg-primary text-white p-3">
                    <h5>Total Categories 🗂️ </h5>
                    <h2><?= $totalCategories ?? 0 ?></h2>
                </div>
            </div>

            <div class="col-md-3 mb-3">
                <div class="card bg-success text-white p-3">
                    <h5>Total Thumbnails 🖼️</h5>
                    <h2><?= $totalThumbnails ?? 0 ?></h2>
                </div>
            </div>

            <div class="col-md-3 mb-3">
                <div class="card bg-warning text-white p-3">
                    <h5>Total PPT 📑</h5>
                    <h2><?= $totalPpts ?? 0 ?></h2>
                </div>
            </div>

            <div class="col-md-3 mb-3">
                <div class="card bg-danger text-white p-3">
                    <h5>Total Blogs ✍️</h5>
                    <h2><?= $totalBlogs ?? 0 ?></h2>
                </div>
            </div>
        </div>
    </div>
    <br><br>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <canvas id="myChart" height="100"></canvas>

    <script>
        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
            type: 'bar', // 'bar', 'pie', 'line' sab use kar sakte ho
            data: {
                labels: ['Categories 🗂️', 'Thumbnails 🖼️', 'Ppts 📑', 'Blogs ✍️'],
                datasets: [{
                    label: 'Total Count',
                    data: [
                        <?= $totalCategories ?? 0 ?>,
                        <?= $totalThumbnails ?? 0 ?>,
                        <?= $totalPpts ?? 0 ?>,
                        <?= $totalBlogs ?? 0 ?>,

                    ],
                    backgroundColor: [
                        '#007bff',
                        '#28a745',
                        '#ffc107',
                        '#dc3545',
                       
                    ],
                    borderColor: [
                        '#007bff',
                        '#28a745',
                        '#ffc107',
                        '#dc3545',
                        
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        precision: 0
                    }
                }
            }
        });
    </script>







    <?= $this->endSection() ?>