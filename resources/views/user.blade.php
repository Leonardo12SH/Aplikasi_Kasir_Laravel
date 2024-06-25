
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

        <!--**********************************
                Sidebar start
            ***********************************-->
        <div class="dlabnav">
            <div class="dlabnav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="dropdown header-profile">
                        <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                            <img src="assets/images/profile/small/pic1.jpg" width="20" alt="">
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
                            <a href="laporan.php" class="dropdown-item ai-icon">
                                <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                    <polyline points="16 17 21 12 16 7"></polyline>
                                    <line x1="21" y1="12" x2="9" y2="12"></line>
                                </svg>
                                <span class="ms-2"><a href="logout.php">Logout</a></span>
                            </a>

                        </div>
                    </li>
                    <li><a class="ai-icon" href="laporan.php" aria-expanded="false">
                            <i class="flaticon-072-printer"></i>
                            <span class="nav-text">Laporan</span>
                        </a>

                    </li>
                    <li><a class="has-arrow  ai-icon" href="user" aria-expanded="false">
                            <i class="flaticon-043-menu"></i>
                            <span class="nav-text">User</span>
                        </a>

                    </li>
                    <!-- <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                                <i class="flaticon-043-menu"></i>
                                <span class="nav-text">User</span>
                            </a>
                        </li> -->

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
        <div class="content-body">
            <div class="container-fluid">
                <!-- row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#TambahUser">Tambah User</button>
                                </h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-sm table-bordered dt-responsive nowrap display">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Username</th>
                                                <th>Toko</th>
                                                <th>Alamat</th>
                                                <th>Telepon</th>
                                                <th>Role</th>
                                                <th>Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

                                                                              
                                           @foreach($user as $row)
                                            
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $row->username }}</td>
                                                    <td>{{ $row->toko }}</td>
                                                    <td>{{ $row->alamat }}</td>
                                                    <td>{{ $row->telepon }}</td>
                                                    <td>{{ $row->role }}</td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <a href="#" class="btn btn-primary shadow btn-xs sharp me-1" data-bs-toggle="modal" data-bs-target="{{ '#EditUser'.$row['userid'] }}"><i class="fas fa-pencil-alt"></i></a>
                                                            <a href="{{ $row['userid'].'/hapus-user' }}" class="btn btn-danger shadow btn-xs sharp" onclick="return confirm('Mau dihapus?')"><i class="fa fa-trash"></i></a>
                                                        </div>
                                                    </td>
                                                    
                                                </tr>
                                                <div class="modal fade" id="EditUser<?php echo $row['userid']; ?>">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Edit User</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                                </button>
                                                            </div>
                                                            <form method="post" action="{{ $row['userid'].'/edit-user' }}">
                                                                @csrf
                                                                <div class="modal-body">

                                                                    <div class="form-group">
                                                                        <input type="hidden" name="userid" value="<?php echo $row['userid']; ?>">

                                                                        <label class="samll">Username :</label>
                                                                        <div class="input-group mb-3 input-primary">
                                                                            <input type="text" name="username" value="<?php echo $row['username']; ?>" class="form-control" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="samll">Password :</label>
                                                                        <div class="input-group mb-3 input-primary">
                                                                            <input type="text" name="password" class="form-control" value="12345" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="samll">Toko :</label>
                                                                        <div class="input-group mb-3 input-primary">
                                                                            <input type="text" name="toko" value="<?php echo $row['toko']; ?>" class="form-control" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="samll">Alamat :</label>
                                                                        <div class="input-group mb-3 input-primary">
                                                                            <input type="text" name="alamat" value="<?php echo $row['alamat']; ?>" class="form-control" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="samll">Telepon :</label>
                                                                        <div class="input-group mb-3 input-primary">
                                                                            <input type="text" name="telepon" value="<?php echo $row['telepon']; ?>" class="form-control" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="small">Role :</label>
                                                                        <div class="input-group mb-3 input-primary">
                                                                            <select name="role" class="form-control" required>
                                                                                <option value="">Pilih Role</option>
                                                                                <option value="pimpinan" <?php if ($row['role'] == 'pimpinan') echo 'selected'; ?>>Pimpinan</option>
                                                                                <option value="karyawan" <?php if ($row['role'] == 'karyawan') echo 'selected'; ?>>Karyawan</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Batal</button>
                                                                    <button type="submit" class="btn btn-primary" name="SimpanEdit">Simpan</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>

                                                    <!-- end Modal Produk -->
                                                
                                                @endforeach
                                        </tbody>
                                    </table>
                                    <!-- Modal Tambah Produk -->
                                    <!-- end Modal Produk -->

                                    </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /# card -->
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="TambahUser">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <form method="post" action="tambah-user">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="samll">Username :</label>
                                <div class="input-group mb-3 input-primary">
                                    <input type="text" name="username" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="samll">Password :</label>
                                <div class="input-group mb-3 input-primary">
                                    <input type="text" name="password" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="samll">Toko :</label>
                                <div class="input-group mb-3 input-primary">
                                    <input type="text" name="toko" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="samll">Alamat :</label>
                                <div class="input-group mb-3 input-primary">
                                    <input type="text" name="alamat" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="samll">Telepon :</label>
                                <div class="input-group mb-3 input-primary">
                                    <input type="text" name="telepon" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="small">Role :</label>
                                <div class="input-group mb-3 input-primary">
                                    <select name="role" class="form-control" required>
                                        <option value="">Pilih Role</option>
                                        <option value="pimpinan">Pimpinan</option>
                                        <option value="karyawan">Karyawan</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary" name="TambahUser">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        

    </div><!-- end row -->

    <!-- Datatable -->

    @include('layouts.footer')
</body>

</html>