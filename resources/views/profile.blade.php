<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="admin, dashboard">
    <meta name="author" content="DexignZone">
    <meta name="robots" content="index, follow">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Dompet : Payment Admin Template">
    <meta property="og:title" content="Dompet : Payment Admin Template">
    <meta property="og:description" content="Dompet : Payment Admin Template">
    <meta property="og:image" content="https://dompet.dexignlab.com/xhtml/social-image.png">
    <meta name="format-detection" content="telephone=no">

    <!-- PAGE TITLE HERE -->
    <title>Aplikasi Konsentrasi</title>

    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="assets/image/png" href="assets/images/favicon.png">
    <!-- Datatable -->
    <link href="assets/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="node_modules/sweetalert2/dist/sweetalert2.min.css">
    <script src="node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="index.html" class="brand-logo">
                <h3><i class="flaticon-086-star"></i> Toko Saya</h3>
            </a>
            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>

        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="dashboard_bar">
                                Mesin Kasir
                            </div>
                        </div>

                        </ul>
                    </div>
                </nav>
            </div>
        </div>

       <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="dlabnav">
            <div class="dlabnav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="dropdown header-profile">
                        <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                            <img src="../assets/images/profile/small/pic1.jpg" width="20" alt="">
                            <div class="header-info ms-3">
                                <span class="font-w600 ">Hi, <b><?php echo $username ?></b></span>
                                <small class="text-end font-w400"><?php echo $toko ?></small>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="profile.php" class="dropdown-item ai-icon">
                                <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                                <span class="ms-2">Profile </span>
                            </a>

                            <a href="logout" class="dropdown-item ai-icon">
                                <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                    <polyline points="16 17 21 12 16 7"></polyline>
                                    <line x1="21" y1="12" x2="9" y2="12"></line>
                                </svg>
                                <span class="ms-2"><a href="logout">Logout</a></span>
                            </a>
                        </div>
                    </li>
                    @if(session('role') != 'pimpinan')
                    <li>
                        <a class="has-arrow ai-icon" href="{{ url('produk') }}" aria-expanded="false">
                            <i class="flaticon-025-dashboard"></i>
                            <span class="nav-text">Produk</span>
                        </a>
                    </li>
                    <li>
                        <a class="has-arrow ai-icon" href="{{ url('transaksi') }}" aria-expanded="false">
                            <i class="flaticon-043-menu"></i>
                            <span class="nav-text">Transaksi</span>
                        </a>
                    </li>
                @else
                    <li>
                        <a class="has-arrow ai-icon" href="{{ url('laporan') }}" aria-expanded="false">
                            <i class="flaticon-072-printer"></i>
                            <span class="nav-text">Laporan</span>
                        </a>
                    </li>
                @endif
            
                </ul>
                <div class="copyright">
                    <p><strong>Aplikasi Konsentrasi</strong> © 2023 Sulaiman Hamzah</p>
                    <p class="fs-12">Made with <span class="heart"></span></p>
                </div>
            </div>
        </div>
