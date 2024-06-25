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

            <div class="dlabnav">
                <div class="dlabnav-scroll">
                    <ul class="metismenu" id="menu">
                        <li class="dropdown header-profile">
                            <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                                <img src="assets/images/profile/small/pic1.jpg" width="20" alt="">
                                <div class="header-info ms-3">
                                    <span class="font-w600 ">Hi, <b>{{ $username }}</b></span>
                                    <small class="text-end font-w400">{{ $toko }}</small>
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
                        <li><a class="has-arrow ai-icon" href="laporan" aria-expanded="false">
                                <i class="flaticon-072-printer"></i>
                                <span class="nav-text">Laporan</span>
                            </a>

                        </li>
                        <li><a class=" ai-icon" href="user" aria-expanded="false">
                            <i class="flaticon-043-menu"></i>
                            <span class="nav-text">User</span>
                        </a>

                    </li>

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
                Isi konten mulai
            ***********************************-->
            <style type="text/css">
                @media print {

                    /* Sembunyikan kolom "Opsi" pada saat mencetak */
                    .no-print {
                        display: none;
                    }
                }
            </style>
            

<div class="content-body">
    <div class="container-fluid">
        <!-- Form untuk filter tanggal -->
        <div class="row mx-1">
            <form action="/laporan" method="post">
                @csrf 
                <div class="row">
                    <div class="col-3">
                        <input type="date" name="tgl_mulai" class="form-control">
                    </div>
                    <div class="col-3">
                        <input type="date" name="tgl_selesai" class="form-control">
                    </div>
                    <div class="col-2">
                        <button type="submit" name="filter_tgl" class="btn btn-primary btn-sm">Filter</button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Tampilan data laporan -->
        <div class="row m-2" id="print">
            <div class="card">
                <!-- Konten laporan -->
                <div class="card-body">
                    <!-- Informasi laporan -->
                    <div class="row mb-4">
                        <!-- Judul laporan -->
                        <div class="col">
                            <h1 class="h3 mb-2">Data Laporan</h1>
                        </div>
                        <!-- Tombol cetak -->
                        <div class="col d-grid gap-4 d-flex justify-content-end">
                            <button type="button" class="no-print btn btn-primary btn-sm mx-4 px-5" onclick="printContent()">
                                Cetak</button>
                        </div>
                        <!-- Tanggal laporan -->
                        <div class="">
                            <h4>Tanggal :
                                <!-- Tampilkan rentang tanggal yang difilter atau keseluruhan -->
                                @if (!empty($mulai) || !empty($selesai))
                                    @if ($mulai == $selesai)
                                        {{ $mulai }}
                                    @else
                                        {{ $mulai }} sampai {{ $selesai }}
                                    @endif
                                @else
                                    Keseluruhan
                                @endif
                                
                            </h4>
                        </div>
                    </div>

                    <!-- Tabel laporan -->
                    <div class="table-responsive">
                        @php
                        function ribuan($nilai)
                        {
                            return number_format($nilai, 0, ',', '.');
                        }
                        @endphp
                       <div class="row">
                        <div class="col-6 col-sm-6 col-md-3 col-lg-3 m-pr-1 m-mb-1">
                            <div class="box-laporan">
                                <p class="small mb-0">Terjual</p>
                                <h5 class="mb-0">{{ ribuan($terjual->totqty) }}</h5>
                            </div>
                        </div>
                        <div class="col-6 col-sm-6 col-md-3 col-lg-3 m-pl-1 m-mb-1">
                            <div class="box-laporan">
                                <p class="small mb-0">Pendapatan</p>
                                <h5 class="mb-0">Rp{{ ribuan($pendapatan->totdpt1) }}</h5>
                            </div>
                        </div>
                        <div class="col-6 col-sm-6 col-md-3 col-lg-3 m-pr-1">
                            <div class="box-laporan">
                                <p class="small mb-0">Penjualan</p>
                                <h5 class="mb-0">Rp{{ ribuan($penjualan->totdpt) }}</h5>
                            </div>
                        </div>
                        <div class="col-6 col-sm-6 col-md-3 col-lg-3 m-pl-1">
                            <div class="box-laporan">
                                <p class="small mb-0">Total</p>
                                <h5 class="mb-0">Rp{{ ribuan($total->isub) }}</h5>
                            </div>
                        </div>
                        <hr>
                    </div>
                        <!-- Tampilkan data laporan dalam tabel -->
                        <table id="example" class="table table-striped table-sm table-bordered dt-responsive nowrap display">
                            
                            <thead>
                                <!-- Kolom-kolom tabel -->
                                <tr>
                                    <th>No</th>
                                    <th>Invoice</th>
                                    <th>Qty</th>
                                    <th>SubTotal</th>
                                    <th>Pembayaran</th>
                                    <th>Kembalian</th>
                                    <th>Tanggal</th>
                                    <th class="no-print">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <!-- Tampilkan setiap data dari laporan -->
                            @foreach ($data_laporan as $d)
                                
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><a href="{{ url('invoice').'/'.$d['invoice'] }}">{{ $d['invoice'] }}</a></td>
                                    <td>
                                        <?php
                                        $rqty = $Laporan->where('invoice', $d->invoice)->sum('qty');
                                        echo ribuan($rqty);
                                        ?>
                                    </td>
                                    <td>Rp<?php
                                    $rsubtotal = $Laporan->where('invoice', $d->invoice)->sum('subtotal');
                                        echo ribuan($rsubtotal);
                                    ?></td>

                                    <td>Rp{{ ribuan($d->pembayaran ?? '') }}</td>
                                    <td>Rp{{ ribuan($d->kembalian ?? '') }}</td>
                                    <td>{{ $d->tgl_inv ?? '' }}</td>
                                    <td class="no-print">
                                        <form method="post">
                                            <a href="#" onclick="confirmDelete('{{ $d->invoice }}')" class="btn btn-danger btn-xs">
                                                <i class="fas fa-trash-alt fa-xs mr-1"></i>Hapus
                                            </a>         
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                            <!-- Footer tabel -->
                            <tfoot class="no-print">
                                <tr>
                                    <th>No</th>
                                    <th>Invoice</th>
                                    <th>Qty</th>
                                    <th>SubTotal</th>
                                    <th>Pembayaran</th>
                                    <th>Kembalian</th>
                                    <th>Tanggal</th>
                                    <th class="no-print">Opsi</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')
<link rel="stylesheet" href="node_modules/sweetalert2/dist/sweetalert2.min.css">
    <script src="node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
<script>
    function confirmDelete(invoice) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Anda akan menghapus data ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "/remove/" + invoice;
            }
        });
    }
</script>
<script>
    function printContent() {
        var printSection = document.getElementById('print').cloneNode(true);

        // Hapus elemen dengan kelas no-print dari salinan sebelum mencetak
        var noPrintElements = printSection.getElementsByClassName('no-print');
        for (var i = 0; i < noPrintElements.length; i++) {
            noPrintElements[i].style.display = 'none';
        }

        var originalContents = document.body.innerHTML;
        document.body.innerHTML = '';
        document.body.appendChild(printSection);

        window.print();

        // Kembalikan elemen dengan kelas no-print setelah mencetak
        for (var i = 0; i < noPrintElements.length; i++) {
            noPrintElements[i].style.display = 'table-cell';
        }

        document.body.innerHTML = originalContents;
    }
</script>

</body>

</html>