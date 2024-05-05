<?php 
require_once 'Models/UserModel.php';

require_once 'Models/AdminModel.php';
class UserController{
    public function register() {
        if(!isset($_SESSION['is_login']) || $_SESSION['is_login'] == false) {
            $adminModel = new AdminModel();
            
            // Lấy faculty_id từ POST
            $faculty_id = isset($_POST['fa_id']) ? $_POST['fa_id'] : '';
    
            // Lấy thông tin faculty dựa trên faculty_id
            $faculty = $adminModel->getFacultyByID($faculty_id);
    
            // Lấy danh sách tất cả faculty
            $all_faculty = $adminModel->getAllFaculty();
        
            $insert = true;
        
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $password = $_POST['password'];
                $errors = []; // Tạo mảng lỗi mới
                if (strlen($password) < 6) {
                    $errors['password'] = 'Password must have 6 characters';
                } elseif (!preg_match('/[A-Z]/', $password)) {
                    $errors['password'] = 'Password must have at least 1 uppercase character';
                } elseif (!preg_match('/[a-z]/', $password)) {
                    $errors['password'] = 'Password must have at least 1 lowercase character';
                } elseif (!preg_match('/[^a-zA-Z0-9]/', $password)) {
                    $errors['password'] = 'Password must have at least 1 special character';
                } elseif (!preg_match('/[\d]/', $password)) {
                    $errors['password'] = 'Password must have at least 1 number';
                } else {
                    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                }
    
                $username = $_POST['username'];
                $email = $_POST['email'];
                $fullname = $_POST['fullname'];
                $dob = $_POST['dob'];
    
                // Validate dữ liệu
                $err = $adminModel->validateStudent('', $username, $email, $dob, '', $fullname, '', $insert);
    
                if(empty($errors) && empty($err)) {
                    // Thêm tài khoản sinh viên
                    $adminModel->addStudentAccount($username, $password, $email, $fullname, $dob, 2, $faculty_id, null);
                    header('Location: index.php?action=login');
                    exit();
                }
            }
            include 'views/register.php';
        } 
    }
    
    

    public function login() {
        ob_start();
            $_SESSION['is_login'] = false;
            if(isset($_SESSION['is_login']) && $_SESSION['is_login'] == false) {
                if($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $role_id = $_POST['role_id'];
                    $usermodel = new UserModel();
                    $user = $usermodel->check_login($username, $password, $role_id);
                    
                    if($user) {
                        $_SESSION['username'] = $_POST['username'];
                        $_SESSION['is_login'] = true;
                        $_SESSION['role_id'] = $role_id;
                        switch($_SESSION['role_id']) {
                            case 1:
                                header('location: index.php?action=admin_index');
                                exit();
                            case 2:
                                header('location:index.php?action=student_index'); 
                                exit();
                            case 3:
                                header('location:index.php?action=manager_index'); 
                                exit();
                            case 4:
                                header('location:index.php?action=coordinator_index'); 
                                exit();
                            default: break;
                        } 
                    } else {
                        $_SESSION['error_message'] = "Invalid Information";
                        $_SESSION['is_login'] = false;
                    }
                }  
            } else {
                header('Location: index.php');   
            } include 'views/userlogin.php';
        ob_end_flush();
    }
    




    public function display_role(){

    }

    

    public function is_login() {
        if(!isset($_SESSION['is_login']) || $_SESSION['is_login'] == false){
           return false;
        }
        else{
           return true;
        }
    }

    public function logout(){      
        session_unset();
        session_destroy();
        $_SESSION['is_login'] = false;
        header("Location:index.php?action=login"); 
        exit();
    }
}

?>