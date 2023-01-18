<?php
session_start();
include('../database/conn.php');

if(isset($_POST['barang_delete_btn'])){

    $id = $_POST['barang_delete_btn'];
    
    try{
        $query = "DELETE FROM data_barang WHERE id=:id";
        $statement = $conn->prepare($query);
        $data = [
            ':id' => $id,
        ];
        $query_execute = $statement->execute($data);

        if($query_execute){
            $_SESSION['message'] = "Data berhasil dihapus!";
            header('Location: ../pages/barang_read.php');
            exit(0);
        }
        else{
            $_SESSION['message'] = "Data gagal dihapus!";
            header('Location: ../pages/barang_read.php');
            exit(0);
        }

    }catch(PDOException $e){
        echo $e->getMessage();
    }
}

if(isset($_POST['barang_update_btn'])){
    $id = $_POST['id'];
    $nmbarang = $_POST['nmbarang'];
    $jumlah = $_POST['jumlah'];
    $harga = $_POST['harga'];

    try{
        $query = "UPDATE data_barang SET nmbarang=:nmbarang, jumlah=:jumlah, harga=:harga WHERE id=:id LIMIT 1";
        $statement = $conn->prepare($query);

        $data = [
            ':nmbarang' => $nmbarang,
            ':jumlah' => $jumlah,
            ':harga' => $harga,
            'id' => $id,
        ];

        $query_execute = $statement->execute($data);

        if($query_execute){
            $_SESSION['message'] = "Data berhasil diedit!";
            header('Location: ../pages/barang_read.php');
            exit(0);
        }
        else{
            $_SESSION['message'] = "Data gagal diedit!";
            header('Location: ../pages/barang_read.php');
            exit(0);
        }

    }catch(PDOException $e){
        echo $e->getMessage();
    }
}



if(isset($_POST['barang_add_btn'])){
    $nmbarang = $_POST['nmbarang'];
    $jumlah = $_POST['jumlah'];
    $harga = $_POST['harga'];

    $query = "INSERT INTO data_barang(nmbarang, jumlah, harga) VALUES(:nmbarang, :jumlah, :harga)";
    $query_run = $conn->prepare($query);

    $data = [
        ':nmbarang' => $nmbarang,
        ':jumlah' => $jumlah,
        ':harga' => $harga,
    ];
    $query_execute = $query_run->execute($data);

    if($query_execute){
        $_SESSION['message'] = "Data berhasil ditambahkan!";
        header('Location: ../pages/barang_create.php');
        exit(0);
    }
    else{
        $_SESSION['message'] = "Data gagal ditambahkan!";
        header('Location: ../pages/barang_create.php');
        exit(0);
    }
}

?>