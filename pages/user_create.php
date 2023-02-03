<?php
session_start();
include "../data/code.php";
$code = new Code();
if (isset($_POST['user_add_btn'])) {
    $level = $_POST['level'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    $add_status = $code->add_data_user($level, $username, $password, $email);
    if ($add_status) {
        header('Location: user_read.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data User</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/all.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
    <!-- Nav bar start -->
    <?php include "../menu/navbar.php"; ?>
    <!-- Nav bar end -->

    <!-- content start -->
    <br><br><br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt4">
                <!-- alert message start -->
            <?php if(isset($_SESSION['message'])) : ?>
                    <h5 class="alert alert-success"><?= $_SESSION['message']; ?></h5>
                <?php 
                    unset($_SESSION['message']); 
                    endif; 
                ?>
                <!-- alert message end -->
                
                <!-- form start -->
                <div class="card">
                    <div class="card-header">
                        <h3>Tambah data user
                            <a href="user_read.php" class="btn btn-danger float-end">Back</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="mb-3">
                                <label>Level</label><br>
                                    <select id="level" name="level" select class="form-select" aria-label="Default select example">
                                        <option value="admin">Admin</option>
                                        <option value="user" selected>User</option>
                                    </select>
                            </div>    
                            <div class="mb-3">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label>Password</label>
                                <input type="text" name="password" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label>Email</label> 
                                <input type="text" name="email" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="user_add_btn" class="btn btn-primary">Tambah User</button>
                            </div>
                        </form>
                    </div>
                    

                </div>
                <!-- form end -->
            </div>
        </div>
    </div>
    <!-- content end -->
    
    
      <!-- copyright start -->
      <div class="container text-center pt-5 pb-5">
        All Rights Reserved &copy; 2023
      </div>
      <!-- copyright end -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>