<?php
require_once 'Config/db.php';

class AdminModel
{
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



    public function getAllAdminAccount(){
        $query = "SELECT * FROM admin";
        $sql = $this->conn->query($query);
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAdminAccountById($id)
    {
        $query = "SELECT * FROM admin WHERE Ad_ID = :id";
        $sql = $this->conn->prepare($query);
        $sql->execute(array(':id' => $id));
        return $sql->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllAccount(){
        $query = "SELECT SUM(Total_Count) AS Total_Accounts
            FROM (
            SELECT COUNT(*) AS Total_Count FROM Student
            UNION ALL
            SELECT COUNT(*) AS Total_Count FROM Coordinator
            UNION ALL
            SELECT COUNT(*) AS Total_Count FROM Admin
            UNION ALL
            SELECT COUNT(*) AS Total_Count FROM Manager
        ) AS TotalCounts";
         $sql = $this->conn->query($query);
         return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTotalContributions(){
        $query = "SELECT * FROM Contribution";
        $sql = $this->conn->prepare($query);
        $sql->execute();
        return $sql->rowCount();
    }

    public function getTotalComment(){
        $query = "SELECT COUNT(*) AS Total_Comments FROM comments;";
        $sql = $this->conn->query($query);
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getAllManagerAccount()
    {
        $query = "SELECT * FROM Manager";
        $sql = $this->conn->query($query);
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getManagerAccountById($id)
    {
        $query = "SELECT * FROM Manager WHERE Ma_ID = :id";
        $sql = $this->conn->prepare($query);
        $sql->execute(array(':id' => $id));
        return $sql->fetch(PDO::FETCH_ASSOC);
    }

    public function addManagerAccount($username, $password, $email, $dob, $roleId,$imageData)
    {
        $query = "INSERT INTO Manager (Ma_Username, Ma_Password, Ma_Email, Ma_DOB, Role_ID,Image) VALUES (:username, :password, :email, :dob, :role_id,:imageData)";
        $sql = $this->conn->prepare($query);
        $sql->execute(array(':username' => $username, ':password' => $password, ':email' => $email, ':dob' => $dob, ':role_id' => $roleId,':imageData'=>$imageData));
    }

    // Validate//

    public function validateAdmin($username) {
        $errors = [];
    
        // Validate username
        if (!preg_match('/^\w{4,10}$/', $username)) {
            $errors['username'] = 'Username không hợp lệ';
        }
    
        return $errors;
    } 

    public function validateManager($id,$username, $email, $dob, $roleId, $imageData, $insert) {
        $errors = [];
    
        // Validate username
        if (!preg_match('/^\w{4,10}$/', $username)) {
            $errors['username'] = 'Username không hợp lệ';
        } elseif ($insert == true && $this->checkManagerExists($username)) {
            $errors['username'] = 'Username đã tồn tại';
        } elseif ($insert == false && $this->checkManagerExists($username, $id)) {
            $errors['username'] = 'Username đã tồn tại';
        }




        if($insert == true && $this->checkEmailManagerExists($email)){
            $errors['email'] = 'Email đã tồn tại';
        } elseif ($insert == false && $this->checkEmailManagerExists($email, $id)) {
            $errors['email'] = 'Email đã tồn tại';
        }

        // Validate imageData
        if (!isset($imageData)) {
            $errors['imageData'] = 'Avatar không được để trống';
        } 
    
        return $errors;
    }    
    

    public function validateStudent($id, $username, $email, $dob, $roleId, $fullname, $imageData, $insert) {
        $errors = [];
        if (!preg_match('/^\w{4,10}$/', $username)) {
            $errors['username'] = 'Invalid username';
        } elseif ($insert == true && $this->checkStudentExists($username)) {
            $errors['username'] = 'Username exsited';
        } elseif ($insert == false && $this->checkStudentExists($username, $id)) {
            $errors['username'] = 'Username exsited';
        }
        
    

        if($insert == true && $this->checkEmailStudentExists($email)){
            $errors['email'] = 'Email exsited';
        } elseif ($insert == false && $this->checkEmailStudentExists($email, $id)) {
            $errors['email'] = 'Email exsited';
        }

        if (!preg_match('/^[A-Z]/', $fullname)){
            $errors['fullname'] = 'Full name must start with a capital letter';
        } elseif (!preg_match('/^[A-Za-z\s\x{00C0}-\x{1FFF}\x{2C00}-\x{D7FF}]+$/u', $fullname)) {
            $errors['fullname'] = 'Fullname must include space and character';
        } elseif (preg_match('/[0-9!@#$%^&*(),.?":{}|<>]/', $fullname)) {
            $errors['fullname'] = 'Fullname cannot contain numbers or special characters';
        } elseif (strlen($fullname) < 6){
            $errors['fullname'] = 'Fullname must have at least 6 characters';
        }

        if (!isset($imageData)) {
            $errors['imageData'] = 'Avatar cannot be empty';
        } 
        return $errors;
    } 


    public function checkManagerExists($username, $id = null) {
        $query = "SELECT * FROM Manager WHERE Ma_Username = ?";
        $params = [$username]; // Tạo mảng chứa tham số cho truy vấn
        
        if ($id !== null) {
            $query .= " AND Ma_ID != ?";
            $params[] = $id; // Thêm $id vào mảng tham số
        }
        
        $statement = $this->conn->prepare($query);
        $statement->execute($params); // Sử dụng mảng tham số trong execute()
    
        return $statement->rowCount() > 0;
    }

    public function checkStudentExists($username, $id = null) {
        $query = "SELECT * FROM Student WHERE Stu_Username = ?";
        $params = [$username];
        
        if ($id !== null) {
            $query .= " AND Stu_ID != ?";
            $params[] = $id; 
        }
        
        $statement = $this->conn->prepare($query);
        $statement->execute($params);
    
        return $statement->rowCount() > 0;
    }

    public function checkCoorExists($username, $id = null) {
        $query = "SELECT * FROM Coordinator WHERE Coor_Username = ?";
        $params = [$username]; // Tạo mảng chứa tham số cho truy vấn
        
        if ($id !== null) {
            $query .= " AND Coor_ID != ?";
            $params[] = $id; // Thêm $id vào mảng tham số
        }
        
        $statement = $this->conn->prepare($query);
        $statement->execute($params); // Sử dụng mảng tham số trong execute()
    
        return $statement->rowCount() > 0;
    }

    public function checkEmailManagerExists($email,$id=null) {
        $query = "SELECT * FROM Manager WHERE Ma_Email = ?";
        $params = [$email]; // Tạo mảng chứa tham số cho truy vấn
        
        if ($id !== null) {
            $query .= " AND Ma_ID != ?";
            $params[] = $id; // Thêm $id vào mảng tham số
        }
        
        $statement = $this->conn->prepare($query);
        $statement->execute($params); // Sử dụng mảng tham số trong execute()
    
        return $statement->rowCount() > 0;
    }

    public function checkEmailStudentExists($email, $id=null) {
        $query = "SELECT * FROM Student WHERE Stu_Email = ?";
        $params = [$email];
        
        if ($id !== null) {
            $query .= " AND Stu_ID != ?";
            $params[] = $id; 
        }
        
        $statement = $this->conn->prepare($query);
        $statement->execute($params);
    
        return $statement->rowCount() > 0;
    }

    public function checkEmailCoorExists($email,$id=null) {
        $query = "SELECT * FROM Coordinator WHERE Coor_Email = ?";
        $params = [$email]; // Tạo mảng chứa tham số cho truy vấn
        
        if ($id !== null) {
            $query .= " AND Coor_ID != ?";
            $params[] = $id; // Thêm $id vào mảng tham số
        }
        
        $statement = $this->conn->prepare($query);
        $statement->execute($params); // Sử dụng mảng tham số trong execute()
    
        return $statement->rowCount() > 0;
    }

    
    public function validateCoordinator($id, $username, $email, $dob, $roleId, $fullname, $imageData, $insert) {
        $errors = [];
    
        // Validate username
        if (!preg_match('/^\w{4,10}$/', $username)) {
            $errors['username'] = 'Username không hợp lệ';
        } elseif ($insert == true && $this->checkCoorExists($username)) {
            $errors['username'] = 'Username đã tồn tại';
        } elseif ($insert == false && $this->checkCoorExists($username, $id)) {
            $errors['username'] = 'Username đã tồn tại';
        }

        if($insert == true && $this->checkEmailCoorExists($email)){
            $errors['email'] = 'Email đã tồn tại';
        } elseif ($insert == false && $this->checkEmailCoorExists($email, $id)) {
            $errors['email'] = 'Email đã tồn tại';
        }

        if (!preg_match('/^[A-Z]/', $fullname)){
            $errors['fullname'] = 'Fullname phải bắt đầu bằng chữ cái in hoa';
        } elseif (!preg_match('/^[A-Za-z\s]+$/', $fullname)) {
            $errors['fullname'] = 'Fullname chỉ được chứa chữ cái và khoảng trắng';
        } elseif (preg_match('/[0-9!@#$%^&*(),.?":{}|<>]/', $fullname)) {
            $errors['fullname'] = 'Fullname không được chứa số hoặc ký tự đặc biệt';
        }


        // Validate imageData
        if (!isset($imageData)) {
            $errors['imageData'] = 'Avatar không được để trống';
        } 
    
        return $errors;
    }
    
    

    // End Validate // 

    public function updateManagerAccount($id, $username, $password, $email, $dob, $roleId,$imageData)
    {
        $query = "UPDATE Manager SET Ma_Username = :username, Ma_Password = :password, Ma_Email = :email, Ma_DOB = :dob, Role_ID = :role_id ,Image = :imageData WHERE Ma_ID = :id";
        $sql = $this->conn->prepare($query);
        $sql->execute(array(':username' => $username, ':password' => $password, ':email' => $email, ':dob' => $dob, ':role_id' => $roleId, ':id' => $id,':imageData'=>$imageData));
    }

    public function updateAdminAccount($id, $username, $password, $email, $dob, $roleId,$imageData)
    {
        $query = "UPDATE Admin SET Ad_Username = :username, Ad_Password = :password, Ad_Email = :email, Ad_DOB = :dob, Role_ID = :role_id ,Image = :imageData WHERE Ad_ID = :id";
        $sql = $this->conn->prepare($query);
        $sql->execute(array(':username' => $username, ':password' => $password, ':email' => $email, ':dob' => $dob, ':role_id' => $roleId, ':id' => $id,':imageData'=>$imageData));
    }

    public function deleteManagerAccount($id)
    {
        $query = "DELETE FROM Manager WHERE Ma_ID = :id";
        $sql = $this->conn->prepare($query);
        $sql->execute(array(':id' => $id));
    }

    
  

    public function getAllStudentAccount() {
        $query = "SELECT * FROM Student Join Faculty ON Student.Fa_ID = Faculty.Fa_ID;";

        $sql = $this->conn->query($query);
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getFacultyByID($id)
    {
        $query = "SELECT * FROM faculty WHERE Fa_ID = :id";
        $sql = $this->conn->prepare($query);
        $sql->execute(array(':id' => $id));
        return $sql->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllFaculty(){
        $query = "SELECT * FROM faculty";
        $sql = $this->conn->query($query);
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getStudentAccountById($id)
    {
        $query = "SELECT student.*, faculty.Fa_Name, student.Stu_Password AS Encrypted_Password
                  FROM student 
                  INNER JOIN faculty ON student.Fa_ID = faculty.Fa_ID
                  WHERE Stu_ID = :id";
        $sql = $this->conn->prepare($query);
        $sql->execute(array(':id' => $id));
        $result = $sql->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function addStudentAccount($username, $password, $email, $fullname, $dob, $roleId, $fa_id, $imageData)
    {
        $query = "INSERT INTO Student (Stu_Username, Stu_Password, Stu_Email, Stu_FullName, Stu_DOB, Role_ID, Fa_ID, Image) VALUES (:username, :password, :email, :fullname, :dob, :role_id, :fa_id, :imageData)";

        $sql = $this->conn->prepare($query);
        $sql->execute(array(':username' => $username, ':password' => $password, ':email' => $email, ':fullname' => $fullname, ':dob' => $dob, ':role_id' => $roleId, ':fa_id' => $fa_id, ':imageData' => $imageData));
    }

    public function updateStudentAccount($id, $username, $password, $email, $fullname, $dob, $roleId, $fa_id,$imageData)
    {
        $query = "UPDATE Student SET Stu_Username = :username, Stu_Password = :password, Stu_Email = :email, Stu_FullName = :fullname, Stu_DOB = :dob, Role_ID = :role_id, Fa_ID = :fa_id ,Image= :imageData WHERE Stu_ID = :id";

        $sql = $this->conn->prepare($query);
        $sql->execute(array(':username' => $username, ':password' => $password, ':email' => $email, ':fullname' => $fullname, ':dob' => $dob, ':role_id' => $roleId, ':fa_id' => $fa_id, ':id' => $id,':imageData' => $imageData));
    }

    public function deleteStudentAccount($id)
    {
        $query = "DELETE FROM Student WHERE Stu_ID = :id";
        $sql = $this->conn->prepare($query);
        $sql->execute(array(':id' => $id));
    }




    public function getAllCoordinatorAccount() {
        $query = "SELECT * FROM Coordinator Join Faculty ON Coordinator.Fa_ID = Faculty.Fa_ID";

        $sql = $this->conn->query($query);
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCoordinatorAccountById($id)
    {
        $query = "SELECT * FROM Coordinator WHERE Coor_ID = :id";
        $sql = $this->conn->prepare($query);
        $sql->execute(array(':id' => $id));
        return $sql->fetch(PDO::FETCH_ASSOC);
    }

    public function addCoordinatorAccount($username, $password, $email, $fullname, $dob, $roleId, $fa_id,$imageData)
    {
        $query = "INSERT INTO Coordinator (Coor_Username, Coor_Password, Coor_Email, Coor_FullName, Coor_DOB, Role_ID, Fa_ID,Image) VALUES (:username, :password, :email, :fullname, :dob, :role_id, :fa_id,:imageData)";

        $sql = $this->conn->prepare($query);
        $sql->execute(array(':username' => $username, ':password' => $password, ':email' => $email, ':fullname' => $fullname, ':dob' => $dob, ':role_id' => $roleId, ':fa_id' => $fa_id, ':imageData'=>$imageData));
    }

    public function checkFacultyHasCoordinator($faculty_id) {
        $query = "SELECT COUNT(*) FROM coordinator WHERE Fa_ID = :faculty_id";
        $sql = $this->conn->prepare($query);
        $sql->execute(array(':faculty_id' => $faculty_id));
        $result = $sql->fetchColumn();
        return $result > 0; // Trả về true nếu faculty đã có coordinator, ngược lại trả về false
    }

    public function updateCoordinatorAccount($id, $username, $password, $email, $fullname, $dob, $roleId, $fa_id,$imageData)
    {
        $query = "UPDATE Coordinator SET Coor_Username = :username, Coor_Password = :password, Coor_Email = :email, Coor_FullName = :fullname, Coor_DOB = :dob, Role_ID = :role_id, Fa_ID = :fa_id ,Image =:imageData WHERE Coor_ID = :id";

        $sql = $this->conn->prepare($query);
        $sql->execute(array(':username' => $username, ':password' => $password, ':email' => $email, ':fullname' => $fullname, ':dob' => $dob, ':role_id' => $roleId, ':fa_id' => $fa_id, ':id' => $id,':imageData'=>$imageData));
    }

    public function deleteCoordinatorAccount($id)
    {
        $query = "DELETE FROM Coordinator WHERE Coor_ID = :id";
        $sql = $this->conn->prepare($query);
        $sql->execute(array(':id' => $id));
    }

    public function checkCommentsForCoordinator($id) {
        $query = "SELECT COUNT(*) FROM comments WHERE Coor_ID = :id";
        $sql = $this->conn->prepare($query);
        $sql->execute(array(':id' => $id));
        $result = $sql->fetch(PDO::FETCH_ASSOC);
    
        // Nếu có bất kỳ bình luận nào liên kết với người phối hợp, trả về true
        return ($result['COUNT(*)'] > 0);
    }

    public function checkContriForStudent($id) {
        $query = "SELECT COUNT(*) FROM contribution WHERE Stu_ID = :id";
        $sql = $this->conn->prepare($query);
        $sql->execute(array(':id' => $id));
        $result = $sql->fetch(PDO::FETCH_ASSOC);
    
        // Nếu có bất kỳ bình luận nào liên kết với người phối hợp, trả về true
        return ($result['COUNT(*)'] > 0);
    }

    public function topicHasContribution($topic_id) {
        $sql = "SELECT COUNT(*) AS count FROM Contribution WHERE Topic_ID = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$topic_id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['count'] > 0;
    }


    public function getStudentAccountByFaculty($fa_id)
    {
        $query = 'SELECT student.* ,faculty.Fa_Name from student INNER Join Faculty ON Student.Fa_ID = Faculty.Fa_ID where student.Fa_ID= :fa_id;';
        $sql = $this->conn->prepare($query);
        $sql->execute(array(':fa_id'=> $fa_id));
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    // Search by Name //
    public function getStudentAccountByName($username)
    {
        $query = 'SELECT student.* ,faculty.Fa_Name from student INNER Join Faculty ON Student.Fa_ID = Faculty.Fa_ID where student.Stu_Username LIKE :username;';
        $sql = $this->conn->prepare($query);
        $sql->execute(array(':username' => '%' . $username . '%'));
        return $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getCoordinatorAccountByName($username)
    {
        $query = 'SELECT coordinator.* ,faculty.Fa_Name from coordinator INNER Join Faculty ON coordinator.Fa_ID = Faculty.Fa_ID where coordinator.Coor_Username Like :username;';
        $sql = $this->conn->prepare($query);
        $sql->execute(array(':username' => '%' . $username . '%'));
        return $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getManagerAccountByName($username)
    {
        $query = 'SELECT * from manager where manager.Ma_Username like :username;';
        $sql = $this->conn->prepare($query);
        $sql->execute(array(':username' => '%' . $username . '%'));
        return $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    // End Search by Name //

    public function getCoordinatorAccountByFaculty($fa_id)
    {
        $query = 'SELECT coordinator.* ,faculty.Fa_Name from coordinator INNER Join Faculty ON coordinator.Fa_ID = Faculty.Fa_ID where coordinator.Fa_ID= :fa_id;';
        $sql = $this->conn->prepare($query);
        $sql->execute(array(':fa_id'=> $fa_id));
        return $sql->fetchAll(PDO::FETCH_ASSOC);
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
    public function getCountContributionByDate(){
        $query = "SELECT DATE(Con_SubmissionTime) AS submission_date, COUNT(*) AS num_contributions
        FROM Contribution
        GROUP BY DATE(Con_SubmissionTime)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllTopic()
    {
        $query = "SELECT * FROM Topic Join Faculty ON Topic.Fa_ID = Faculty.Fa_ID;";
        $sql = $this->conn->prepare($query);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTopicByFaculty($fa_id)
    {
        $query = 'SELECT topic.* ,faculty.Fa_Name from topic INNER Join Faculty ON topic.Fa_ID = Faculty.Fa_ID where topic.Fa_ID= :fa_id;';
        $sql = $this->conn->prepare($query);
        $sql->execute(array(':fa_id'=> $fa_id));
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTopictByName($username)
    {
        $query = 'SELECT topic.* ,faculty.Fa_Name from topic INNER Join Faculty ON topic.Fa_ID = Faculty.Fa_ID where topic.Topic_Name Like :username;';
        $sql = $this->conn->prepare($query);
        $sql->execute(array(':username' => '%' . $username . '%'));
        return $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTopicById($id)
        {
            $query = "SELECT * FROM Topic Join Faculty ON Topic.Fa_ID = Faculty.Fa_ID where Topic_ID = :id";
            $sql = $this->conn->prepare($query);
            $sql->execute(array(':id'=> $id));
            return $sql->fetch(PDO::FETCH_ASSOC);
        }
    
    public function addTopic($name, $startDate, $closureDate, $finalDate, $descriptions, $imageData, $fa_id)
    {
        $query = "INSERT INTO Topic (Topic_Name, Topic_StartDate, Topic_ClosureDate, Topic_FinalDate, Topic_Description, Topic_Image, Fa_ID) VALUES (:name, :startDate, :closureDate, :finalDate, :descriptions, :imageData, :fa_id)";
        $sql = $this->conn->prepare($query);
        $sql->execute(array(':name' => $name, ':startDate' => $startDate, ':closureDate' => $closureDate, ':finalDate' => $finalDate, ':descriptions' => $descriptions, ':imageData'=>$imageData, ':fa_id' => $fa_id));
    }

    public function updateTopic($id, $name, $startDate, $closureDate, $finalDate, $descriptions,$imageData, $fa_id)
    {
        $query = "UPDATE Topic SET Topic_Name = :name, Topic_StartDate = :startDate, Topic_ClosureDate = :closureDate, Topic_FinalDate = :finalDate, Topic_Description = :descriptions, Topic_Image = :imageData, Fa_ID = :fa_id WHERE Topic_ID = :id";
        $sql = $this->conn->prepare($query);
        $sql->execute(array(':id' => $id, ':name' => $name, ':startDate' => $startDate, ':closureDate' => $closureDate, ':finalDate' => $finalDate, ':descriptions' => $descriptions, ':imageData'=>$imageData, ':fa_id' => $fa_id));
    }

    public function deleteTopic($topic_id)
    {
        $sql_delete_comments = "DELETE FROM Comment WHERE Con_ID IN (SELECT Con_ID FROM Contribution WHERE Topic_ID = ?)";
        $stmt = $this->conn->prepare($sql_delete_comments);
        $stmt->execute([$topic_id]);
    
        // Xóa contribution
        $sql_delete_contribution = "DELETE FROM Contribution WHERE Topic_ID = ?";
        $stmt = $this->conn->prepare($sql_delete_contribution);
        $stmt->execute([$topic_id]);
    }

    public function getAllMagazine(){
        $query = "SELECT Magazine.*, Contribution.Con_Name, Contribution.Con_Description, Contribution.Con_Doc, Contribution.Con_Image, Topic.Topic_Name,Student.Stu_FullName, Faculty.Fa_Name
                  FROM Magazine
                  JOIN Contribution ON Magazine.Con_ID = Contribution.Con_ID
                  JOIN Student ON Contribution.Stu_ID = Student.Stu_ID
                  JOIN Topic ON Contribution.Topic_ID = Topic.Topic_ID
                  JOIN Faculty ON Topic.Fa_ID = Faculty.Fa_ID";
        $sql = $this->conn->prepare($query);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getMagazineDetailsById($maga_id) {
        $query = "SELECT Magazine.*, 
                         Contribution.Con_Name, Contribution.Con_Description, Contribution.Con_Doc, Contribution.Con_Image, 
                         Topic.Topic_Name,
                         Student.Stu_FullName, 
                         Faculty.Fa_Name 
                  FROM Magazine 
                  JOIN Contribution ON Magazine.Con_ID = Contribution.Con_ID 
                  JOIN Topic ON Contribution.Topic_ID = Topic.Topic_ID
                  JOIN Student ON Contribution.Stu_ID = Student.Stu_ID 
                  JOIN Faculty ON Topic.Fa_ID = Faculty.Fa_ID
                  WHERE Magazine.Maga_ID = :maga_id";
        $sql = $this->conn->prepare($query);
        $sql->execute(array(':maga_id'=> $maga_id));
        return $sql->fetch(PDO::FETCH_ASSOC);
    }

    public function getMagazinesByFaculty($faculty_id) {
        $query = "SELECT * FROM magazine
                  INNER JOIN contribution ON magazine.Con_ID = contribution.Con_ID
                  INNER JOIN student ON contribution.Stu_ID = student.Stu_ID
                  WHERE student.Fa_ID = :faculty_id";
        $sql = $this->conn->prepare($query);
        $sql->execute(array(':faculty_id' => $faculty_id));
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getMagazinesByTopic($topic_id) {
        $query = "SELECT * FROM magazine
                  INNER JOIN contribution ON magazine.Con_ID = contribution.Con_ID
                  WHERE contribution.Topic_ID = :topic_id";
        $sql = $this->conn->prepare($query);
        $sql->execute(array(':topic_id' => $topic_id));
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllMessage(){
        $query = "SELECT Mail.*, 
                    Student.Stu_FullName AS Stu_FullName,
                    Coordinator.Coor_FullName AS Coor_FullName
                    FROM Mail
                    JOIN Student ON Mail.Stu_ID = Student.Stu_ID
                    JOIN Coordinator ON Mail.Coor_ID = Coordinator.Coor_ID;";
        $sql = $this->conn->prepare($query);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);

    }

    public function getAllComment(){
        $query = "SELECT Comments.*, 
        Contribution.Con_Name AS Con_Name,
        Coordinator.Coor_FullName AS Coor_FullName
        FROM Comments
        JOIN Contribution ON Comments.Con_ID = Contribution.Con_ID
        JOIN Coordinator ON Comments.Coor_ID = Coordinator.Coor_ID;";
        $sql = $this->conn->prepare($query);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTotalContributionByFaculty($id)
    {
        $query = "SELECT * FROM contribution where Topic_ID = :id";
        $sql = $this->conn->prepare($query);
        $sql->execute(array(':id'=> $id));
        return $sql->rowCount();
    }

    
}
?>