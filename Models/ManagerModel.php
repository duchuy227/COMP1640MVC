<?php 
    require_once 'Config/db.php';   

    class ManagerModel {
        private $conn;

        public function __construct()
        {
            global $conn;
            $this->conn = $conn;
        }

        public function getAllRoles()
        {
            $query = "SELECT * FROM Role";
            $sql = $this->conn->query($query);
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getManagerbyUserName($username)
        {
            $query = "SELECT * from manager where Ma_Username = :username;";
            $sql = $this->conn->prepare($query);
            $sql->execute(array(':username'=> $username));
            return $sql->fetch(PDO::FETCH_ASSOC);
        }
    }
?>