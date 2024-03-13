<?= $this->extend('layout/master') ?>

<?= $this->section('main-content') ?>
<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-6">
                <h3>Karyawan</h3>
            </div>
            <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url("/") ?>">
                            <svg class="stroke-icon">
                                <use href="<?= base_url() ?>/assets/svg/icon-sprite.svg#stroke-home"></use>
                            </svg></a></li>
                    <li class="breadcrumb-item">General</li>
                    <li class="breadcrumb-item active">Karyawan</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">

        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <button class="btn btn-primary" type="button" data-bs-toggle="tooltip" title="btn btn-primary">Tambah Data Karyawan</button>
                </div>
                <div class="table-responsive p-4">
                    <table class="table">
                        <thead>
                            <tr class="border-bottom-primary ">
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">NIP</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">Tanggal Lahir</th>
                                <th scope="col">Nomor Telepon</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-bottom-secondary">
                                <th scope="row">1</th>
                                <td>Ram Jacob</td>
                                <td>8928391239</td>
                                <td> <span class="badge badge-light-danger">Perempuan</span></td>
                                <td>16-12-2025</td>
                                <td>081251432244</td>
                                <td>Depok</td>
                                <td>
                                    <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">Delete</a>
                                        <a class="dropdown-item" href="#">Detail</a>
                                    </div>

                                </td>
                            </tr>
                            <tr class="border-bottom-primary">
                                <th scope="row">1</th>
                                <td>Dipa</td>
                                <td>8928391239</td>
                                <td> <span class="badge badge-light-primary">Laki-laki</span></td>
                                <td>16-12-2025</td>
                                <td>081251432244</td>
                                <td>Depok</td>
                                <td>
                                    <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">
                                            <span class="badge badge-light-danger">Delete</span>
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <span class="badge badge-light-success">Detail</span>
                                        </a>
                                    </div>

                                </td>
                            </tr>

                        </tbody>
                    </table>
                    <div class="pt-3 row">
                        <nav aria-label="Page navigation example">
                            <ul class="paginatio pagination justify-content-center pagination-dark pagin-border-dark gap-2">
                                <li class="page-item"><a class="page-link rounded-circle" href="javascript:void(0)" aria-label="Previous"><span aria-hidden="true">«</span><span class="sr-only">Previous</span></a></li>
                                <li class="page-item"><a class="page-link rounded-circle" href="javascript:void(0)">1</a></li>
                                <li class="page-item"><a class="page-link rounded-circle" href="javascript:void(0)">2</a></li>
                                <li class="page-item"><a class="page-link rounded-circle" href="javascript:void(0)">...</a></li>
                                <li class="page-item"><a class="page-link rounded-circle" href="javascript:void(0)">20</a></li>
                                <li class="page-item"><a class="page-link rounded-circle" href="javascript:void(0)" aria-label="Next"><span aria-hidden="true">»</span><span class="sr-only">Next</span></a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->
<?= $this->endSection() ?>


<?= $this->section('script') ?>
<script src="<?= base_url() ?>/assets/js/chart/apex-chart/stock-prices.js"></script>
<script src="<?= base_url() ?>/assets/js/dashboard/dashboard_5.js"></script>
<?= $this->endSection() ?>