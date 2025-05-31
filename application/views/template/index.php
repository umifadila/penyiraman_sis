<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>AutoGrow CHL - <?= isset($judul) ? $judul : 'Dashboard' ?></title>

    <!-- Custom fonts for this template-->
    <!-- <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link -->
    <link href="<?= base_url() ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link href="<?= base_url() ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        html,
        body {
            font-family: "Poppins", sans-serif;
        }

        #dataTableLokasi thead th:first-child::after {
            display: none !important;
        }

        #dataTableLokasi_filter input:focus {
            outline: none;
            box-shadow: none;
            border-color: #ccc;
        }

        .pagination .page-item.active .page-link {
        background-color:rgb(255, 255, 255); /* kuning Bootstrap (warning) */
        border-color:rgb(159, 159, 159);
        color: #212529; /* agar teks tetap terbaca */
    }
    </style>
    <!-- Custom styles for this page -->
    <link href="<?= base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php $this->load->view('layouts/sidebar'); ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php $this->load->view('layouts/navbar'); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <?php echo $contents ?>


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php $this->load->view('layouts/footer'); ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url() ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url() ?>assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <!-- <script src="<?= base_url() ?>assets/vendor/chart.js/Chart.min.js"></script> -->

    <!-- Page level custom scripts -->
    <!-- <script src="<?= base_url() ?>assets/js/demo/chart-area-demo.js"></script>
    <script src="<?= base_url() ?>assets/js/demo/chart-pie-demo.js"></script> -->

    <!-- Page level plugins -->
    <script src="<?= base_url() ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url() ?>assets/js/demo/datatables-demo.js"></script>

    <!-- Sweet -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Jb validator -->
    <script src="<?= base_url() ?>assets/vendor/jbvalidator/jbvalidator.js"></script>

    <script>
        $(function() {

            let validator = $('form.needs-validation').jbvalidator({
                errorMessage: true,
                successClass: true,
                language: '<?= base_url() ?>assets/vendor/jbvalidator/dist/lang/id.json'
            });

            //new custom validate methode
            validator.validator.custom = function(el, event) {
                // Password ubah
                // username baru
                if ($(el).is('[name=username-new]')) {
                    let username = $(el).val();
                    var reWhiteSpace = new RegExp("\\s+");
                    //   
                    if (username.indexOf(' ') >= 0) {
                        return "Username tidak boleh ada spasi";
                    }

                }
                // Pdf
                if ($(el).is('[name=pengetahuan_pendukung]')) {
                    let ext = $(el).val();
                    if (ext != "") {
                        let allowedExtensions = /(\.pdf)$/i;
                        if (!allowedExtensions.exec(ext)) {
                            return "File tidak valid";
                        }
                    }
                }
                // Gambar
                if ($(el).is('[name=gambar]')) {
                    let ext = $(el).val();
                    if (ext != "") {
                        let allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
                        if (!allowedExtensions.exec(ext)) {
                            return "File tidak valid";
                        }
                    }
                }
                // Vidio
                if ($(el).is('[name=vidio]')) {
                    let ext = $(el).val();
                    if (ext != "") {
                        let allowedExtensions = /(\.mp4)$/i;
                        if (!allowedExtensions.exec(ext)) {
                            return "File tidak valid";
                        }
                    }
                }
                // 
                return '';
            }
        })
    </script>

    <?php if ($this->session->flashdata('success')): ?>
        <script>
            Swal.fire({
                position: 'center',
                icon: 'success', // bisa juga: 'error', 'warning', 'info', 'question'
                title: 'Berhasil!',
                text: '<?= $this->session->flashdata("success") ?>',
                showConfirmButton: true,
                confirmButtonText: 'OK',
                timer: 3000 // opsional: akan auto-close setelah 3 detik
            });
        </script>
    <?php endif; ?>

    <script>
        $(document).ready(function() {

            $('#dataTableLokasi').DataTable({
                "columnDefs": [{
                    "targets": "_all", // Menargetkan semua kolom
                    "orderable": false // Menonaktifkan sorting untuk semua kolom
                }],
                "language": {
                    "search": "_INPUT_", // Mengganti input text pencarian
                    "searchPlaceholder": "Cari Lokasi..." // Menambahkan placeholder
                }
            });

            $('.btn-delete-lokasi').click(function(e) {
                e.preventDefault();
                var id = $(this).data('id');

                Swal.fire({
                    title: 'Yakin ingin menghapus?',
                    text: "Data akan dihapus secara permanen!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Ya, hapus',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '<?= site_url("lokasi/delete/") ?>' + id;
                    }
                });
            });
            function loadDashboardData() {
  $.ajax({
    url: 'dashboard/data',
    method: 'GET',
    dataType: 'json',
    success: function (response) {
      const d = response.data;

      // Ringkasan
      $('#jml_lokasi').text(d.jml_lokasi);
      $('#penyiraman_today').text(d.penyiraman_today);
      $('#pemupukan_today').text(d.pemupukan_today);
      $('#jadwal_aktif').text(d.jadwal_aktif);

      // Log Aksi
      let logRows = '';
      d.log_aksi.forEach(row => {
        logRows += `
          <tr>
            <td>${row.nama}</td>
            <td>${capitalize(row.jenis_aksi)}</td>
            <td>${capitalize(row.sumber_aksi)}</td>
            <td>${formatDateTime(row.waktu_aksi)}</td>
          </tr>`;
      });
      $('#log_aksi_tbody').html(logRows || '<tr><td colspan="4" class="text-center">Tidak ada data</td></tr>');

      // Kelembaban
      let soilRows = '';
      d.soil_recent.forEach(row => {
        soilRows += `
          <tr>
            <td>${row.nama}</td>
            <td>${row.kelembaban}</td>
            <td>${formatDateTime(row.waktu_pencatatan)}</td>
          </tr>`;
      });
      $('#soil_recent_tbody').html(soilRows || '<tr><td colspan="3" class="text-center">Tidak ada data</td></tr>');

      // Jadwal
      let jadwalRows = '';
      d.jadwal_mendatang.forEach(row => {
        jadwalRows += `
          <tr>
            <td>${row.nama_lokasi}</td>
            <td>${capitalize(row.type)}</td>
            <td>${row.hari || '-'}</td>
            <td>${row.tanggal || '-'}</td>
            <td>${row.waktu.slice(0, 5)}</td>
            <td><span class="badge ${row.is_aktif ? 'badge-success' : 'badge-secondary'}">${row.is_aktif ? 'Aktif' : 'Nonaktif'}</span></td>
          </tr>`;
      });
      $('#jadwal_mendatang_tbody').html(jadwalRows || '<tr><td colspan="6" class="text-center">Tidak ada data</td></tr>');
    },
    error: function () {
      console.warn('Gagal memuat data dashboard.');
    }
  });
}

        function formatDateTime(datetime) {
        const d = new Date(datetime);
        return `${d.getDate().toString().padStart(2, '0')}-${(d.getMonth() + 1).toString().padStart(2, '0')}-${d.getFullYear()} ${d.getHours().toString().padStart(2, '0')}:${d.getMinutes().toString().padStart(2, '0')}`;
        }

        function capitalize(str) {
        return str.charAt(0).toUpperCase() + str.slice(1);
        }

        // Jalankan pertama kali saat halaman dimuat
        $(document).ready(function () {
        loadDashboardData();

        // Auto-refresh setiap 3 detik (10000 ms)
        setInterval(loadDashboardData, 3000);
});

    
    
        });
    </script>


</body>

</html>