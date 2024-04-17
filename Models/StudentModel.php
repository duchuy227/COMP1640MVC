<?php
require_once 'Config/db.php';

class StudentModel
{
    private $conn;

    public function __construct()
    {
        global $conn;
        $this->conn = $conn;
    }
    public function addContribution($conname, $subDate, $status, $stuID, $doc, $image, $topicID, $description) {
        $query = "INSERT INTO Contribution (Con_Name, Con_SubmissionTime, Con_Status, Con_Doc, Con_Image, Stu_ID, Topic_ID,Con_Description) 
                VALUES (:name, :submissionTime, :status, :doc, :image, :stu_ID, :topic_ID,:con_description)";
        $sql = $this->conn->prepare($query);
        $sql->execute(array(':name' => $conname, ':submissionTime' => $subDate, ':status' => $status, ':doc' => $doc, 
        ':image' => $image, ':stu_ID' => $stuID, ':topic_ID' => $topicID,':con_description'=> $description));
    }

    public function getStudentbyUserName($username)
    {
        $query = "SELECT * from student join faculty on student.Fa_ID = faculty.Fa_ID where Stu_Username = :username;";
        $sql = $this->conn->prepare($query);
        $sql->execute(array(':username'=> $username));
        return $sql->fetch(PDO::FETCH_ASSOC);
    }

