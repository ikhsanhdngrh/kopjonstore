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
    public function add_data($nmbaju, $stock, $harga){
        $data = $this->db->prepare('INSERT INTO data_baju (nmbaju,stock,harga) VALUES (?, ?, ?)');
        
        $data->bindParam(1, $nmbaju);
        $data->bindParam(2, $stock);
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
        $query = $this->db->prepare("SELECT * FROM data_baju order by nmbaju ASC");
        $query->execute();
        $data = $query->fetchAll();
        return $data;
    }
    
    //show data_baju berdasarkan idb
    public function show_idb($idb)
    {
        $query = $this->db->prepare("SELECT * FROM data_baju where idb=? ");
        $query->bindParam(1, $idb);
        $query->execute();
        $data = $query->fetchAll();
        return $data;
    }

    public function get_by_id($idb){
        $query = $this->db->prepare("SELECT * FROM data_baju where idb=?");
        $query->bindParam(1, $idb);
        $query->execute();
        return $query->fetch();
    }

    public function update($idb, $nmbaju, $stock, $harga){
        $query = $this->db->prepare('UPDATE data_baju set nmbaju=?,stock=?,harga=? where idb=?');
        
        $query->bindParam(1, $nmbaju);
        $query->bindParam(2, $stock);
        $query->bindParam(3, $harga);
        $query->bindParam(4, $idb);
 
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
 
    public function delete($idb)
    {
        $query = $this->db->prepare("DELETE FROM data_baju where idb=?");
 
        $query->bindParam(1, $idb);
        
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
        $query = $this->db->prepare("SELECT * FROM data_login order by username ASC");
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

    //Table Baju masuk & baju keluar

    //data baju masuk
    public function show_baju_msk()
    {
        $query = $this->db->prepare("SELECT * FROM baju_msk bjm, data_baju dtb where bjm.idb=dtb.idb order by bjm.id DESC");
        $query->execute();
        $data = $query->fetchAll();
        return $data;
    }

    public function baju_msk($idb, $tgl, $jumlah, $ket){
        $query = $this->db->prepare("SELECT * FROM data_baju where idb=?");
        $query->bindParam(1, $idb);
        $query->execute();
        $prestock = $query->fetch();
        $stock = $prestock['stock']+$jumlah;
        $updquery = $this->db->prepare('UPDATE data_baju set stock=? where idb=?');
        $updquery->bindParam(1, $stock);
        $updquery->bindParam(2, $idb);
        $updquery_execute = $updquery->execute();

        $data = $this->db->prepare('INSERT INTO baju_msk (idb,tgl,jumlah,ket) VALUES (?, ?, ?, ?)');
        $data->bindParam(1, $idb);
        $data->bindParam(2, $tgl);
        $data->bindParam(3, $jumlah);
        $data->bindParam(4, $ket);
        $data_execute = $data->execute();

        if($updquery_execute && $data_execute){
            $_SESSION['message'] = "Data berhasil ditambahkan!";
            header('Location: ../pages/baju_masuk_read.php');
            exit(0);
        }
        else{
            $_SESSION['message'] = "Data gagal ditambahkan!";
            header('Location: ../pages/baju_masuk_read.php');
        }

        return $query->rowCount();

    }
    public function baju_msk_update($id, $idb, $tgl, $jumlah, $ket){
        $query = $this->db->prepare("SELECT * FROM data_baju where idb=?");
        $query->bindParam(1, $idb);
        $query->execute();
        $prestock = $query->fetch();
        $stock = $prestock['stock'];//stock yang ada pada data_baju

        $mskquery = $this->db->prepare("SELECT * FROM baju_msk where id=?");
        $mskquery->bindParam(1, $id);
        $mskquery->execute();
        $prejmlmsk = $mskquery->fetch();
        $jmlmsk = $prejmlmsk['jumlah'];//jumlah yang ada pada baju_msk
        if ($jumlah >= $jmlmsk) {
            $hitungselisih = $jumlah - $jmlmsk;
            $tambahstock = $stock + $hitungselisih;

            $updquery_databaju = $this->db->prepare('UPDATE data_baju set stock=? where idb=?');
            $updquery_databaju->bindParam(1, $tambahstock);
            $updquery_databaju->bindParam(2, $idb);
            $updquery_databaju_execute = $updquery_databaju->execute();

            $updquery_bajumasuk = $this->db->prepare('UPDATE baju_msk set tgl=?, jumlah=?, ket=? where id=?');
            $updquery_bajumasuk->bindParam(1, $tgl);
            $updquery_bajumasuk->bindParam(2, $jumlah);
            $updquery_bajumasuk->bindParam(3, $ket);
            $updquery_bajumasuk->bindParam(4, $id);
            $updquery_bajumasuk_execute = $updquery_bajumasuk->execute();

            if($updquery_databaju_execute && $updquery_bajumasuk_execute){
                $_SESSION['message'] = "Data berhasil diubah!";
                header('Location: ../pages/baju_masuk_read.php');
                exit(0);
            }
            else{
                $_SESSION['message'] = "Data gagal diubah!";
                header('Location: ../pages/baju_masuk_read.php');
            }
    
            return $query->rowCount();


        }else{
            $hitungselisih = $jmlmsk - $jumlah;
            $kurangistock = $stock - $hitungselisih;

            $updquery_databaju = $this->db->prepare('UPDATE data_baju set stock=? where idb=?');
            $updquery_databaju->bindParam(1, $kurangistock);
            $updquery_databaju->bindParam(2, $idb);
            $updquery_databaju_execute = $updquery_databaju->execute();

            $updquery_bajumasuk = $this->db->prepare('UPDATE baju_msk set tgl=?, jumlah=?, ket=? where id=?');
            $updquery_bajumasuk->bindParam(1, $tgl);
            $updquery_bajumasuk->bindParam(2, $jumlah);
            $updquery_bajumasuk->bindParam(3, $ket);
            $updquery_bajumasuk->bindParam(4, $id);
            $updquery_bajumasuk_execute = $updquery_bajumasuk->execute();

            if($updquery_databaju_execute && $updquery_bajumasuk_execute){
                $_SESSION['message'] = "Data berhasil diubah!";
                header('Location: ../pages/baju_masuk_read.php');
                exit(0);
            }
            else{
                $_SESSION['message'] = "Data gagal diubah!";
                header('Location: ../pages/baju_masuk_read.php');
            }
    
            return $query->rowCount();
        }



    }

    public function get_by_id_baju_msk($id){
        $query = $this->db->prepare("SELECT * FROM baju_msk where id=?");
        $query->bindParam(1, $id);
        $query->execute();
        return $query->fetch();
    }

    public function baju_msk_delete($id, $idb){
        $query = $this->db->prepare("SELECT * FROM data_baju where idb=?");
        $query->bindParam(1, $idb);
        $query->execute();
        $prestock = $query->fetch();
        $stock = $prestock['stock']; //stock yang ada pada data_baju

        $mskquery = $this->db->prepare("SELECT * FROM baju_msk where id=?");
        $mskquery->bindParam(1, $id);
        $mskquery->execute();
        $prejmlmsk = $mskquery->fetch();
        $jmlmsk = $prejmlmsk['jumlah']; //jumlah yang ada pada baju_msk

        $ubahstock = $stock - $jmlmsk;

        $updquery_databaju = $this->db->prepare('UPDATE data_baju set stock=? where idb=?');
        $updquery_databaju->bindParam(1, $ubahstock);
        $updquery_databaju->bindParam(2, $idb);
        $updquery_databaju_execute = $updquery_databaju->execute();

        $updquery_bajumasuk = $this->db->prepare('DELETE from baju_msk where id=?');
        $updquery_bajumasuk->bindParam(1, $id);
        $updquery_bajumasuk_execute = $updquery_bajumasuk->execute();

        if($updquery_databaju_execute && $updquery_bajumasuk_execute){
            $_SESSION['message'] = "Data berhasil dihapus!";
            header('Location: ../pages/baju_masuk_read.php');
            exit(0);
        }
        else{
            $_SESSION['message'] = "Data gagal dihapus!";
            header('Location: ../pages/baju_masuk_read.php');
        }

        return $query->rowCount();

    }

    //data baju keluar
    public function show_baju_klr()
    {
        $query = $this->db->prepare("SELECT * FROM baju_klr bjk, data_baju dtb where bjk.idb=dtb.idb order by bjk.id DESC");
        $query->execute();
        $data = $query->fetchAll();
        return $data;
    }

    public function baju_klr($idb, $tgl, $jumlah, $ket){
        $query = $this->db->prepare("SELECT * FROM data_baju where idb=?");
        $query->bindParam(1, $idb);
        $query->execute();
        $prestock = $query->fetch();
        $stock = $prestock['stock']-$jumlah;
        $updquery = $this->db->prepare('UPDATE data_baju set stock=? where idb=?');
        $updquery->bindParam(1, $stock);
        $updquery->bindParam(2, $idb);
        $updquery_execute = $updquery->execute();

        $data = $this->db->prepare('INSERT INTO baju_klr (idb,tgl,jumlah,ket) VALUES (?, ?, ?, ?)');
        $data->bindParam(1, $idb);
        $data->bindParam(2, $tgl);
        $data->bindParam(3, $jumlah);
        $data->bindParam(4, $ket);
        $data_execute = $data->execute();

        if($updquery_execute && $data_execute){
            $_SESSION['message'] = "Data berhasil ditambahkan!";
            header('Location: ../pages/baju_keluar_read.php');
            exit(0);
        }
        else{
            $_SESSION['message'] = "Data gagal ditambahkan!";
            header('Location: ../pages/baju_keluar_read.php');
        }

        return $query->rowCount();

    }
    public function baju_klr_update($id, $idb, $tgl, $jumlah, $ket){
        $query = $this->db->prepare("SELECT * FROM data_baju where idb=?");
        $query->bindParam(1, $idb);
        $query->execute();
        $prestock = $query->fetch();
        $stock = $prestock['stock'];//stock yang ada pada data_baju

        $klrquery = $this->db->prepare("SELECT * FROM baju_klr where id=?");
        $klrquery->bindParam(1, $id);
        $klrquery->execute();
        $prejmlklr = $klrquery->fetch();
        $jmlklr = $prejmlklr['jumlah'];//jumlah yang ada pada baju_klr
        if ($jumlah >= $jmlklr) {
            $hitungselisih = $jumlah - $jmlklr;
            $kurangistock = $stock - $hitungselisih;

            $updquery_databaju = $this->db->prepare('UPDATE data_baju set stock=? where idb=?');
            $updquery_databaju->bindParam(1, $kurangistock);
            $updquery_databaju->bindParam(2, $idb);
            $updquery_databaju_execute = $updquery_databaju->execute();

            $updquery_bajukeluar = $this->db->prepare('UPDATE baju_klr set tgl=?, jumlah=?, ket=? where id=?');
            $updquery_bajukeluar->bindParam(1, $tgl);
            $updquery_bajukeluar->bindParam(2, $jumlah);
            $updquery_bajukeluar->bindParam(3, $ket);
            $updquery_bajukeluar->bindParam(4, $id);
            $updquery_bajukeluar_execute = $updquery_bajukeluar->execute();

            if($updquery_databaju_execute && $updquery_bajukeluar_execute){
                $_SESSION['message'] = "Data berhasil diubah!";
                header('Location: ../pages/baju_keluar_read.php');
                exit(0);
            }
            else{
                $_SESSION['message'] = "Data gagal diubah!";
                header('Location: ../pages/baju_keluar_read.php');
            }
    
            return $query->rowCount();


        }else{
            $hitungselisih = $jmlklr - $jumlah;
            $tambahstock = $stock + $hitungselisih;

            $updquery_databaju = $this->db->prepare('UPDATE data_baju set stock=? where idb=?');
            $updquery_databaju->bindParam(1, $tambahstock);
            $updquery_databaju->bindParam(2, $idb);
            $updquery_databaju_execute = $updquery_databaju->execute();

            $updquery_bajukeluar = $this->db->prepare('UPDATE baju_klr set tgl=?, jumlah=?, ket=? where id=?');
            $updquery_bajukeluar->bindParam(1, $tgl);
            $updquery_bajukeluar->bindParam(2, $jumlah);
            $updquery_bajukeluar->bindParam(3, $ket);
            $updquery_bajukeluar->bindParam(4, $id);
            $updquery_bajukeluar_execute = $updquery_bajukeluar->execute();

            if($updquery_databaju_execute && $updquery_bajukeluar_execute){
                $_SESSION['message'] = "Data berhasil diubah!";
                header('Location: ../pages/baju_keluar_read.php');
                exit(0);
            }
            else{
                $_SESSION['message'] = "Data gagal diubah!";
                header('Location: ../pages/baju_keluar_read.php');
            }
    
            return $query->rowCount();
        }



    }

    public function get_by_id_baju_klr($id){
        $query = $this->db->prepare("SELECT * FROM baju_klr where id=?");
        $query->bindParam(1, $id);
        $query->execute();
        return $query->fetch();
    }

    public function baju_klr_delete($id, $idb){
        $query = $this->db->prepare("SELECT * FROM data_baju where idb=?");
        $query->bindParam(1, $idb);
        $query->execute();
        $prestock = $query->fetch();
        $stock = $prestock['stock']; //stock yang ada pada data_baju

        $klrquery = $this->db->prepare("SELECT * FROM baju_klr where id=?");
        $klrquery->bindParam(1, $id);
        $klrquery->execute();
        $prejmlklr = $klrquery->fetch();
        $jmlklr = $prejmlklr['jumlah']; //jumlah yang ada pada baju_msk

        $ubahstock = $stock + $jmlklr;

        $updquery_databaju = $this->db->prepare('UPDATE data_baju set stock=? where idb=?');
        $updquery_databaju->bindParam(1, $ubahstock);
        $updquery_databaju->bindParam(2, $idb);
        $updquery_databaju_execute = $updquery_databaju->execute();

        $updquery_bajukeluar = $this->db->prepare('DELETE from baju_klr where id=?');
        $updquery_bajukeluar->bindParam(1, $id);
        $updquery_bajukeluar_execute = $updquery_bajukeluar->execute();

        if($updquery_databaju_execute && $updquery_bajukeluar_execute){
            $_SESSION['message'] = "Data berhasil dihapus!";
            header('Location: ../pages/baju_keluar_read.php');
            exit(0);
        }
        else{
            $_SESSION['message'] = "Data gagal dihapus!";
            header('Location: ../pages/baju_keluar_read.php');
        }

        return $query->rowCount();

    }

    
}

?>