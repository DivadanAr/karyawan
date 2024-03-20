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
                    <a href="<?= base_url("karyawan/create") ?>">
                        <button class="btn btn-primary" type="button" data-bs-toggle="tooltip" title="btn btn-primary">Tambah Data Karyawan</button>
                    </a>
                </div>
                <div class="table-responsive p-4">
                    <table class="table">
                        <thead>
                            <tr class="border-bottom-primary ">
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">NIP</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">Makanan Favorit</th>
                                <th scope="col">Olahraga Favorite</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php if (empty($karyawan)) : ?>
                                <tr>
                                    <td colspan="7" class="text-center">Data tidak ditemukan.</td>
                                </tr>
                            <?php else : ?>
                                <?php $no = 1; ?>

                                <?php foreach ($karyawan as $item) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>

                                        <td><?= $item['nama'] ?></td>
                                        <td><?= $item['nip'] ?></td>
                                        <td>
                                            <?php if ($item['jenis_kelamin'] === 'Perempuan') : ?>
                                                <span class="badge badge-light-danger"><?= $item['jenis_kelamin'] ?></span>
                                            <?php elseif ($item['jenis_kelamin'] === 'Laki-laki') : ?>
                                                <span class="badge badge-light-primary"><?= $item['jenis_kelamin'] ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <ul>

                                                <li><?= $item['makanan_favorit'] ?></li>
                                        </td>
                                        </ul>
                                        <td>
                                            <ul>
                                                <li><?= $item['olahraga_favorit'] ?></li>
                                            </ul>
                                        </td>
                                        <td>
                                            <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="<?= base_url('karyawan/detail/' . $item['id']) ?>">
                                                    Detail
                                                </a>
                                                <a class="dropdown-item" href="<?= base_url('karyawan/edit/' . $item['id']) ?>">
                                                    Edit
                                                </a>
                                                <form style="width: fit-content;" class="col-sm-3 dropdown-item" action="/karyawan/delete/<?= $item['id'] ?>" method="post">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button class="btn btn-danger" style="margin-right: 5px;" type="submit" data-bs-toggle="tooltip" title="btn btn-primary">Hapus</button>
                                                </form>

                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif ?>

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