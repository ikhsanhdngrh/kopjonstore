<?php
session_start();
include "../data/code.php";
$code = new Code();
$data_baju_masuk = $code->show_baju_msk();

if(isset($_GET['id']))
{
    $id = $_GET['id'];
    $idb = $_GET['idb'];
    $status_hapus_baju_masuk = $code->baju_msk_delete($id, $idb);
    if($status_hapus_baju_masuk)
    {
        header('Location: baju_masuk_read.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Masuk Stock Baju</title>
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
                        <h3>Data Masuk Stock Baju
                        <a href="baju_masuk_create.php" class="btn btn-success float-end" >Tambah Data</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <th>No.</th>
                                <th>Tanggal</th>
                                <th>Nama Baju</th>
                                <th>Jumlah</th>
                                <th>Harga(pcs)</th>
                                <th>Keterangan</th>
                                <th colspan="2" class="text-center">Action</th>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($data_baju_masuk as $row) {

                                    echo "<tr>";
                                    echo "<td>" . $no++ . "</td>";
                                    echo "<td>" . $row['tgl'] . "</td>";
                                    echo "<td>" . $row['nmbaju'] . "</td>";
                                    echo "<td>" . $row['jumlah'] . "</td>";
                                    echo "<td>" . $row['harga'] . "</td>";
                                    echo "<td>" . $row['ket'] . "</td>";
                                    echo "<td class='text-center'><a class='btn btn-primary' href='baju_masuk_update.php?id=" . $row['id'] .'&idb='. $row['idb'] ."'>Edit</a></td>
                                    <td class='text-center'><button type='button' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#hapus". $row['id'] ."'>
                                    Hapus</button></td>
                                    
                                    <!--Pesan Confirmasi Hapus Data -->
                                    <div class='modal' id='hapus".$row['id'] ."' tabindex='-1'>
                                    <div class='modal-dialog'>
                                      <div class='modal-content'>
                                        <div class='modal-header'>
                                          <h5 class='modal-title'>Hapus Data</h5>
                                          <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                        </div>
                                        <div class='modal-body'>
                                          <p>Apakah anda yakin untuk menghapus data?</p>
                                        </div>
                                        <div class='modal-footer'>
                                          <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                                          <a class='btn btn-danger' href='baju_masuk_read.php?id=" . $row['id'] .'&idb='. $row['idb'] . "'>Hapus</a>
                                        </div>
                                      </div>
                                    </div>
                                  </div>";
                                echo "</tr>";
                            }?>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-header">
                        <h3>
                        <button type="submit" class="btn btn-success float" onclick="window.open('baju_masuk_report.php', '_blank') ">Export</button>
                        </h3>
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