<?php 
    require_once 'Config/db.php';   

    class CoordinatorModel {
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

        public function getCoordinatorbyUserName($username)
        {
            $query = "SELECT coordinator.*, faculty.Fa_Name FROM coordinator
            INNER JOIN faculty ON coordinator.Fa_ID = faculty.Fa_ID
            WHERE coordinator.Coor_Username = :username;";
            $sql = $this->conn->prepare($query);
            $sql->execute(array(':username'=> $username));
            return $sql->fetch(PDO::FETCH_ASSOC);
        }

        public function getAllStudentByCoordinator($fa_id) {
            $query = "SELECT * FROM student WHERE Fa_ID = :fa_id"; // Thêm :fa_id vào câu truy vấn
            $sql = $this->conn->prepare($query);
            $sql->execute(array(':fa_id' => $fa_id));
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function updateCoordinatorProfile($id, $username, $password, $email, $fullname, $dob, $roleId, $fa_id, $imageData) {
            $query = "UPDATE coordinator SET Coor_Username = :username, Coor_Password = :password, Coor_Email = :email, Coor_Fullname = :fullname, Coor_DOB = :dob, Role_id = :roleId, Fa_ID = :fa_id, Image = :imageData WHERE Coor_ID = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->execute(array(
                ':username' => $username,
                ':id' => $id,
                ':password' => $password,
                ':email' => $email,
                ':fullname' => $fullname,
                ':dob' => $dob,
                ':roleId' => $roleId,
                ':fa_id' => $fa_id,
                ':imageData' => $imageData
            ));
        }

        public function getStudentAccountById($id)
        {
            $query = "SELECT student.*,faculty.Fa_Name   from student INNER Join faculty   WHERE Stu_ID = :id";
            $sql = $this->conn->prepare($query);
            $sql->execute(array(':id' => $id));
            return $sql->fetch(PDO::FETCH_ASSOC);
        }

        public function getAllFaculty()
        {
            $query = "SELECT * FROM faculty";
            $sql = $this->conn->query($query);
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getAllContributionByFaculty($faculty_id) {
            $query = "SELECT Contribution.*, Student.Stu_FullName
                      FROM Contribution
                      JOIN Student ON Contribution.Stu_ID = Student.Stu_ID
                      WHERE Student.Fa_ID = :fa_id";
            
            $sql = $this->conn->prepare($query);
            $sql->bindValue(':fa_id', $faculty_id, PDO::PARAM_INT);
            $sql->execute();
        
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function updateStudentAccount($id, $username, $password, $email, $fullname, $dob, $roleId, $fa_id,$imageData)
        {
            $query = "UPDATE Student SET Stu_Username = :username, Stu_Password = :password, Stu_Email = :email, Stu_FullName = :fullname, Stu_DOB = :dob, Role_ID = :role_id, Fa_ID = :fa_id ,Image= :imageData WHERE Stu_ID = :id";

            $sql = $this->conn->prepare($query);
            $sql->execute(array(':username' => $username, ':password' => $password, ':email' => $email, ':fullname' => $fullname, ':dob' => $dob, ':role_id' => $roleId, ':fa_id' => $fa_id, ':id' => $id,':imageData' => $imageData));
        }

        public function addComment($Com_Detail,$Con_ID,$Coor_ID){
            $query = "INSERT INTO comments (Com_Detail,Con_ID,Coor_ID) 
            VALUES (:com_detail,:con_id,:coor_id)";
            $sql = $this->conn->prepare($query);
            $sql->execute(array(':com_detail' => $Com_Detail, ':con_id' => $Con_ID, ':coor_id' => $Coor_ID));  
        }
        public function changeStatus($Con_ID){
            $query = 'UPDATE contribution set Con_Status = "Approval" where Con_ID =:con_id';
            $sql = $this->conn->prepare($query);
            $sql->execute(array(':con_id' => $Con_ID)) ;
    
        }
        public function checkDate($Con_ID){
            $query = 'SELECT * FROM contribution WHERE Con_ID=:con_id and TIMESTAMPDIFF(DAY, Con_SubmissionTime, NOW()) < 14';
            $sql = $this->conn->prepare($query);
            $sql->execute(array(':con_id' => $Con_ID)) ;
            if ($sql->rowCount() > 0) {
                return true;
                
            } else {
                return false;
            }
        }
        //////////////////
        public function download(){
            $query = "SELECT * FROM contribution WHERE Con_Status = 'Approval'";
            $sql = $this->conn->prepare($query);
            $sql->execute() ;
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }

    }
?>