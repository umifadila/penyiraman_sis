<!doctype html>
<html lang="en">

<head>
    <title><?= isset($judul) ? $judul : 'AutoGrow Chili'; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url('assets/login/css/style.css') ?>">

    <style>
        .btn.btn-primary {
            background: #7bc47f !important;
            border: 1px solid #7bc47f !important;
            color: #000 !important;
        }

        .btn.btn-primary:hover {
            border: 1px solid rgb(82, 161, 86) !important;
            background: transparent !important;
            color: rgb(82, 161, 86) !important;
        }

        /* Tambahan untuk mematikan efek hover saat disabled */
        button.btn.btn-primary:disabled,
        button.btn.btn-primary:disabled:hover {
            background-color: #ccc !important;
            border-color: #ccc !important;
            color: #777 !important;
            cursor: not-allowed !important;
        }

        html,
        body {
            height: 100% !important;
            overflow: hidden !important;
            font-family: "Poppins", sans-serif;
            /* untuk cegah resize saat modal tampil */
        }

        body.img {
            background-image: url('<?= base_url('assets/login/1.jpg') ?>');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
            min-height: 100vh;
        }

        .js-fullheight {
            height: 100% !important;
            min-height: 100vh !important;
        }
    </style>
</head>

<body class="img js-fullheight">
    <section style="height: 100%;"
        class="ftco-section d-flex align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="login-wrap p-0">
                        <h3 style="font-weight: bold;" class="mb-1 text-center">SELAMAT DATANG</h3>
                        <p class="fs-6 mb-4 text-center">Di SISTEM PENYIRAMAN TANAMAN CABAI</p>
                        <form id="login-form" action="#" class="signin-form">
                            <div class="form-group">
                                <input
                                    autocomplete="off"
                                    id="username"
                                    name="username"
                                    type="text"
                                    class="form-control"
                                    placeholder="Username">
                            </div>

                            <div class="form-group" style="position: relative;">
                                <input
                                    autocomplete="new-password"
                                    id="password"
                                    name="password"
                                    type="password"
                                    class="form-control"
                                    placeholder="Password"
                                    oncontextmenu="return false;">
                                <span
                                    toggle="#password"
                                    class="fa fa-fw fa-eye field-icon toggle-password"
                                    style="position: absolute; top: 50%; right: 10px; transform: translateY(-50%); cursor: pointer;"></span>
                            </div>

                            <div class="form-group">
                                <button disabled type="submit" class="form-control btn btn-primary submit px-3">LOGIN</button>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="<?= base_url('assets/login/js/jquery.min.js') ?>"></script>
    <script src="<?= base_url('assets/login/js/popper.js') ?>"></script>
    <script src="<?= base_url('assets/login/js/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('assets/login/js/main.js') ?>"></script>

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {

            function toggleButton() {
                const username = $('#username').val().trim();
                const password = $('#password').val().trim();
                if (username && password) {
                    $('.submit').prop('disabled', false);
                } else {
                    $('.submit').prop('disabled', true);
                }
            }

            // Cek saat mengetik atau mengubah input
            $('#username, #password').on('keyup change', function() {
                toggleButton();
            });

            // Panggil awal untuk inisialisasi kondisi tombol
            toggleButton();

            $('#login-form').on('submit', function(e) {
                e.preventDefault();

                const username = $('#username').val().trim();
                const password = $('#password').val().trim();

                Swal.fire({
                    title: 'Memproses...',
                    text: 'Mohon tunggu sebentar',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });


                $.ajax({
                    url: '<?= base_url('LoginController/authenticate') ?>',
                    method: 'POST',
                    data: {
                        username,
                        password
                    },
                    dataType: 'json',
                    beforeSend: function() {
                        Swal.fire({
                            title: 'Memproses...',
                            text: 'Mohon tunggu sebentar',
                            allowOutsideClick: false,
                            didOpen: () => {
                                Swal.showLoading();
                            }
                        });
                    },
                    success: function(res) {
                        Swal.close(); // Tutup loading jika sukses atau gagal

                        if (res.status === 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Login berhasil!',
                                text: 'Selamat datang kembali...',
                                timer: 6000,
                                showConfirmButton: true, // Tampilkan tombol OK
                                confirmButtonText: 'OK' // Label tombol OK
                            }).then(() => {
                                window.location.href = '<?= base_url('dashboard') ?>';
                                // console.log("login berhasil");
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Login Gagal',
                                text: res.message
                            });
                        }
                    },
                    error: function() {
                        Swal.close(); // Tutup loading juga jika error
                        Swal.fire('Error', 'Terjadi kesalahan saat menghubungi server.', 'error');
                    }
                });

            });

        });
    </script>



</body>

</html>