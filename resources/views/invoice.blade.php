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
    <link rel="shortcut icon" type="assets/image/png" href="../assets/images/favicon.png">
    <!-- Datatable -->
    <link href="../assets/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="waviy">
            <span style="--i:1">L</span>
            <span style="--i:2">o</span>
            <span style="--i:3">a</span>
            <span style="--i:4">d</span>
            <span style="--i:5">i</span>
            <span style="--i:6">n</span>
            <span style="--i:7">g</span>
            <span style="--i:8">.</span>
            <span style="--i:9">.</span>
            <span style="--i:10">.</span>
        </div>
    </div>
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="../index.html" class="brand-logo">
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
                            <a href="profile" class="dropdown-item ai-icon">
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
                        <a class="has-arrow ai-icon" href="produk" aria-expanded="false">
                            <i class="flaticon-025-dashboard"></i>
                            <span class="nav-text">Produk</span>
                        </a>
                    </li>
                    <li>
                        <a class="has-arrow ai-icon" href="transaksi" aria-expanded="false">
                            <i class="flaticon-043-menu"></i>
                            <span class="nav-text">Transaksi</span>
                        </a>
                    </li>
                @else
                    <li>
                        <a class="has-arrow ai-icon" href="laporan" aria-expanded="false">
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
                                <div class="table-responsive">
                                    <h1 class="h3 mb-2">
                                        Detail
                                        <span class="float-right">
                                            @if (session('role') != 'pimpinan')
                                                <a href="../transaksi" class="btn btn-danger btn-sm px-3 mr-1">Kembali</a>
                                            @else
                                                <a href="../laporan" class="btn btn-danger btn-sm px-3 mr-1">Kembali</a>
                                            @endif
                                           

                                            <button type="button" class="btn btn-primary btn-sm px-3" onclick="printContent()">
                                                Cetak</button>
                                        </span>
                                    </h1>
                                    <div class="bg-purple p-2 text-white" style="border-radius:0.25rem;">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h5 class="mb-0">No. Invoice :
                                                    @if (session('role') != 'pimpinan')
                                                    {{ $dataInv }}
                                                    @else
                                                    {{ $dataInv['invoice'] }}
                                                    @endif

                                                </h5>
                                            </div>
                                            <div class="col-lg-6">
                                                <h5 class="mb-0 date-inv">Tanggal : {{ $Datee }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <table class="table table-striped table-sm table-bordered dt-responsive nowrap print-none" id="cart" width="100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Kode Produk</th>
                                                <th>Nama Produk</th>
                                                <th>Harga</th>
                                                <th>Qty</th>
                                                <th>Subtotal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          
                                            @foreach($laporan as $d)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $d['kode_produk'] }}</td>
                                                    <td>{{ $d['nama_produk'] }}</td>
                                                    <td>Rp.{{ $d['harga'] }}</td>
                                                    <td>{{ $d['qty'] }}</td>
                                                    <td>Rp.{{ $d['subtotal'] }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="row justify-content-end mt-1">
                                        <div class="col-sm-6 col-md-5 col-lg-4">
                                            <div class="bg-purple text-white p-2">
                                                <h6 class="mb-0">Total Item
                                                    <span class="float-right">Rp.{{ $total->isub }}</span>
                                                </h6>
                                            </div>
                                            <div class="bg-light p-2">
                                                <h6 class="mb-2">Pembayaran
                                                    <span class="float-right">Rp.{{ $Dbayar }}</span>
                                                </h6>
                                                <h6 class="mb-0">Kembalian
                                                    <span class="float-right">Rp.{{ $Dkembali }}</span>
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    

                                    <!-- data print -->
                                    <section id="print" style="display: none;">
                                        <div class="text-center mb-5 pt-2">
                                            <h2 class="mb-3" style="font-size:60px;">{{ $toko }}</h2>
                                            <h2 class="mb-0">{{ $alamat }}</h2>
                                            <h2 class="mb-4">Telp : {{ $telepon }}</h2>
                                        </div>
                                        <h2 class="mb-1">Invoice : @if (session('role') !== 'pimpinan')
                                            {{ $dataInv }}
                                        @else
                                            {{ $dataInv['invoice'] }}
                                        @endif
                                            <br><span class="float-right">Kasir : {{ $username }}</span>
                                        </h2>
                                        <h2 class="mb-1">Tanggal : {{ $Datee }}</h2>
                                        <div class="row">
                                            <div class="col-12 py-3 my-3 border-top border-bottom">
                                                <div class="row">
                                                    <div class="col-5">
                                                        <h2 class="mb-0 py-1" style="font-weight:700;">Description</h2>
                                                    </div>
                                                    <div class="col-2">
                                                        <h2 class="mb-0 py-1" style="font-weight:700;">Harga</h2>
                                                    </div>
                                                    <div class="col-2">
                                                        <h2 class="mb-0 py-1" style="font-weight:700;">Qty</h2>
                                                    </div>
                                                    <div class="col-3">
                                                        <h2 class="mb-0 py-1" style="font-weight:700;">Jumlah</h2>
                                                    </div>
                                                </div>
                                            </div>
                                            @foreach($laporan as $c)
                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col-5">
                                                            <h2 class="mb-0 py-1" style="font-weight:500;">{{ $c['nama_produk'] }}</h2>
                                                        </div>
                                                        <div class="col-2">
                                                            <h2 class="mb-0 py-1" style="font-weight:500;">{{ $c['harga'] }}</h2>
                                                        </div>
                                                        <div class="col-2">
                                                            <h2 class="mb-0 py-1" style="font-weight:500;">{{ $c['qty'] }}</h2>
                                                        </div>
                                                        <div class="col-3">
                                                            <h2 class="mb-0 py-1" style="font-weight:500;">{{ $c['subtotal'] }}</h2>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                            <div class="col-12 py-3 my-3 border-top">
                                                <div class="row justify-content-end">
                                                    <div class="col-3 text-right border-bottom">
                                                        <h2 class="mb-1" style="font-weight:700;">Total <span class="ml-3">:</span></h2>
                                                        <h2 class="mb-1" style="font-weight:500;">Tunai <span class="ml-3">:</span></h2>
                                                        <h2 class="mb-1" style="font-weight:500;">Kembali <span class="ml-3">:</span></h2>
                                                    </div>
                                                    <div class="col-3 border-bottom">
                                                        <h2 class="mb-1" style="font-weight:700;">                                    
                                                                {{ $total->isub }}

                                                        <h2 class="mb-1" style="font-weight:500;">{{ $Dbayar }}</h2>
                                                        <h2 class="mb-1" style="font-weight:500;">{{ $Dkembali }}</h2>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 text-center mt-5">
                                                <h2>* Terima Kasih Telah Berbelanja Di TOKO KAMI :) *</h2>
                                            </div>
                                        </div><!-- end row -->
                                    </section>
                                    
                                </div>
                            </div>
                        </div>
                        <!-- /# card -->
                    </div>
                </div>
            </div>
        </div>

        <script>
            function printContent() {
                var printSection = document.getElementById('print');
                var originalContents = document.body.innerHTML;
                document.body.innerHTML = printSection.innerHTML;
                window.print();
                document.body.innerHTML = originalContents;
            }
        </script>

<!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Sulaiman Hamzah &amp; Developed by <a href="https://www.spacex.com/" target="_blank">SpaceX</a> 2023</p>
            </div>
        </div>
        <!--*******z***************************
                    Footer end
                ***********************************-->
        
        </div>
        <!--**********************************
                Scripts
            ***********************************-->
        <!-- Required vendors -->
        <script src="../assets/vendor/global/global.min.js"></script>
        <script src="../assets/vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
        <script src="../assets/js/custom.min.js"></script>
        <script src="../assets/js/dlabnav-init.js"></script>
        <script src="../assets/js/demo.js"></script>
        <script src="../assets/js/styleSwitcher.js"></script>
        <script src="../assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
        <script src="../assets/js/plugins-init/datatables.init.js"></script>
</body>

</html>