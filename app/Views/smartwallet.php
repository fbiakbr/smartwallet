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
                                <h3 class="text-primary font-weight-bold">Smart Wallet</h3>
                            </div>
                            <div class="container row">
                                <div class="col-md-6">
                                    <h5>Selamat Datang, <span class="font-weight-bold"><?= $siswa['nama_siswa'] ?></span></h5>
                                    <h6 class="font-weight-light">No. ID Card : <span id="show_id_card" class="btn btn-sm btn-primary">Lihat ID Card</span></h6>
                                    <h6 class="font-weight-light">NIS : <?= $siswa['nis'] ?></h6>
                                    <h6 class="font-weight-light">Kelas : <?= $nama_kelas ?></h6>
                                    <h6 class="font-weight-bold mt-4 mb-3">Riwayat Transaksi</h6>
                                </div>
                                <div class="col-md-6 align-self-end">
                                    <h6 class="font-weight-light text-right">Saldo : <span class="font-weight-bold text-primary">Rp. <span style="font-size: 20px;"><?= number_format($saldo, 0, ',', '.') ?></span></span></h6>
                                </div>
                            </div>
                            <div class="row container table-responsive">
                                <table class="table table-borderless">
                                    <thead>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Jam</th>
                                            <th>Keterangan</th>
                                            <th>Jumlah</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                            <div class="mt-3 text-center">
                                <a class="btn btn-primary btn-md font-weight-medium auth-form-btn" href="<?= base_url('home/index') ?>">KELUAR</a>
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
        <!-- endinject -->
        <script>
            let pemasukan = <?= json_encode($pemasukan) ?>;
            let pengeluaran = <?= json_encode($pengeluaran) ?>;
            let transaksi = [];

            let formatRupiah = (angka) => {
                let number_string = angka.toString().replace(/[^,\d]/g, ''),
                    split = number_string.split(','),
                    sisa = split[0].length % 3,
                    rupiah = split[0].substr(0, sisa),
                    ribuan = split[0].substr(sisa).match(/\d{3}/gi);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }

                rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                return rupiah;
            }

            pemasukan.forEach((item) => {
                transaksi.push({
                    tanggal: item.tgl_pemasukan,
                    jam: item.jam,
                    keterangan: item.keterangan,
                    jumlah: item.jumlah,
                    tipe: 'pemasukan'
                });
            });

            pengeluaran.forEach((item) => {
                transaksi.push({
                    tanggal: item.tgl_pengeluaran,
                    jam: item.jam,
                    keterangan: item.keterangan,
                    jumlah: item.jumlah,
                    tipe: 'pengeluaran'
                });
            });

            transaksi.sort((a, b) => {
                return new Date(b.tanggal + ' ' + b.jam) - new Date(a.tanggal + ' ' + a.jam);
            });

            transaksi.forEach((item) => {
                if (transaksi.indexOf(item) > 4) {
                    return;
                }
                let table = document.querySelector('table');
                let row = table.insertRow();
                let tanggal = row.insertCell(0);
                let jam = row.insertCell(1);
                let keterangan = row.insertCell(2);
                let jumlah = row.insertCell(3);
                tanggal.innerHTML = item.tanggal;
                jam.innerHTML = item.jam;
                keterangan.innerHTML = item.keterangan;
                if (item.keterangan == '') {
                    keterangan.innerHTML = 'ISI SALDO';
                }
                jumlah.innerHTML = item.tipe == 'pemasukan' ? '<span class="text-success">+ Rp. ' + formatRupiah(item.jumlah) + '</span>' : '<span class="text-danger">- Rp. ' + formatRupiah(item.jumlah) + '</span>';
                if (item.tipe == 'pemasukan') {
                    row.style.backgroundColor = '#e6ffe6';
                } else {
                    row.style.backgroundColor = '#ffe6e6';
                }
            });

            if (transaksi.length == 0) {
                let table = document.querySelector('table');
                let row = table.insertRow();
                let tanggal = row.insertCell(0);
                let jam = row.insertCell(1);
                let keterangan = row.insertCell(2);
                let jumlah = row.insertCell(3);
                tanggal.innerHTML = '-';
                jam.innerHTML = '-';
                keterangan.innerHTML = '-';
                jumlah.innerHTML = '-';
            }

            // console.log(transaksi);

            $(document).ready(function() {
                setTimeout(function() {
                    window.location.href = "<?= base_url('home') ?>";
                }, 15000);
            });

            let show_id_card = document.querySelector('#show_id_card');
            show_id_card.addEventListener('click', function() {
                let siswa = <?= json_encode($siswa) ?>;
                let rfid = siswa.rfid;
                if (show_id_card.innerHTML == siswa.rfid) {
                    show_id_card.innerHTML = 'Lihat ID Card';
                } else {
                    show_id_card.innerHTML = 'Loading...';
                    setTimeout(function() {
                        show_id_card.innerHTML = rfid;
                    }, 1000);
                }
            });
        </script>
</body>

</html>