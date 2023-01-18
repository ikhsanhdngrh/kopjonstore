<?php
session_start();
include "../data/code.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
                        <h3>Data Barang</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <th>ID</th>
                                <th>Nama Barang</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th colspan="2" class="text-center">Action</th>
                            </thead>
                            <tbody>
                                <?php
                                    $query = "SELECT * FROM data_barang";
                                    $statement = $conn->prepare($query);
                                    $statement->execute();
                                
                                    $statement->setFetchMode(PDO::FETCH_OBJ);
                                    $result = $statement->fetchAll();
                                if($result){
                                    foreach($result as $row){
                                        ?>
                                        <tr>
                                            <td><?= $row->id ?></td>
                                            <td><?= $row->nmbarang ?></td>
                                            <td><?= $row->jumlah ?></td>
                                            <td><?= $row->harga ?></td>
                                            <td class="text-center">
                                                <a href="barang_update.php?id=<?= $row->id; ?>" class="btn btn-primary">Edit</a>
                                            </td>
                                            <td class="text-center">
                                                <form action="../data/code.php" method="post">
                                                    <button type="submit" name="barang_delete_btn" value="<?= $row->id; ?>" class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                            
                                        </tr>
                                        <?php

                                    }

                                }
                                else{
                                ?>
                                    <tr>
                                        <td colspan="4">Data tidak ada!</td>
                                    </tr>
                                <?php


                                    
                                }?>
                                <tr>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    

                </div>
                <!-- form end -->
            </div>
        </div>
    </div>
    <!-- content end -->
    
      <!-- copyright start -->
      <div class="container text-center pt-5 pb-5">
        All Rights Reserved &copy; 2022
      </div>
      <!-- copyright end -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>