<!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <!-- row -->
                

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">

                            </div>
                            <div class="card-body">
                                <h1 class="h3 mb-2">Account Settings</h1>
                                <!-- Profile widget -->
                                <div class="">
                                    @if(session('error'))
                                        <script>
                                            Swal.fire({
                                                icon: 'error',
                                                title: 'Oops...',
                                                text: '{{ session("error") }}'
                                            }).then(() => {
                                                
                                            });
                                        </script>
                                    @endif
                                    @if(session('success'))
                                        <script>
                                            Swal.fire({
                                                icon: 'success',
                                                title: 'Success!',
                                                text: '{{ session("success") }}'
                                            }).then(() => {
                                                // Jika ingin melakukan sesuatu setelah pesan sukses ditampilkan
                                            });
                                        </script>
                                    @endif

                                    <div class="py-4 px-4 mt-5">
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-toggle="tab" href="#PageProfile" style="letter-spacing: 1px;">
                                                    <i class="fa fa-user mr-1"></i> Profile</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#PagePassword" style="letter-spacing: 1px;">
                                                    <i class="fa fa-lock mr-1"></i> Password</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content py-3">
                                            <div id="PageProfile" class="tab-pane active">
                                                <form method="post">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-sm-6 col-md-6 mb-2">
                                                            <label for="namatoko">Nama Toko<span class="text-danger">*</span></label>
                                                            <input name="nama_toko" type="text" class="form-control" value="<?php echo $toko ?>" id="namatoko" placeholder="nama toko" required>
                                                        </div>
                                                        <div class="col-sm-6 col-md-6 mb-2">
                                                            <label for="username">Username<span class="text-danger">*</span></label>
                                                            <input name="username" type="text" class="form-control" value="<?php echo $username; ?>" id="username" placeholder="username" required>
                                                        </div>
                                                        <div class="col-sm-6 col-md-6 mb-2">
                                                            <label for="telepon">Telepon<span class="text-danger">*</span></label>
                                                            <input name="telepon" type="number" class="form-control" value="<?php echo $telepon ?>" id="telepon" placeholder="0821xxx" required>
                                                        </div>
                                                        <div class="col-sm-6 col-md-6 mb-2">
                                                            <label for="alamat">Alamat<span class="text-danger">*</span></label>
                                                            <input name="alamat" type="text" class="form-control" id="alamat" value="<?php echo $alamat ?>" required>
                                                        </div>

                                                        <div class="col-sm-6 col-md-6 col-lg-6"></div>
                                                        <div class="col-sm-6 col-md-6 col-lg-6 text-right mt-3">
                                                            <div id="Ada1">
                                                                <button type="button" class="btn btn-primary px-4" onclick="GetVerif()">Update</button>
                                                            </div>
                                                            <div style="display:none;width: 100%;" class="cuss" id="Tambah1">
                                                                <div class="tengah-tengah px-3">
                                                                    <div class="input-group">
                                                                        <input name="password" type="password" placeholder="Verifikasi Password" class="form-control mr-2" required>
                                                                        <div class="input-group-append">
                                                                            <button type="submit" name="SimpanEdit" class="btn btn-primary px-3">Update</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </form>
                                            </div>

                                            <div id="PagePassword" class="tab-pane fade"><br>
                                                <form method="POST">
                                                    @csrf
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-md-4 col-lg-3 col-form-label">Password Lama<span class="text-danger">*</span></label>
                                                        <div class="col-sm-8 col-md-7 col-lg-4">
                                                            <input type="password" name="pswd1" placeholder="********" class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-md-4 col-lg-3 col-form-label">Password Baru<span class="text-danger">*</span></label>
                                                        <div class="col-sm-8 col-md-7 col-lg-4">
                                                            <input type="password" name="pswd2" placeholder="********" class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-md-4 col-lg-3 col-form-label">Konfirmasi Password<span class="text-danger">*</span></label>
                                                        <div class="col-sm-8 col-md-7 col-lg-4">
                                                            <input type="password" name="pswd3" placeholder="********" class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-12 col-md-11 col-lg-7 text-right">
                                                            <button type="submit" name="UpdatePass" class="btn btn-primary px-4">Update</button>
                                                        </div>
                                                    </div>

                                                </form>
                                            </div>


                                        </div><!-- End tab -->
                                    </div>
                                </div><!-- End profile widget -->
                            </div>
                        </div>
                        <!-- /# card -->
                    </div>
                </div>
            </div>
        </div>
        <script>
            function GetVerif() {
                var x = document.getElementById("Ada1");
                if (x.style.display === "none") {
                    x.style.display = "block";
                } else {
                    x.style.display = "none";
                }
                var y = document.getElementById("Tambah1");
                if (y.style.display === "block") {
                    y.style.display = "none";
                } else {
                    y.style.display = "block";
                }
            }
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        
        @include('layouts.footer')>
</body>

</html>