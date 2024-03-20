<?= $this->extend('layout/master') ?>

<?= $this->section('main-content') ?>
<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-6">
                <h3>Edit Karyawan</h3>
            </div>
            <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url("/") ?>">
                            <svg class="stroke-icon">
                                <use href="<?= base_url() ?>/assets/svg/icon-sprite.svg#stroke-home"></use>
                            </svg></a></li>
                    <li class="breadcrumb-item">General</li>
                    <li class="breadcrumb-item">Karyawan</li>
                    <li class="breadcrumb-item active">Edit Karyawan</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">

        <div class="col-sm-12">
            <div class="card height-equal">
                <div class="card-header">
                    <h4>Data Karyawan</h4>
                    <p class="f-m-light mt-1">Pastikan semua terisi dengan benar!</p>
                </div>
                <div class="card-body custom-input">
                    <form class="row g-3" action="<?= base_url('karyawan/update/' . $karyawan['id']) ?>" method="POST">
                        <div class="col-12">
                            <label class="form-label" for="name">Nama</label>
                            <input class="form-control" id="name" type="text" placeholder="name" aria-label="name" name="nama" value="<?= $karyawan['nama'] ?>" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="nip">NIP</label>
                            <input class="form-control" id="nip" type="text" placeholder="nip" aria-label="nip" name="nip" value=" <?= $karyawan['nip'] ?>" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="validationDefault04">Jenis Kelamin</label>
                            <select class="form-select" id="validationDefault04" required="" name="jenis_kelamin">
                                <option value="<?= $karyawan['jenis_kelamin']; ?>" selected disabled hidden><?= $karyawan['jenis_kelamin'] ?></option>
                                <option value="Laki-laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="col-xxl-3 box-col-12 text-start">Tanggal Lahir </label>
                            <div class="input-group flatpicker-calender">
                                <input class="form-control" id="human-friendly" type="date" name="tanggal_lahir" value="<?= $karyawan["tanggal_lahir"] ?>">
                            </div>
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="nomor_telepon">Nomor Telepon</label>
                            <input class="form-control" id="nomor_telepon" name="nomor_telepon" type="text" placeholder="nomor telepon" aria-label="nomor_telepon" required value="<?= $karyawan["nomor_telepon"] ?>">
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="alamat">Alamat</label>
                            <textarea class="form-control" id="alamat" rows="3" name="alamat"><?= $karyawan["alamat"] ?></textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="alamat">Makanan Favourit</label>
                            <select id="mySelectMakanan" multiple name="makanan[]">
                                <option value="" selected hidden>Makanan Favourite</option>
                                <?php foreach ($makanan_fav as $key => $makanan) : ?>
                                    <option value="<?= $makanan['id'] ?>" selected><?= $makanan['nama_makanan'] ?></option>
                                <?php endforeach ?>
                                <?php foreach ($makanans as $key => $makanan) : ?>
                                    <option value="<?= $makanan['id'] ?>"><?= $makanan['nama_makanan'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="alamat">Olahraga Favourit</label>
                            <select id="mySelectOlahraga" multiple name="olahraga[]">
                                <option value="" selected hidden>Olahraga Favourite</option>
                                <?php foreach ($olahragas as $key => $olahraga) : ?>
                                    <option value="<?= $olahraga['id'] ?>"><?= $olahraga['nama_olahraga'] ?></option>
                                <?php endforeach ?>
                                <?php foreach ($olahraga_fav as $key => $olahraga) : ?>
                                    <option value="<?= $olahraga['id'] ?>" selected><?= $olahraga['nama_olahraga'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>

                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Submit</button>
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
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var mySelectMakanan = new TomSelect('#mySelectMakanan', {
            plugins: ['dropdown_input'],
            hideSelected: true,
            closeAfterSelect: true
        });
    });
    document.addEventListener('DOMContentLoaded', function() {
        var mySelectOlahraga = new TomSelect('#mySelectOlahraga', {
            plugins: ['dropdown_input'],
            hideSelected: true,
            closeAfterSelect: true
        });
    });
</script>

<script src="<?= base_url() ?>/assets/js/chart/apex-chart/stock-prices.js"></script>
<script src="<?= base_url() ?>/assets/js/dashboard/dashboard_5.js"></script>
<?= $this->endSection() ?>