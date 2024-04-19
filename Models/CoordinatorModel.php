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

        public function getTopic($id)
        {

            $query = "SELECT * FROM topic WHERE Fa_ID = :id";
            $sql = $this->conn->prepare($query);
            $sql->execute(array(':id'=> $id));
            return $sql->rowCount();
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

        public function getAllStudentByCoordinatorRow($fa_id) {
            $query = "SELECT * FROM student WHERE Fa_ID = :fa_id"; // Thêm :fa_id vào câu truy vấn
            $sql = $this->conn->prepare($query);
            $sql->execute(array(':fa_id' => $fa_id));
            return $sql->rowCount();
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

        public function getAllContributionByFacultyRow($faculty_id) {
            $query = "SELECT Contribution.*, Student.Stu_FullName
                      FROM Contribution
                      JOIN Student ON Contribution.Stu_ID = Student.Stu_ID
                      WHERE Student.Fa_ID = :fa_id";
            
            $sql = $this->conn->prepare($query);
            $sql->bindValue(':fa_id', $faculty_id, PDO::PARAM_INT);
            $sql->execute();
        
            return $sql->rowCount();
        }

        public function getContributionByID($id)
        {
            $query = "SELECT * FROM contribution s WHERE Con_ID= :id";
            $sql = $this->conn->prepare($query);
            $sql->execute(array(':id'=> $id));
            return $sql->fetch(PDO::FETCH_ASSOC);
        }

        public function getContributionDetail($con_id) {
            $query = "SELECT Contribution.*, Topic.Topic_Name, 
                    CASE WHEN Contribution.Con_Status = 'Approval' THEN Comments.Com_Detail
                    ELSE ''
                    END AS Com_Detail
                    FROM Contribution
                    LEFT JOIN Topic ON Contribution.Topic_ID = Topic.Topic_ID
                    LEFT JOIN Comments ON Contribution.Con_ID = Comments.Con_ID
                    WHERE Contribution.Con_ID = :con_id";
            $sql = $this->conn->prepare($query);
            $sql->execute(array(':con_id' => $con_id));
            return $sql->fetch(PDO::FETCH_ASSOC);
        }


        public function updateContributionStatus($con_id, $status) {
            $query = "UPDATE Contribution SET Con_Status = :status WHERE Con_ID = :con_id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':status', $status);
            $stmt->bindParam(':con_id', $con_id);
            return $stmt->execute();
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
            $sql->fetch(PDO::FETCH_ASSOC);
            $contri = $this->getContributionByID($Con_ID);
            $this->addToMagazine("Posted", $contri['Con_SubmissionTime'],$Con_ID);
        }

        public function addToMagazine($status,$time,$Con_ID){
            $query = "INSERT INTO magazine (Maga_Status,Maga_CreateTime,Con_ID) 
            VALUES (:status,:time,:con_id)";
            $sql = $this->conn->prepare($query);
            $sql->execute(array(':status'=>$status,':time'=>$time,':con_id' => $Con_ID)) ;
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

        public function deleteContribution($id) {
            $query = "DELETE FROM contribution WHERE Con_ID = :id";
            $sql = $this->conn->prepare($query);
            $sql->execute(array(':id' => $id));
        }


        public function sendMail($stuID, $coorID, $content) {
            $query = "INSERT INTO mail (Stu_ID, Coor_ID, Content) 
                      VALUES (:Stu_ID, :Coor_ID, :content)";
            $sql = $this->conn->prepare($query);
            $sql->execute(array(':Stu_ID' => $stuID, ':Coor_ID' => $coorID, ':content' => $content));
        }

        public function getStudentById($studentID) {
            $query = "SELECT * FROM Student WHERE Stu_ID = :studentID";
            $sql = $this->conn->prepare($query);
            $sql->execute(array(':studentID' => $studentID));
            return $sql->fetch(PDO::FETCH_ASSOC);
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