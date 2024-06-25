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
    <title>Dompet : Payment Admin Template</title>

    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="assets/image/png" href="assets/images/favicon.png">
    <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <div class="text-center mb-3">
                                        <a href="{{ url('/') }}"><img src="assets/images/logo-full.png" alt=""></a>
                                    </div>
                                    <h4 class="text-center mb-4" action="">Sign in your account</h4>
                                    <form method="POST" > <!-- Form menggunakan method POST dan diarahkan ke route login -->
                                        @csrf <!-- CSRF token untuk keamanan -->
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Username</strong></label>
                                            <input type="text" class="form-control" name="username">
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Password</strong></label>
                                            <input type="password" class="form-control" name="password">
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block">Sign Me In</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p>Don't have an account? <a class="text-primary" href="{{ url('/registrasi') }}">Sign up</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

     <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="assets/vendor/global/global.min.js"></script>
    <script src="assets/js/custom.min.js"></script>
    <script src="assets/js/dlabnav-init.js"></script>
    <script src="assets/js/styleSwitcher.js"></script>

    <!-- sweetalert -->
    <link rel="stylesheet" href="node_modules/sweetalert2/dist/sweetalert2.min.css">
    <script src="node_modules/sweetalert2/dist/sweetalert2.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('form').submit(function(event) {
                event.preventDefault();
                let username = $('input[name="username"]').val();
                let password = $('input[name="password"]').val();
    
                if (username == "" || password == "") {
                    Swal.fire('', 'Mohon lengkapi formulir', 'question');
                } else {
                    $.ajax({
                        type: "POST",
                        url: "{{ url('/login') }}",
                        data: {
                            _token: '{{ csrf_token() }}',
                            username: username,
                            password: password,
                        },
                        success: function(response) {
                            console.log(response);
                            if (response.trim() === '"pimpinan"') {
                                window.location = "{{ route('laporan') }}"; 
                            } else if (response.trim() === '"karyawan"') {
                                window.location = "{{ route('produk') }}"; 
                            } else {
                                Swal.fire("Gagal!", "Login tidak berhasil, silahkan cek username dan password anda.", "error");
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText); 
                            Swal.fire("Gagal!", "Terjadi kesalahan saat melakukan login.", "error");
                        },
                        dataType: 'text'
                    });
                }
            });
        });
    </script>
    
    
</body>

</html>
