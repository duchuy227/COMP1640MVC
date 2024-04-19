<?php 
require_once 'Config/db.php';


class UserModel{
    private $conn;

    public function __construct() {
        global $conn;
        $this->conn = $conn;
    }
    public function check_login($username, $password, $role_id) {
        switch ($role_id) {
            case 1:
                $query = "SELECT * FROM admin WHERE Ad_Username = :username";
                $sql = $this->conn->prepare($query);
                $sql->execute(array(":username" => $username));
                $result = $sql->fetch(PDO::FETCH_ASSOC);
                if ($result) {
                    // Kiểm tra mật khẩu
                    if (!empty($result) && password_verify($password, $result['Ad_Password'])) {
                        return true; // Đăng nhập thành công
                    } else {
                        return false; // Mật khẩu không chính xác
                    }
                } else {
                    return false; // Không tìm thấy người dùng
                }
                break;
            case 2:
                $query = "SELECT * FROM student WHERE Stu_Username = :username";
                $sql = $this->conn->prepare($query);
                $sql->execute(array(":username" => $username));
                $result = $sql->fetch(PDO::FETCH_ASSOC);
                if ($result) {
                    // Kiểm tra mật khẩu
                    if (!empty($result) && password_verify($password, $result['Stu_Password'])) {
                        return true; // Đăng nhập thành công
                    } else {
                        return false; // Mật khẩu không chính xác
                    }
                } else {
                    return false; // Không tìm thấy người dùng
                }
                

                case 3 :
                    $query = "SELECT * from manager where Ma_Username = :username";
                    $sql = $this->conn->prepare($query);
                    $sql->execute(array(":username"=> $username));
                    $result = $sql->fetch(PDO::FETCH_ASSOC);
                    if(!empty($result) && password_verify($password, $result['Ma_Password'])){
                        return true;                  
                    }
                    else{
                        return false;
                    }

                case 4 :
                    $query = "SELECT * from coordinator where Coor_Username = :username";
                    $sql = $this->conn->prepare($query);
                    $sql->execute(array(":username"=> $username));
                    $result = $sql->fetch(PDO::FETCH_ASSOC);
                    if(!empty($result) && password_verify($password, $result['Coor_Password'])){
                        $_SESSION['userid'] =  $result['Coor_ID'] ;
                        return true;  
                    } else{
                        return false;
                    }
            default:
                return false; // role_id không hợp lệ
        }
    }

    public function getAllRole(){
        $query ="SELECT * from role";
        $sql = $this->conn->prepare($query);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

}
?>