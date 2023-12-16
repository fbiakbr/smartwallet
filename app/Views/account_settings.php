<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Account Settings - Smart Wallet</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?= base_url('vendors/feather/feather.css') ?>">
    <link rel="stylesheet" href="<?= base_url('vendors/ti-icons/css/themify-icons.css') ?>">
    <link rel="stylesheet" href="<?= base_url('vendors/css/vendor.bundle.base.css') ?>">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="<?= base_url('css/vertical-layout-light/style.css') ?>">
    <!-- endinject -->
    <link rel="shortcut icon" href="<?= base_url('images/favicon.png') ?>" />
    <link rel="stylesheet" href="<?= base_url('css/all.min.css') ?>">
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-6 mx-auto">
                        <div class="auth-form-light text-left py-5 pl-5 pr-3">
                            <div class="container brand-logo">
                                <!-- <img src="<?= base_url('images/logo.svg') ?>" alt="logo"> -->
                                <h3 class="text-primary font-weight-bold text-center">Account Settings - Smart Wallet</h3>
                            </div>
                            <form action="<?= base_url('home/save_account_settings') ?>" method="post">
                                <div class="container row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="ID Card">ID Card <i class="fas fa-ban text-danger"></i></label>
                                            <input type="text" class="form-control font-weight-bold border-danger" id="rfid" name="rfid" value="<?= $siswa['rfid'] ?>" required readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="ID Card">NIS <i class="fas fa-ban text-danger"></i></label>
                                            <input type="text" class="form-control font-weight-bold border-danger" id="nis" name="nis" value="<?= $siswa['nis'] ?>" required readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="pin">PIN <a href="#" id="showPin"><i class="fas fa-eye text-primary"></i></a></label>
                                            <input type="password" class="form-control font-weight-bold" id="pin" name="pin" value="<?= $siswa['pin'] ?>" required readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="container row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nama_siswa">Nama <a href="#" id="showNama"><i class="fas fa-edit text-primary"></i></a></label>
                                            <input type="text" class="form-control font-weight-bold" id="nama_siswa" name="nama_siswa" value="<?= $siswa['nama_siswa'] ?>" required readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="tanggal_lahir">Tanggal Lahir <a href="#" id="showTanggalLahir"><i class="fas fa-edit text-primary"></i></a></label>
                                            <input type="text" class="form-control font-weight-bold" id="tanggal_lahir" name="tanggal_lahir" value="<?= $siswa['tanggal_lahir'] ?>" required readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="container row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="tempat_lahir">Tempat Lahir <a href="#" id="showTempatLahir"><i class="fas fa-edit text-primary"></i></a></label>
                                            <input type="text" class="form-control font-weight-bold" id="tempat_lahir" name="tempat_lahir" value="<?= $siswa['tempat_lahir'] ?>" required readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="no_hp">No HP <a href="#" id="showNoHp"><i class="fas fa-edit text-primary"></i></a></label>
                                            <input type="text" class="form-control font-weight-bold" id="no_hp" name="no_hp" value="<?= $siswa['no_hp'] ?>" required readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="container row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="alamat">Alamat <a href="#" id="showAlamat"><i class="fas fa-edit text-primary"></i></a></label>
                                            <textarea class="form-control font-weight-bold" id="alamat" name="alamat" rows="3" required readonly><?= $siswa['alamat'] ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3 text-center">
                                    <button class="btn btn-danger" type="reset">RESET</button>
                                    <button class="btn btn-primary" type="submit">SAVE</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>
        <!-- container-scroller -->
        <!-- plugins:js -->
        <script src="<?= base_url('vendors/js/vendor.bundle.base.js') ?>"></script>
        <!-- endinject -->
        <!-- Plugin js for this page -->
        <!-- End plugin js for this page -->
        <!-- inject:js -->
        <script src="<?= base_url('js/off-canvas.js') ?>"></script>
        <script src="<?= base_url('js/hoverable-collapse.js') ?>"></script>
        <script src="<?= base_url('js/template.js') ?>"></script>
        <script src="<?= base_url('js/settings.js') ?>"></script>
        <script src="<?= base_url('js/todolist.js') ?>"></script>
        <script src="<?= base_url('js/all.min.js') ?>"></script>
        <!-- endinject -->
        <script>
            let showPin = document.getElementById('showPin');
            showPin.addEventListener('click', function() {
                let pin = document.getElementById('pin');
                if (pin.getAttribute('type') == 'password') {
                    pin.setAttribute('type', 'text');
                    pin.removeAttribute('readonly');
                    showPin.innerHTML = '<i class="fas fa-eye-slash text-primary"></i>';
                } else {
                    pin.setAttribute('type', 'password');
                    pin.setAttribute('readonly', 'true');
                    showPin.innerHTML = '<i class="fas fa-eye text-primary"></i>';
                }
            })
            let showNama = document.getElementById('showNama');
            showNama.addEventListener('click', function() {
                let nama_siswa = document.getElementById('nama_siswa');
                if (nama_siswa.getAttribute('readonly') == 'true') {
                    nama_siswa.removeAttribute('readonly');
                    showNama.innerHTML = '<i class="fas fa-save text-primary"></i>';
                } else {
                    nama_siswa.setAttribute('readonly', 'true');
                    showNama.innerHTML = '<i class="fas fa-edit text-primary"></i>';
                }
            })
            let showTanggalLahir = document.getElementById('showTanggalLahir');
            showTanggalLahir.addEventListener('click', function() {
                let tanggal_lahir = document.getElementById('tanggal_lahir');
                if (tanggal_lahir.getAttribute('readonly') == 'true') {
                    tanggal_lahir.removeAttribute('readonly');
                    showTanggalLahir.innerHTML = '<i class="fas fa-save text-primary"></i>';
                } else {
                    tanggal_lahir.setAttribute('readonly', 'true');
                    showTanggalLahir.innerHTML = '<i class="fas fa-edit text-primary"></i>';
                }
            })
            let showTempatLahir = document.getElementById('showTempatLahir');
            showTempatLahir.addEventListener('click', function() {
                let tempat_lahir = document.getElementById('tempat_lahir');
                if (tempat_lahir.getAttribute('readonly') == 'true') {
                    tempat_lahir.removeAttribute('readonly');
                    showTempatLahir.innerHTML = '<i class="fas fa-save text-primary"></i>';
                } else {
                    tempat_lahir.setAttribute('readonly', 'true');
                    showTempatLahir.innerHTML = '<i class="fas fa-edit text-primary"></i>';
                }
            })
            let showNoHp = document.getElementById('showNoHp');
            showNoHp.addEventListener('click', function() {
                let no_hp = document.getElementById('no_hp');
                if (no_hp.getAttribute('readonly') == 'true') {
                    no_hp.removeAttribute('readonly');
                    showNoHp.innerHTML = '<i class="fas fa-save text-primary"></i>';
                } else {
                    no_hp.setAttribute('readonly', 'true');
                    showNoHp.innerHTML = '<i class="fas fa-edit text-primary"></i>';
                }
            })
            let showAlamat = document.getElementById('showAlamat');
            showAlamat.addEventListener('click', function() {
                let alamat = document.getElementById('alamat');
                if (alamat.getAttribute('readonly') == 'true') {
                    alamat.removeAttribute('readonly');
                    showAlamat.innerHTML = '<i class="fas fa-save text-primary"></i>';
                } else {
                    alamat.setAttribute('readonly', 'true');
                    showAlamat.innerHTML = '<i class="fas fa-edit text-primary"></i>';
                }
            })
        </script>
</body>

</html>