<?php
namespace inc;
    class mhsw{
        private $db;
        public function __construct(){
        try {
        $this->db = new PDO("mysql:host=localhost;dbname=uts", "root", ""); 
        } catch (PDOException $e) { die ("Error " . $e->getMessage());
            }
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
?>