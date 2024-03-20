<?= $this->extend('layout/master') ?>

<?= $this->section('main-content') ?>
<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-6">
                <h3>olahraga</h3>
            </div>
            <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url("/") ?>">
                            <svg class="stroke-icon">
                                <use href="<?= base_url() ?>/assets/svg/icon-sprite.svg#stroke-home"></use>
                            </svg></a></li>
                    <li class="breadcrumb-item">General</li>
                    <li class="breadcrumb-item">olahraga</li>
                    <li class="breadcrumb-item active">Detail olahraga</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card" style="padding-bottom: 20px;">
                <div class="card-header">
                    <h4>Detail olahragaa</h4>
                    <p class="f-m-light mt-1">Pastikan semua terisi dengan benar!</p>
                </div>
                <div class="row m-2 mx-4">
                    <form action="<?php echo base_url('olahraga/update/' . $olahraga['id']) ?>" method="POST">
                        <div class="col-12">
                            <label class="form-label" for="name_olahraga">Nama olahraga</label>
                            <input class="form-control" id="name_olahraga" name="nama_olahraga" type="text" placeholder="name olahraga" aria-label="name_olahraga" required value="<?= $olahraga['nama_olahraga'] ?>" disabled>
                        </div>
                        <div class="col-12 mt-3">
                            <button class="btn btn-primary" type="submit">Simpan Perubahan</button>
                        </div>
                    </form>
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