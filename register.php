<?php
session_start();
include "./data/code.php";
$code = new Code();
$user = $pass = $confpass = $email = $level = $cek_err = "";
if (isset($_POST['register_btn'])) {
    $level1 = 'user';
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    $email = $_POST['email'];

    if (empty($username) && empty($password) && empty($confirmpassword) && empty($email) && empty($level)) {
        $cek_err = "Form tidak boleh kosong!";
    }else if(empty($username)){
        $cek_err = "Nama tidak boleh kosong!";
    }else if (empty($password)) {
        $cek_err = "Password tidak boleh kosong!";
    }else if (empty($email)) {
        $cek_err = "Email tidak boleh kosong!";
    }else if ($password == $confirmpassword) {
        $add_status = $code->register($level1, $username, $password, $email);
        if ($add_status) {
        }


    } else if ($password != $confirmpassword) {
        $cek_err = "Password tidak sesuai!";
    }
}
    

    

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
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
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa fa-user"></i></span>
                        <input type="text" name="username" class="form-control" placeholder="Username" />
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa fa-lock"></i></span>
                        <input type="password" name="password" class="form-control" placeholder="Password" />
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa fa-lock"></i></span>
                        <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password" />
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                        <input type="text" name="email" class="form-control" placeholder="Email" />
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa fa-anchor"></i></span>
                        <input type="text" name="level" class="form-control" placeholder="User" readonly/>
                    </div>
                    <div class="d-grid">
                    <p class="text-center mb-1 text-danger" >
                           <?php echo $cek_err; ?>
                        </p>    
                    <button type="submit" class="btn btn-dark" name="register_btn">Register Now</button>
                    <p class="text-center mb-3">
                            Sudah punya akun ? <a href="index.php">Login disini</a>
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