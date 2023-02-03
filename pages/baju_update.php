<?php
session_start();
include "../data/code.php";
$code = new Code();
if(isset($_GET['idb'])){
    $idb = $_GET['idb']; 
    $data_baju = $code->get_by_id($idb);
}
else
{
    header('Location: baju_read.php');
};
 
if(isset($_POST['baju_update_btn'])){
    $idb = $_POST['idb'];
    $nmbaju = $_POST['nmbaju'];
    $stock = $_POST['stock'];
    $harga = $_POST['harga']; 
    $status_update = $code->update($idb,$nmbaju,$stock,$harga);
    if($status_update)
    {
        header('Location:baju_read.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Baju</title>
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
                        <h3>Edit data baju
                            <a href="baju_read.php" class="btn btn-danger float-end">Back</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <input type="hidden" name="idb" value="<?php echo $data_baju['idb']; ?>"/>
                            <div class="mb-3">
                                <label>Nama Baju</label>
                                <input type="text" name="nmbaju" value="<?php echo $data_baju['nmbaju']; ?>" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label>Stock</label>
                                <input type="text" name="stock" value="<?php echo $data_baju['stock']; ?>" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label>Harga</label> 
                                <input type="text" name="harga" value="<?php echo $data_baju['harga']; ?>" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="baju_update_btn" class="btn btn-primary">Edit Baju</button>
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