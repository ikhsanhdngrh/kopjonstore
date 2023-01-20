<?php
session_start();
include "./data/code.php";
$code = new Code();
if(isset($_POST['login_btn']))
{   
    // validasi text untuk filter karakter khusus dengan fungsi strip_tags()
    $user = strip_tags($_POST['username']);
    $pass = strip_tags($_POST['password']);
    // panggil fungsi proses_login() yang ada di class prosesCrud()
    $result = $code->proses_login($user,$pass);
    if($result == 'gagal')
    {
        echo "<script>alert('Username atau Password Salah!'); window.location = 'index.php'</script>";
    }else{
        // status yang diberikan 
        session_start();
        $_SESSION['admin'] = $result;
        // status yang diberikan 
        echo "<script>window.location='./pages/barang_read.php';</script>";
    }
}?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/all.min.css">
    <link rel="stylesheet" href="./css/style.css">
  </head>
  <body class="bg-light">
    <br><br><br><br><br><br><br>
    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-4 bg-white m-auto rounded-top wrapper">
                <h2 class="text-center pt-3">Kopjon Store</h2>
                <!-- Form Start -->
                <form action="" method="post">
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                        <input type="text" name="username" class="form-control" placeholder="Username" />
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa fa-lock"></i></span>
                        <input type="text" name="password" class="form-control" placeholder="Password" />
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-dark" name="login_btn">Login Now</button>
                        <p class="text-center mb-3">
                           
                        </p>
                    </div>
                </form>
                <!-- Form Close -->
            </div>
        </div>
    </div>

    <script src="./js/bootstrap.bundle.min.js"></script>
  </body>
</html>