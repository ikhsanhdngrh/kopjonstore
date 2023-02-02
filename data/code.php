<?php

class Code
{
    public function __construct() 
    {
        $host = "localhost";
        $dbname = "kopjonstore";
        $username = "root";
        $password = "";
        $this->db = new PDO("mysql:host={$host};dbname={$dbname}", $username, $password);

    }
    //Tabel Data_baju
    public function add_data($nmbaju, $jumlah, $harga){
        $data = $this->db->prepare('INSERT INTO data_baju (nmbaju,jumlah,harga) VALUES (?, ?, ?)');
        
        $data->bindParam(1, $nmbaju);
        $data->bindParam(2, $jumlah);
        $data->bindParam(3, $harga);
 
        $query_execute = $data->execute();
        
        if($query_execute){
            $_SESSION['message'] = "Data berhasil ditambahkan!";
            header('Location: ../pages/baju_create.php');
            exit(0);
        }
        else{
            $_SESSION['message'] = "Data gagal ditambhkan!";
            header('Location: ../pages/baju_create.php');
        }

        return $data->rowCount();
    }

    public function show()
    {
        $query = $this->db->prepare("SELECT * FROM data_baju");
        $query->execute();
        $data = $query->fetchAll();
        return $data;
    }

    public function get_by_id($id){
        $query = $this->db->prepare("SELECT * FROM data_baju where id=?");
        $query->bindParam(1, $id);
        $query->execute();
        return $query->fetch();
    }

    public function update($id, $nmbaju, $jumlah, $harga){
        $query = $this->db->prepare('UPDATE data_baju set nmbaju=?,jumlah=?,harga=? where id=?');
        
        $query->bindParam(1, $nmbaju);
        $query->bindParam(2, $jumlah);
        $query->bindParam(3, $harga);
        $query->bindParam(4, $id);
 
        $query_execute = $query->execute();
        
        if($query_execute){
            $_SESSION['message'] = "Data berhasil diubah!";
            header('Location: ../pages/baju_read.php');
            exit(0);
        }
        else{
            $_SESSION['message'] = "Data gagal diubah!";
            header('Location: ../pages/baju_read.php');
        }

        return $query->rowCount();
        
    }
 
    public function delete($id)
    {
        $query = $this->db->prepare("DELETE FROM data_baju where id=?");
 
        $query->bindParam(1, $id);
        
        $query_execute = $query->execute();
        
        if($query_execute){
            $_SESSION['message'] = "Data berhasil dihapus!";
            header('Location: ../pages/baju_read.php');
            exit(0);
        }
        else{
            $_SESSION['message'] = "Data gagal dihapus!";
            header('Location: ../pages/baju_read.php');
        }

        return $query->rowCount();
        
        

        
    }

    //Tabel login
    public function add_data_user($level, $username, $password, $email){
        $data = $this->db->prepare('INSERT INTO data_login (level,username,password,email) VALUES (?, ?, ?, ?)');
        $data->bindParam(1, $level);
        $data->bindParam(2, $username);
        $data->bindParam(3, $password);
        $data->bindParam(4, $email);
 
        $query_execute = $data->execute();
        
        if($query_execute){
            $_SESSION['message'] = "Data berhasil ditambahkan!";
            header('Location: ../pages/user_create.php');
            exit(0);
        }
        else{
            $_SESSION['message'] = "Data gagal ditambhkan!";
            header('Location: ../pages/user_create.php');
        }

        return $data->rowCount();
    }

    public function register($level, $username, $password, $email){
        $data = $this->db->prepare('INSERT INTO data_login (level,username,password,email) VALUES (?, ?, ?, ?)');
        
        $data->bindParam(1, $level);
        $data->bindParam(2, $username);
        $data->bindParam(3, $password);
        $data->bindParam(4, $email);
 
        $query_execute = $data->execute();
        
        if($query_execute){
            echo "<script>alert('Register berhasil, silahkan login.'); window.location = 'index.php'</script>";
            exit(0);
        }
        else{
            echo "<script>alert('Register gagal, silahkan coba lagi.'); window.location = 'register.php'</script>";
        }

        return $data->rowCount();
    }

    public function show_user()
    {
        $query = $this->db->prepare("SELECT * FROM data_login");
        $query->execute();
        $data = $query->fetchAll();
        return $data;
    }

    public function get_by_id_user($id){
        $query = $this->db->prepare("SELECT * FROM data_login where id=?");
        $query->bindParam(1, $id);
        $query->execute();
        return $query->fetch();
    }

    public function update_user($id, $level, $username, $password, $email){
        $query = $this->db->prepare('UPDATE data_login set level=?,username=?,password=?,email=? where id=?');
        
        $query->bindParam(1, $level);
        $query->bindParam(2, $username);
        $query->bindParam(3, $password);
        $query->bindParam(4, $email);
        $query->bindParam(5, $id);
 
        $query_execute = $query->execute();
        
        if($query_execute){
            $_SESSION['message'] = "Data berhasil diubah!";
            header('Location: ../pages/user_read.php');
            exit(0);
        }
        else{
            $_SESSION['message'] = "Data gagal diubah!";
            header('Location: ../pages/user_read.php');
        }

        return $query->rowCount();
        
    }
 
    public function delete_user($id)
    {
        $query = $this->db->prepare("DELETE FROM data_login where id=?");
 
        $query->bindParam(1, $id);
        
        $query_execute = $query->execute();
        
        if($query_execute){
            $_SESSION['message'] = "Data berhasil dihapus!";
            header('Location: ../pages/user_read.php');
            exit(0);
        }
        else{
            $_SESSION['message'] = "Data gagal dihapus!";
            header('Location: ../pages/user_read.php');
        }

        return $query->rowCount();
        
    }
    public function proses_login($user, $pass){
        
        $query = $this->db->prepare('SELECT * FROM data_login WHERE username=? AND password=?');
        $query->execute(array($user,$pass));
        $count = $query->rowCount();
        if($count > 0)
        {
            session_start();
            $data=$query->fetch();
            if($data['level']=="admin"){
                $_SESSION['username']=$data['username'];
                $_SESSION['level']=$data['level'];
                header('location:pages/baju_read.php');
            }else{
                $_SESSION['username']=$data['username'];
                $_SESSION['level']=$data['level'];
                header('location:pages/baju_read.php');
          }
            return $hasil = $query->fetch();
        }else{
            return 'gagal';
        }
    }

    
}

?>