    public function getStudent($username)
    {
        $query = "SELECT * from student  where Stu_Username = :username;";
        $sql = $this->conn->prepare($query);
        $sql->execute(array(':username'=> $username));
        return $sql->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllTopic()
    {
        $query = "SELECT * from topic";
        $sql = $this->conn->prepare($query);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getStudentsByFacultyExcludingCurrentUser($username) {
        $query = "SELECT s.*, f.Fa_Name
                  FROM student s
                  INNER JOIN faculty f ON s.Fa_ID = f.Fa_ID
                  WHERE s.Fa_ID = (SELECT Fa_ID FROM student WHERE Stu_Username = :username)
                  AND s.Stu_Username != :username";
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute(array(':username' => $username));
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } 
    
    public function getContribution($username)
    {
        $student = $this->getStudentbyUserName($username);
        $id = $student['Stu_ID'];
        $query = "SELECT * FROM contribution JOIN student ON contribution.Stu_ID = student.Stu_ID WHERE contribution.Stu_ID = :id";
        $sql = $this->conn->prepare($query);
        $sql->execute(array(':id'=> $id));
       return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getContributionDetail($id)
    {
        $query = "SELECT con.*, 
                CASE WHEN con.Con_Status = 'Approval' THEN co.Com_Detail ELSE NULL END AS Com_Detail
                FROM contribution con LEFT JOIN comments co ON con.Con_ID = co.Con_ID
                WHERE con.Con_ID = :id
                AND (con.Con_Status = 'Approval' OR co.Com_Detail IS NULL)";
        $sql = $this->conn->prepare($query);
        $sql->execute(array(':id'=> $id));
        return $sql->fetch(PDO::FETCH_ASSOC);
    }

    public function getContributionByID($id)
    {
        $query = "SELECT * FROM contribution s WHERE Con_ID= :id";
        $sql = $this->conn->prepare($query);
        $sql->execute(array(':id'=> $id));
        return $sql->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllContribution($username)
    {
        $student = $this->getStudent($username);
        $id = $student['Stu_ID'];
        $query = "SELECT contribution.*, comments.Com_Detail FROM contribution LEFT JOIN comments ON contribution.Con_ID = comments.Con_ID WHERE contribution.Stu_ID = :id";
        $sql = $this->conn->prepare($query);
        $sql->execute(array(':id'=> $id));
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getContributionCmt($username)
    {
        $contribution = $this->getContribution($username);
        $id = $contribution['Con_ID'];
        $query = "SELECT * FROM contribution JOIN comments ON contribution.Con_ID = comments.Con_ID WHERE contribution.Con_ID = :id";
        $sql = $this->conn->prepare($query);
        $sql->execute(array(':id'=> $id));
       return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTopic($id)
    {

        $query = "SELECT * FROM topic WHERE Fa_ID = :id";
        $sql = $this->conn->prepare($query);
        $sql->execute(array(':id'=> $id));
        return $sql->fetchAll(PDO::FETCH_ASSOC);
        

    }
    public function numberOfContribution($username)
    {
        $student = $this->getStudentbyUserName($username);
        $id = $student['Stu_ID'];
        $query = "SELECT * FROM contribution where Stu_ID=:id";
        $sql = $this->conn->prepare($query);
        $sql->execute(array(':id'=> $id));
        $sql->fetch(PDO::FETCH_ASSOC);
        return $sql->rowCount();
        

    }
    public function updateStudentProfile($id, $username, $password, $email, $fullname, $dob, $roleId, $fa_id, $imageData) {
        $query = "UPDATE Student SET Stu_Username = :username, Stu_Password = :password, Stu_Email = :email, Stu_FullName = :fullname, Stu_DOB = :dob, Role_ID = :role_id, Fa_ID = :fa_id ,Image= :imageData WHERE Stu_ID = :id";
        $sql = $this->conn->prepare($query);
        $sql->execute(array(':username' => $username, ':password' => $password, ':email' => $email, ':fullname' => $fullname, ':dob' => $dob, ':role_id' => $roleId, ':fa_id' => $fa_id, ':id' => $id,':imageData' => $imageData));
    }

    public function getCoordinatorAndStudentsByFaculty($fa_id) {
        // Lấy thông tin của Coordinator
        $queryCoordinator = "SELECT * FROM Coordinator WHERE Fa_ID = :fa_id";
        $stmtCoordinator = $this->conn->prepare($queryCoordinator);
        $stmtCoordinator->execute(array(':fa_id' => $fa_id));
        $coordinator = $stmtCoordinator->fetch(PDO::FETCH_ASSOC);
    
        // Lấy danh sách sinh viên trong cùng một khoa
        $queryStudents = "SELECT * FROM Student WHERE Fa_ID = :fa_id";
        $stmtStudents = $this->conn->prepare($queryStudents);
        $stmtStudents->execute(array(':fa_id' => $fa_id));
        $students = $stmtStudents->fetchAll(PDO::FETCH_ASSOC);
    
        return array('coordinator' => $coordinator, 'students' => $students);
    }

    public function sendMail($Stu_ID,$Coor_ID,$content) {
        $query = "INSERT INTO mail (Stu_ID, Coor_ID, Content) 
        VALUES (:Stu_ID, :Coor_ID, :content)";
        $sql = $this->conn->prepare($query);
        $sql->execute(array(':Stu_ID' => $Stu_ID, ':Coor_ID' => $Coor_ID, ':content' => $content));
    }

    public function getCoorIdByFaculty($Fa_ID) {
        $query = "SELECT Coor_ID FROM coordinator WHERE Fa_ID = :fa_id";
        $sql = $this->conn->prepare($query);
        $sql->execute(array(':fa_id' => $Fa_ID));
        return $sql->fetch(PDO::FETCH_ASSOC);
    }

    public function updateContribution($con_id,$con_name,$con_des,$imageData, $uploadPath) {
    
        $query = "UPDATE contribution SET Con_Name = :con_name, Con_Description = :con_des, Con_Image = :image, Con_Doc = :con_doc WHERE Con_ID = :id";
        $sql = $this->conn->prepare($query);
        $sql->execute(array(':con_name' => $con_name, ':con_des' => $con_des, ':image' => $imageData, ':con_doc' => $uploadPath, ':id' => $con_id));
    }

    public function deleteContribution($con_id){
        $query ="Delete from contribution where Con_ID =:id";
        $sql = $this->conn->prepare($query);
        $sql->execute(array(':id' => $con_id)) ;
    }


}