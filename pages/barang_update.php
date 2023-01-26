<?php
session_start();
include "../data/code.php";
$code = new Code();
if(isset($_GET['id'])){
    $id = $_GET['id']; 
    $data_barang = $code->get_by_id($id);
}
else
{
    header('Location: barang_read.php');
}
 
if(isset($_POST['barang_update_btn'])){
    $id = $_POST['id'];
    $nmbarang = $_POST['nmbarang'];
    $jumlah = $_POST['jumlah'];
    $harga = $_POST['harga']; 
    $status_update = $code->update($id,$nmbarang,$jumlah,$harga);
    if($status_update)
    {
        header('Location:barang_read.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Barang</title>
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
                        <h3>Edit data barang
                            <a href="barang_read.php" class="btn btn-danger float-end">Back</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <input type="hidden" name="id" value="<?php echo $data_barang['id']; ?>"/>
                            <div class="mb-3">
                                <label>Nama Barang</label>
                                <input type="text" name="nmbarang" value="<?php echo $data_barang['nmbarang']; ?>" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label>Jumlah</label>
                                <input type="text" name="jumlah" value="<?php echo $data_barang['jumlah']; ?>" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label>Harga</label> 
                                <input type="text" name="harga" value="<?php echo $data_barang['harga']; ?>" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="barang_update_btn" class="btn btn-primary">Edit Barang</button>
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