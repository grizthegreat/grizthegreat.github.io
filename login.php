
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login Page</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-lg-6">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login Page</h1>
                                    </div>
                                    <form class="user" action="post" role="form">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                id="email" aria-describedby="emailHelp" name="email"
                                                placeholder="Masukan Email Address...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="password" name="password" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                        </div>
                                        <button type="button" id="login" class="btn btn-primary btn-user btn-block">Masuk</button>
                                    </form>
                                    <hr>
                                    <!-- <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div> -->
                                    <div class="text-center">
                                        <a class="small" href="register.php">Daftar Akun </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <script src="js/sweetalert2.all.min.js"></script>
    <script>
       
        //get data login
        $('#login').click(function(e){
            e.preventDefault()
            let email = $('#email').val();
            let password = $('#password').val();

            $.ajax({
                method : 'post',
                url : 'action/proseslogin.php',
                data : {
                    email : email,
                    password : password
                },
                success : function(data, status){
                    // alert(data);
                    if(data == 'success'){
          Swal.fire({
            title: 'Berhasil',
            text: 'Anda berhasil login',
            icon: 'success'
          }).then((result) => {
            window.location.replace("index.php");
          });
        } else if (data == 'successA') {
          Swal.fire({
            title: 'Berhasil',
            text: 'Anda berhasil login sebagai admin',
            icon: 'success'
          }).then((result) => {
            window.location.replace("admin/index.php");
          });
        } else {
          Swal.fire({
            title: 'Gagal',
            text: 'Email atau password salah',
            icon: 'error'
          });
        }
      }
    });
  });
    </script>
</body>

</html>