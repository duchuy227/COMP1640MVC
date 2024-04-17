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

        public function updateManagerAccount($id, $username, $password, $email, $dob, $roleId,$imageData)
        {
            $query = "UPDATE Manager SET Ma_Username = :username, Ma_Password = :password, Ma_Email = :email, Ma_DOB = :dob, Role_ID = :role_id ,Image = :imageData WHERE Ma_ID = :id";
            $sql = $this->conn->prepare($query);
            $sql->execute(array(':username' => $username, ':password' => $password, ':email' => $email, ':dob' => $dob, ':role_id' => $roleId, ':id' => $id,':imageData'=>$imageData));
        }

        public function percentContribution()
        {
            $query = "SELECT (COUNT(c.Con_ID) / (SELECT COUNT(*) FROM student)) 
            * 100 as percentage FROM contribution c";
            $sql = $this->conn->prepare($query);
            $sql->execute();
            return $sql->fetch(PDO::FETCH_ASSOC);
        }

        public function getAllContribution()
        {
            $query = "SELECT * FROM contribution";
            $sql = $this->conn->prepare($query);
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getAllContributionToRow()
        {
            $query = "SELECT * FROM contribution";
            $sql = $this->conn->prepare($query);
            $sql->execute();
            return $sql->rowCount();
        }

        public function getAllStudentToRow()
        {
            $query = "SELECT * FROM student";
            $sql = $this->conn->prepare($query);
            $sql->execute();
            return $sql->rowCount();
        }

        public function getAllTopicToRow()
        {
            $query = "SELECT * FROM topic";
            $sql = $this->conn->prepare($query);
            $sql->execute();
            return $sql->rowCount();
        }

        public function getAllTopic()
        {
            $query = "SELECT * FROM Topic Join Faculty ON Topic.Fa_ID = Faculty.Fa_ID;";
            $sql = $this->conn->prepare($query);
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getTopicById($id)
        {
            $query = "SELECT * FROM Topic Join Faculty ON Topic.Fa_ID = Faculty.Fa_ID where Topic_ID = :id";
            $sql = $this->conn->prepare($query);
            $sql->execute(array(':id'=> $id));
            return $sql->fetch(PDO::FETCH_ASSOC);
        }

        public function getStudentByFaculty($id)
        {
            $query = "SELECT * FROM student where Fa_ID =:id";
            $sql = $this->conn->prepare($query);
            $sql->execute(array(':id'=> $id));
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getAllFaculties() {
            $query = "SELECT * FROM faculty";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getFacultyNameById($fa_id) {
            $query = "SELECT Fa_Name FROM faculty WHERE Fa_ID = :fa_id";
            $stmt = $this->conn->prepare($query);
            $stmt->execute(array(':fa_id' => $fa_id));
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['Fa_Name'];
        }

        public function getCoordinatorById($id)
        {
            $query = "SELECT * from coordinator join faculty on coordinator.Fa_ID = faculty.Fa_ID where coordinator.Fa_ID =:id";
            $sql = $this->conn->prepare($query);
            $sql->execute(array(':id'=> $id));
            return $sql->fetch(PDO::FETCH_ASSOC);
        }

        public function getContributionSelected()
        {
            $query = "SELECT * FROM contribution where Con_Status = 'Approval'";
            $sql = $this->conn->prepare($query);
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }


        public function getContributionByID($id)
        {
            $query = "SELECT * FROM contribution s WHERE Con_ID= :id";
            $sql = $this->conn->prepare($query);
            $sql->execute(array(':id'=> $id));
            return $sql->fetch(PDO::FETCH_ASSOC);
        }


        public function getContributionCountsByFaculty() {
            $query = "SELECT f.Fa_Name, COUNT(c.Con_ID) AS contribution_count
                      FROM Contribution c
                      INNER JOIN Student s ON c.Stu_ID = s.Stu_ID
                      INNER JOIN Faculty f ON s.Fa_ID = f.Fa_ID
                      GROUP BY f.Fa_Name";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    
        public function getContributionByTopic(){
            $query = "SELECT t.Topic_Name, COUNT(c.Con_ID) AS contribution_count
                      FROM Topic t
                      LEFT JOIN Contribution c ON t.Topic_ID = c.Topic_ID
                      GROUP BY t.Topic_Name";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    
        public function getStudentCountByFaculty(){
            $query = "SELECT f.Fa_Name, COUNT(s.Stu_ID) AS student_count
            FROM Student s
            INNER JOIN Faculty f ON s.Fa_ID = f.Fa_ID
            GROUP BY f.Fa_Name";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        


    }
?>