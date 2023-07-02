<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Smart Wallet</title>
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
    <link rel="stylesheet" href="<?= base_url('swal/sweetalert2.min.css') ?>">
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo">
                                <!-- <img src="<?= base_url('images/logo.svg') ?>" alt="logo"> -->
                                <h3 class="text-primary font-weight-bold text-center">Smart Wallet</h3>
                            </div>
                            <div class="text-center">
                                <img src="<?= base_url('images/rfid-img.png') ?>" alt="id_card" class="img-fluid" width="250">
                            </div>
                            <h4 class="text-center">Halo, Selamat Datang!</h4>
                            <h6 class="font-weight-light text-center">Scan ID Card Anda Untuk Melanjutkan.</h6>
                            <form class="pt-3" method="post" action="<?= base_url('home/smartwallet') ?>">
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Scan ID Card" name="rfid" autofocus required>
                                </div>
                                <div class="mt-3">
                                    <a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" hidden>SCAN</a>
                                </div>
                            </form>
                        </div>
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
    <script src="<?= base_url('swal/sweetalert2.all.min.js') ?>"></script>
    <!-- endinject -->
    <script>
        let siswa = <?= json_encode($siswa) ?>;

        let rfids = [];
        for (let i = 0; i < siswa.length; i++) {
            rfids.push(siswa[i].rfid);
        }
        console.log(rfids);

        let input = document.querySelector('input[name="rfid"]');
        setInterval(() => {
            if (!rfids.includes(input.value)) {
                document.querySelector('a.btn-block').classList.add('disabled');
            } else {
                document.querySelector('a.btn-block').classList.remove('disabled');
            }
        }, 100);
    </script>
</body>

</html>