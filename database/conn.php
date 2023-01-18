<?php

    $host = "localhost";
    $dbname = "kopjonstore";
    $username = "root";
    $password = "";
    $conn;

   
        $conn = null;
        try {
            $conn = new PDO("mysql:host=" . $host . ";dbname=" . $dbname, $username, $password);
            $conn->exec("set names utf8");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Connection sukses ";

        } catch (PDOException $e) {
            echo "Connection error : " . $e->getMessage();
        }
    

