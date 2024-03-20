<?= $this->extend('layout/master') ?>

<?= $this->section('main-content') ?>
<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-6">
                <h3>Dashboard</h3>
            </div>
            <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url("/") ?>">
                            <svg class="stroke-icon">
                                <use href="<?= base_url() ?>/assets/svg/icon-sprite.svg#stroke-home"></use>
                            </svg></a></li>
                    <li class="breadcrumb-item">Dashboard</li>
                    <li class="breadcrumb-item active">Social</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="row">
        <div class="col-xxl-10 col-ed-12 col-xl-12 box-col-8e">
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="card social-widget widget-hover">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center gap-2">
                                    <div class="social-icons"><img src="<?= base_url() ?>/assets/images/karyawan.png" alt="karyawan" width="60px"></div><span>Karyawan</span>
                                </div>
                            </div>
                            <div class="social-content">
                                <div>
                                    <h5 class="mb-1"><?= $total_karyawan ?></h5><span class="f-light">Karyawan</span>
                                </div>
                                <div class="social-chart">
                                    <div id="radial-facebook"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="card social-widget widget-hover">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center gap-2">
                                    <div class="social-icons"><img src="<?= base_url() ?>/assets/images/boy.png" alt="karyawan" width="60px"></div><span>Laki-Laki</span>
                                </div>
                            </div>
                            <div class="social-content">
                                <div>
                                    <h5 class="mb-1"><?= $total_laki ?></h5><span class="f-light">Karyawan Laki-Laki</span>
                                </div>
                                <div class="social-chart">
                                    <div id="radial-facebook"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="card social-widget widget-hover">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center gap-2">
                                    <div class="social-icons"><img src="<?= base_url() ?>/assets/images/woman.png" alt="karyawan" width="60px"></div><span>Perempuan</span>
                                </div>
                            </div>
                            <div class="social-content">
                                <div>
                                    <h5 class="mb-1"><?= $total_perempuan ?></h5><span class="f-light">Karyawan Perempuan</span>
                                </div>
                                <div class="social-chart">
                                    <div id="radial-facebook"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-8 col-md-12">
            <div class="card">
                <div class="card-header card-no-border">
                    <div class="header-top">
                        <h5 class="m-0">Jumlah</h5>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="view-container">
                        <div id="view">
                            <div>
                                <canvas id="chartBar" height="134"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-12">
            <div class="card">
                <div class="card-header card-no-border">
                    <div class="header-top">
                        <h5 class="m-0">Views</h5>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="view-container">
                        <div id="view">
                            <div>
                                <canvas id="chartPie"></canvas>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var makanan = <?php echo json_encode($makanans) ?>;
    var labelMakanan = makanan.map(item => item.nama_makanan);
    var totalMakanan = makanan.map(item => item.total);

    var olahraga = <?php echo json_encode($olahragas) ?>;
    var labelolahraga = olahraga.map(item => item.nama_olahraga);
    var totalolahraga = olahraga.map(item => item.total);

    console.log(olahraga);
    const ctx = document.getElementById('chartBar');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labelMakanan,
            datasets: [{
                label: 'Makanan Favorit',
                data: totalMakanan,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 205, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(201, 203, 207, 0.2)'
                ],
                borderColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(54, 162, 235)',
                    'rgb(153, 102, 255)',
                    'rgb(201, 203, 207)'
                ],

                borderWidth: 1
            }]
        },
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                display: true,
                position: 'top'
            }
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    const ctx2 = document.getElementById('chartPie');

    new Chart(ctx2, {
        type: 'pie',
        data: {
            labels: labelolahraga,
            datasets: [{
                label: 'Olahraga Favorit',
                data: totalolahraga,
                backgroundColor: [
                    'rgba(201, 203, 207, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(255, 205, 86, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                ],
                borderColor: [
                    'rgb(201, 203, 207)',
                    'rgb(153, 102, 255)',
                    'rgb(54, 162, 235)',
                    'rgb(75, 192, 192)',
                    'rgb(255, 205, 86)',
                    'rgb(255, 159, 64)',
                    'rgb(255, 99, 132)',
                ],

                borderWidth: 1
            }]
        },
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                display: true,
                position: 'top'
            }
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }

    });
</script>

<!-- Container-fluid Ends-->
<?= $this->endSection() ?>


<?= $this->section('script') ?>
<script src="<?= base_url() ?>/assets/js/chart/apex-chart/stock-prices.js"></script>
<script src="<?= base_url() ?>/assets/js/dashboard/dashboard_5.js"></script>
<?= $this->endSection() ?>