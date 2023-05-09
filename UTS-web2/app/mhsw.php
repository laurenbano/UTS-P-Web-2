<?php

abstract class functions{
    abstract protected function cari($nama);
    abstract protected function tampil();
    abstract protected function simpan();
    abstract protected function hapus();
}
class mhsw extends functions{
 private $db;
 public function __construct()
     {
   try {
 $this->db = new PDO("mysql:host=localhost;dbname=uts", "root", ""); } catch (PDOException $e) { die ("Error " . $e->getMessage());
        }
    }
    public function tampil()
    {
        $sql = "SELECT * FROM mahasiswa";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $data = [];
        while ($rows = $stmt->fetch()) {
            $data[] = $rows;
            }
        return $data;
    }

    public function simpan()
    {
        $sql = "insert into mahasiswa values ('','".$_GET['nim']."','".$_GET['nama']."','".$_GET['alamat']."')";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        echo "DATA BERHASIL DISIMPAN !";
    } 

    public function hapus()
    {
        $sqls = "delete from mahasiswa where id='".$_GET['id']."'";
        $stmts = $this->db->prepare($sqls);
        $stmts->execute();
        echo "DATA BERHASIL DIHAPUS !";
    }      
    public function tampil_update()
    {
        $sql = "SELECT * FROM mahasiswa where id='".$_GET['id']."'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $data = [];
        while ($rows = $stmt->fetch()) {
            $data[] = $rows;
            }
        return $data;
    }
    public function update($id, $nim,$nama,$alamat)
    {
        $sql = "update mahasiswa set nim='".$nim."', nama='".$nama."', alamat='".$alamat."' where id='".$id."'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        echo "DATA BERHASIL DIUPDATE !";
    } 
    public function cari($nama){
        $sql = "SELECT * FROM mahasiswa WHERE nama LIKE '%".$nama."%'
        ";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $data = [];
        while ($rows = $stmt->fetch()) {
            $data[] = $rows;
            }
        return $data;
    }  

 }
 
class matkul extends functions{
    private $db;
    public function __construct(){
        try {
            $this->db = new PDO("mysql:host=localhost;dbname=uts", "root", ""); 
        } catch (PDOException $e) { die ("Error " . $e->getMessage());
        }
    }
    public function tampil()
    {
        $sql = "SELECT * FROM matkul where id_mhs='".$_GET['idm']."'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $data = [];
        while ($rows = $stmt->fetch()) {
            $data[] = $rows;
            }
        return $data;
    }
    public function tampildosen()
    {
        $sql = "SELECT * FROM matkul where id_dosen='".$_GET['id']."'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $data = [];
        while ($rows = $stmt->fetch()) {
            $data[] = $rows;
            }
        return $data;
    }

    public function simpan()
    {
        $sql = "insert into matkul values ('','".$_GET['matkul']."','".$_GET['sks']."','".$_GET['id']."',null)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        echo "DATA BERHASIL DISIMPAN !";
    }
    public function simpandosen()
    {
        $sql = "insert into matkul values ('','".$_GET['matkul']."','".$_GET['sks']."',null,'".$_GET['id']."')";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        echo "DATA BERHASIL DISIMPAN !";
    }


    public function hapus()
    {
        $sqls = "delete from matkul where id='".$_GET['id']."'";
        $stmts = $this->db->prepare($sqls);
        $stmts->execute();
        echo "DATA BERHASIL DIHAPUS !";
    }      
    public function tampil_update()
    {
        $sql = "SELECT * FROM matkul where id='".$_GET['id']."'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $data = [];
        while ($rows = $stmt->fetch()) {
            $data[] = $rows;
            }
        return $data;
    }
    public function update($id,$matkul,$sks)
    {
        $sql = "update matkul set matkul='".$matkul."', sks='".$sks."' where id='".$id."'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        echo "DATA BERHASIL DIUPDATE !";
    } 
    public function cari($matkul){
        $sql = "SELECT * FROM matkul WHERE matkul LIKE '%".$matkul."%'
        ";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $data = [];
        while ($rows = $stmt->fetch()) {
            $data[] = $rows;
            }
        return $data;
    }  
    
}

 class dosen extends functions {
    private $db;
    public function __construct()
        {
      try {
    $this->db = new PDO("mysql:host=localhost;dbname=uts", "root", ""); } catch (PDOException $e) { die ("Error " . $e->getMessage());
           }
       }
       public function tampil()
       {
           $sql = "SELECT * FROM dosen";
           $stmt = $this->db->prepare($sql);
           $stmt->execute();
           $data = [];
           while ($rows = $stmt->fetch()) {
               $data[] = $rows;
               }
           return $data;
       }
   
       public function simpan()
       {
           $sql = "insert into dosen values ('','".$_GET['nip']."','".$_GET['nama']."')";
           $stmt = $this->db->prepare($sql);
           $stmt->execute();
           echo "DATA BERHASIL DISIMPAN !";
       } 
   
       public function hapus()
       {
           $sqls = "delete from dosen where id='".$_GET['id']."'";
           $stmts = $this->db->prepare($sqls);
           $stmts->execute();
           echo "DATA BERHASIL DIHAPUS !";
       }      
       public function tampil_update()
       {
           $sql = "SELECT * FROM dosen where id='".$_GET['id']."'";
           $stmt = $this->db->prepare($sql);
           $stmt->execute();
           $data = [];
           while ($rows = $stmt->fetch()) {
               $data[] = $rows;
               }
           return $data;
       }
       public function update($id, $nim,$nama)
       {
           $sql = "update dosen set nip='".$nim."', nama='".$nama."' where id='".$id."'";
           $stmt = $this->db->prepare($sql);
           $stmt->execute();
           echo "DATA BERHASIL DIUPDATE !";
       } 
       public function cari($nama){
           $sql = "SELECT * FROM dosen WHERE nama LIKE '%".$nama."%'
           ";
           $stmt = $this->db->prepare($sql);
           $stmt->execute();
           $data = [];
           while ($rows = $stmt->fetch()) {
               $data[] = $rows;
               }
           return $data;
       }  
   
    }