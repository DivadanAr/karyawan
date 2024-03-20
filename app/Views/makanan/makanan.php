<?= $this->extend('layout/master') ?>

<?= $this->section('main-content') ?>
<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-6">
                <h3>makanan</h3>
            </div>
            <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url("/") ?>">
                            <svg class="stroke-icon">
                                <use href="<?= base_url() ?>/assets/svg/icon-sprite.svg#stroke-home"></use>
                            </svg></a></li>
                    <li class="breadcrumb-item">General</li>
                    <li class="breadcrumb-item active">makanan</li>
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
                    <a href="<?= base_url('makanan/create') ?>">
                        <button class="btn btn-primary" type="button" data-bs-toggle="tooltip" title="btn btn-primary">Tambah Data makanan</button>
                    </a>
                </div>
                <div class="table-responsive p-4">
                    <table class="table">
                        <thead>
                            <tr class="border-bottom-primary ">
                                <th scope="col">No</th>
                                <th scope="col">Nama makanan</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($makanans)) : ?>
                                <tr>
                                    <td colspan="3" class="text-center">Data tidak ditemukan.</td>
                                </tr>
                            <?php else : ?>
                                <?php $no = 1; ?>
                                <?php foreach ($makanans as $key => $makanan) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>

                                        <td class="col-sm-6"><?= $makanan['nama_makanan'] ?></td>
                                        <td class="col-sm-6">
                                            <div class="row">
                                                <a style="width: fit-content;" class="col-sm-3" href="<?= base_url() ?>makanan/detail/<?= $makanan['id'] ?>">
                                                    <button class="btn btn-primary" style="margin-right: 5px;" type="button" data-bs-toggle="tooltip" title="btn btn-primary">Detail</button>
                                                </a>
                                                <a style="width: fit-content;" class="col-sm-3" href="<?= base_url() ?>makanan/edit/<?= $makanan['id'] ?>">
                                                    <button class="btn btn-success" type="button" data-bs-toggle="tooltip" title="btn btn-primary">Edit</button>
                                                </a>
                                                <form style="width: fit-content;" class="col-sm-3" action="/makanan/delete/<?= $makanan['id'] ?>" method="post">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button class="btn btn-danger" style="margin-right: 5px;" type="submit" data-bs-toggle="tooltip" title="btn btn-primary">Hapus</button>
                                                </form>

                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            <?php endif ?>

                        </tbody>
                    </table>
                    <div class="pt-3 row">
                        <?php echo $pager->links('makanan', 'pagination') ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->
<?= $this->endSection() ?>


<?= $this->section('script') ?>
<!-- <script src="<?= base_url() ?>/assets/js/chart/apex-chart/stock-prices.js"></script> -->
<script src="<?= base_url() ?>/assets/js/dashboard/dashboard_5.js"></script>
<?= $this->endSection() ?>