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


<?php
$jsArray = "var nama_produk = new Array();";
$jsArray1 = "var harga_jual = new Array();";
$jsArray2 = "var harga_modal = new Array();";
?>

<div class="content-body">
    <div class="container-fluid">
        <!-- isinya -->
        <form method="post" action="/input-keranjang">
            @csrf
            <div class="row">

                <div class="col-sm-4 col-md-4 col-lg-3 mb-3">
                    <label class="small text-muted mb-1">Kode Produk</label>
                    <div class="position-relative">
                        <input type="text" name="Ckdproduk" class="form-control form-control-sm" list="datalist1" onchange="changeValue(this.value)" required autofocus>
                        <datalist id="datalist1">
                            @if ($dataselect->count() > 0)
                                @foreach ($dataselect as $row_brg)
                                    <option value="{{ $row_brg['kode_produk'] }}">{{ $row_brg['kode_produk'] }}</option>
                                    <?php
                                    $jsArray .= "nama_produk['" . $row_brg['kode_produk'] . "'] = {nama_produk:'" . addslashes($row_brg['nama_produk']) . "'};";
                                    $jsArray1 .= "harga_jual['" . $row_brg['kode_produk'] . "'] = {harga_jual:'" . addslashes($row_brg['harga_jual']) . "'};";
                                    $jsArray2 .= "harga_modal['" . $row_brg['kode_produk'] . "'] = {harga_modal:'" . addslashes($row_brg['harga_modal']) . "'};";
                                    ?>
                                @endforeach
                            @endif
                        </datalist>
                        
                    </div>
                </div>
                <div class="col-sm-4 col-md-4 col-lg-3 mb-3">
                    <label class="small text-muted mb-1">Nama Produk</label>
                    <input type="text" name="Cnproduk" id="nama_produk" class="form-control form-control-sm bg-light" readonly>
                    <input type="hidden" name="harga_modal" id="harga_modal">
                </div>
                <div class="col-sm-4 col-md-4 col-lg-2 mb-3">
                    <label class="small text-muted mb-1">Harga</label>
                    <input type="number" name="Charga" placeholder="0" id="harga_jual" onchange="InputSub()" class="form-control form-control-sm bg-light" readonly>
                </div>
                <div class="row">
                    <div class="col-4 col-sm-4 col-md-5 col-lg-2 mb-3">
                        <label class="small text-muted mb-1">Qty</label>
                        <input type="number" name="Cqty" id="Iqty" onchange="InputSub()" placeholder="0" class="form-control form-control-sm" required>
                    </div>
                    <div class="col-4 col-sm-4 col-md-5 col-lg-3 mb-3"><label class="small text-muted mb-1">Subtotal</label>
                        <div class="input-group">
                            <input type="number" name="Csubs" placeholder="0" id="Isubtotal" onchange="InputSub()" class="form-control form-control-sm bg-light mr-2" readonly>

                        </div>
                    </div>
                    <div class="col-8 col-sm-8 col-md-2 col-lg-3"><br>
                        <div class="">
                            <div class="row mb-4">
                                <div class="col">
                                    <button type="reset" class="btn btn-danger btn-sm ">Reset</button>
                                </div>
                                <div class="col">
                                    <button type="submit" name="InputCart" class="btn btn-primary btn-sm">Simpan</button>
                                </div>
                                    
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div><!-- end row -->
        </form>

        <div class="bg-primary p-2 text-white" style="border-radius:0.25rem;">
            <h5 class="mb-0">No. Invoice : <?php echo $noinv ?></h5>
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
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data_cart as $d)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $d->kode_produk }}</td>
                        <td>{{ $d->nama_produk }}</td>
                        <td>Rp.{{ $d->harga }}</td>
                        <td>{{ $d->qty }}</td>
                        <td>Rp.{{ $d->subtotal }}</td>
                        <td>
                            <a class="btn btn-danger btn-xs" href="{{ 'hapus-keranjang/'.$d->idcart }}">
                                <i class="fas fa-trash-alt fa-xs mr-1"></i>Hapus
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
         <!-- end isinya -->
        @if(session('error'))
    <div class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
