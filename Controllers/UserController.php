<?php 
require_once 'Models/UserModel.php';

require_once 'Models/AdminModel.php';
class UserController{
    public function register(){
        $adminmodel = new AdminModel();
        
        if(isset($_SESSION['is_login'] ) && $_SESSION['is_login'] == false){
            
        
            $insert = true;
        
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $username = $_POST['username'];
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $email = $_POST['email'];
                $fullname = $_POST['fullname'];
                $dob=$_POST['dob'];
                $faculty=$_POST['fa_id'];

                $err = $adminmodel->validateStudent('', $username, $password, $email, $dob, '',  $fullname,'', $insert);

                if(empty($err)){
                    $adminmodel->addStudentAccount($username, $password, $email, $fullname, $dob, 2, $faculty, null);
                    header('Location: index.php?action=login');
                    exit();
                }
            }
            $faculty = $adminmodel->getAllFaculty();
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
        if( $_SESSION['is_login'] == false ){
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