@endif

        <div class=" shadow p-3 shadow-lg" style="border-radius:0.25rem;">

            <div class="row gy-3 align-items-center row-home">

                <div class="col-md-8 col-lg-6 mb-2">
                    <form method="post" action="/simpan-transaksi">
                        @csrf
                        <input type="hidden" id="totalCart" value="<?php echo $itungTrans3; ?>">
                        <input type="hidden" name="noinv" value="{{ $noinv }}">
                        <div class="row">
                            <label for="pembayaran" class="col-4 col-sm-4 col-md-4 col-lg-3 col-form-label col-form-label-sm mb-2">Pembayaran</label>
                            <div class="col-8 col-sm-8 col-md-8 col-lg-9 mb-2">
                                <input type="text" name="pembayaran" oninput="procesBayar()" class="form-control form-control-sm" id="pembayaran" placeholder="0" required>
                            </div>
                            <label for="kembalian" class="col-4 col-sm-4 col-md-4 col-lg-3 col-form-label col-form-label-sm mb-2">Kembalian</label>
                            <div class="col-8 col-sm-8 col-md-8 col-lg-9 mb-2">
                                <input type="text" class="form-control form-control-sm bg-light" id="kembalian" placeholder="0" readonly>
                                <input type="hidden" name="kembalian" id="kembalian1">
                            </div>
                            <div class="col-sm-12 text-right">
                                <div class="d-block d-sm-block d-md-none d-lg-none py-1"></div>
                                @php
                                    $x1 = $data_cart->count();
                                @endphp
                               
                                @if($x1 > 0)
                                    <a href="{{ '/hapus-semua'.$noinv }}" onclick="javascript:return confirm('Anda yakin ingin menghapus semua data keranjang ?');" class="btn btn-danger btn-sm px-3 mr-2">
                                        <i class="fa fa-trash-alt mr-1"></i>Hapus Semua
                                    </a>
                                    <button type="submit" class="btn btn-primary btn-sm px-3">
                                        <i class="fa fa-check mr-1"></i>Simpan
                                    </button>
                                @else
                                    <button class="btn btn-danger btn-sm px-3 mr-2" disabled>
                                        <i class="fa fa-trash-alt mr-1"></i>Hapus Semua
                                    </button>
                                    <button class="btn btn-primary btn-sm px-3" disabled>
                                        <i class="fa fa-check mr-1"></i>Simpan
                                    </button>
                                @endif

                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-md-4 col-lg-6 mb-2 text-primary text-right">
                    <p class="small text-muted mb-0">Total Item</p>
                    <h3 class="mb-0" style="font-weight:600;">Rp. <?php echo $itungTrans3 ?></h3>
                </div>

            </div>
        </div>
       


    </div><!-- end container-fluid" -->
    </main><!-- end page-content" -->
</div><!-- end page-wrapper -->

</div>
</div>

<!-- Modal Exit -->
<div class="modal fade" id="Exit" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content border-0">
            <div class="modal-body text-center">
                <i class="fas fa-exclamation-triangle fa-4x text-warning mb-3"></i>
                <h3 class="mb-4">Apakah anda yakin ingin keluar ?</h3>
                <button type="button" class="btn btn-secondary px-4 mr-2" data-dismiss="modal">Batal</button>
                <a href="logout" class="btn btn-primary px-4">Keluar</a>
            </div>
        </div>
    </div>
    <!-- end Modal Exit -->

    @include('layouts.footer')


    <script type="text/javascript">
        <?php echo $jsArray, $jsArray1, $jsArray2; ?>

        function changeValue(kode_produk) {
            document.getElementById("nama_produk").value = nama_produk[kode_produk].nama_produk;
            document.getElementById("harga_jual").value = harga_jual[kode_produk].harga_jual;
            document.getElementById("harga_modal").value = harga_modal[kode_produk].harga_modal;
        };

        function InputSub() {
            var harga_jual = parseInt(document.getElementById('harga_jual').value);
            var jumlah_beli = parseInt(document.getElementById('Iqty').value);
            var jumlah_harga = harga_jual * jumlah_beli;
            document.getElementById('Isubtotal').value = jumlah_harga;
        };

        function procesBayar() {
            var harga_Cart = parseInt(document.getElementById('totalCart').value);
            var pembayaran_Cart = parseInt(document.getElementById('pembayaran').value);
            var kembali_Cart = pembayaran_Cart - harga_Cart;

            var number_string = kembali_Cart.toString(),
                sisa = number_string.length % 3,
                rupiah1 = number_string.substr(0, sisa),
                ribuan1 = number_string.substr(sisa).match(/\d{3}/gi);

            if (ribuan1) {
                separator1 = sisa ? '.' : '';
                rupiah1 += separator1 + ribuan1.join('.');
            }

            document.getElementById('kembalian').value = rupiah1;
            document.getElementById('kembalian1').value = kembali_Cart;
        };
    </script>
    </body>

    </html>