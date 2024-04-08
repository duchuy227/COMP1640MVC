<?php
require_once 'Models/AdminModel.php';
require_once 'UserController.php';

class AdminController {
    private  $is_login;
    public function __construct() {
        $usercontroller = new UserController();
        $this->is_login = $usercontroller->is_login();
    }

    public function indexAdmin() {
        
        if($this->is_login == true && $_SESSION['role_id'] == 1) {
        $adminModel = new adminModel();
        $admin = $adminModel->getAllAdminAccount();
        include 'views/admin_profile.php';
        
        }else  {
            header("Location: views/university_index.php");           
            exit();
        }
        
    }

    public function update_admin($id){
        ob_start();
        if($this->is_login == true && isset($_SESSION['role_id']) && $_SESSION['role_id'] == 1) {
            $adminModel = new AdminModel();
            $admin = $adminModel->getAdminAccountById($id);
            

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if(isset($_FILES["new_avatar"]) && !empty($_FILES["new_avatar"]["tmp_name"])) { 
                    $file = $_FILES["new_avatar"];
                    $imageData = file_get_contents($file["tmp_name"]);          
                } else {
                    $image = $_POST["avatar"];
                    $imageData = base64_decode($image);                  
                }

                $username = $_POST['username'];
                $password = $_POST['password'];
                $email = $_POST['email'];         
                $dob = $_POST['dob'];
                $roleId = $_POST['role_id'];

                $err = $adminModel->validateAdmin($username, $password);

                if(empty($err)){
                    $adminModel->updateAdminAccount($id, $username, $password, $email,  $dob, $roleId, $imageData);
                //     // Chuyển hướng sau khi cập nhật thành công
                    header('Location: index.php?action=admin');           
                    exit();
                } 

                // $adminModel = new AdminModel();
                // $adminModel->updateAdminAccount($id, $username, $password, $email,  $dob, $roleId, $imageData);
                //     // Chuyển hướng sau khi cập nhật thành công
                // header('Location: index.php?action=admin');           
                // exit();

            } include 'views/admin_edit_profile.php';
        } else {
            header("Location: views/university_index.php");
        }
        ob_end_flush();

    }


    public function indexManager() {
        // Hiển thị danh sách Manager
        if($this->is_login == true && $_SESSION['role_id'] == 1) {
        $adminModel = new adminModel();
        if(isset( $_POST['username'])){
            $username =  $_POST['username'];
            $admin = $adminModel->getManagerAccountByName($username);
        }

        else {
        $admin = $adminModel->getAllManagerAccount();
        }
        include 'views/admin_list_manager.php';     
        } else if($this->is_login == true && $_SESSION['role_id'] != 1){
            echo'access dinied';
        }
        else  {
            header('Location: index.php?action=login');           
            exit();
        }
        
    }

    public function indexStudent() {
        // Hiển thị danh sách Manager
        if($this->is_login == true && $_SESSION['role_id'] == 1) {
            $adminModel = new adminModel();
            if($_SERVER ['REQUEST_METHOD'] == 'POST') {
                if(isset( $_POST['username'])){
                    $username =  $_POST['username'];
                    $admin = $adminModel->getStudentAccountByName($username);
                }
                if(isset( $_POST['fa_id'])){
                $fa_id = $_POST['fa_id'];
                $admin = $adminModel->getStudentAccountByFaculty($fa_id);
                }
            }else{
                $admin = $adminModel->getAllStudentAccount();
            }
            $faculty = $adminModel->getAllFaculty() ;
            
            include 'views/admin_list_student.php';
        } else {
                header("Location: views/university_index.php");
            }
    }

    public function indexCoordinator() {
        // Kiểm tra xem người dùng đã đăng nhập và có vai trò phù hợp không
        if($this->is_login == true && $_SESSION['role_id'] == 1) {
            $adminModel = new adminModel();   
            
            // Kiểm tra phương thức yêu cầu
            if($_SERVER ['REQUEST_METHOD'] == 'POST') {
                // Kiểm tra xem tên người dùng có được thiết lập trong dữ liệu POST không
                if(isset($_POST['username'])) {
                    $username = $_POST['username'];
                    $admin = $adminModel->getCoordinatorAccountByName($username);
                }
                // Kiểm tra xem fa_id có được thiết lập trong dữ liệu POST không
                else if(isset($_POST['fa_id'])) {
                    $fa_id = $_POST['fa_id'];
                    $admin = $adminModel->getCoordinatorAccountByFaculty($fa_id);
                }
                // Nếu không có username hoặc fa_id được thiết lập, lấy tất cả tài khoản người phụ trách
                else {
                    $admin = $adminModel->getAllCoordinatorAccount();
                }
            } else {
                // Nếu không phải là yêu cầu POST, lấy tất cả tài khoản người phụ trách
                $admin = $adminModel->getAllCoordinatorAccount();
            }
    
            // Lấy tất cả các khoa
            $faculty = $adminModel->getAllFaculty();
    
            // Bao gồm view và truyền các biến cần thiết
            include 'views/admin_list_coordinator.php';
        } else {
            // Nếu người dùng không có vai trò phù hợp hoặc không đăng nhập, từ chối truy cập
            header("Location: views/university_index.php");
        }
    }
    

    public function insert_manager() {
        ob_start();
        if($this->is_login == true && isset($_SESSION['role_id']) && $_SESSION['role_id'] == 1) {
            $adminModel = new adminModel();
            $insert = true;
            
            // Xử lý thêm mới Manager
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if(isset($_FILES["avatar"]) && !empty($_FILES["avatar"]["tmp_name"])){

                    $file = $_FILES["avatar"];             
                    $imageData = file_get_contents($file["tmp_name"]);
                    $imageData = file_get_contents($_FILES["avatar"]["tmp_name"]);

                    }  else{
                        $imageData=null;
                    }
                $username = $_POST['username'];
                $password = $_POST['password'];
                $email = $_POST['email'];
                $dob = $_POST['dob'];
                $roleId = $_POST['role_id'];

                $err = $adminModel->validateManager('', $username, $password, $email, $dob, $roleId, $imageData,$insert);

                if(empty($err)){
                    $adminModel->addManagerAccount($username, $password, $email, $dob, $roleId,$imageData);
                    header('Location: index.php?action=manager');
                    exit();
                }
    
            } include 'views/admin_add_manager.php'; 
        } else {
            header("Location: views/university_index.php");
        }
        ob_end_flush();
    }
    


    public function update_manager($id) {
        ob_start();
        if($this->is_login == true && isset($_SESSION['role_id']) && $_SESSION['role_id'] == 1) {
            $adminModel = new AdminModel();
            $admin = $adminModel->getManagerAccountById($id);
            $insert = false;
            
    
            // Xử lý cập nhật Manager
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if(isset($_FILES["new_avatar"]) && !empty($_FILES["new_avatar"]["tmp_name"])) { 
                    $file = $_FILES["new_avatar"];
                    $imageData = file_get_contents($file["tmp_name"]);          
                } else {
                    $image = $_POST["avatar"];
                    $imageData = base64_decode($image);                  
                }
                $username = $_POST['username'];
                $password = $_POST['password'];
                $email = $_POST['email'];         
                $dob = $_POST['dob'];
                $roleId = $_POST['role_id'];

                $err = $adminModel->validateManager($id, $username, $password, $email, $dob, $roleId, $imageData, $insert);

                if(empty($err)){
                    $adminModel->updateManagerAccount($id, $username, $password, $email, $dob, $roleId,$imageData);
                    header('Location: index.php?action=manager');
                    exit();
                } 
                // Kiểm tra các trường thông tin không được để trống
                // $adminModel = new AdminModel();
                // $adminModel->updateManagerAccount($id, $username, $password, $email,  $dob, $roleId, $imageData);
        
                //     // Chuyển hướng sau khi cập nhật thành công
                // header('Location: index.php?action=manager');
                // exit();
            } include 'views/admin_edit_manager.php';
        } else {
            header("Location: views/university_index.php");
        }
        ob_end_flush();
    }
    
    
    public function delete_manager($id) {
        // Xử lý xóa Manager
        $adminModel = new AdminModel();
        $adminModel->deleteManagerAccount($id);

        // Chuyển hướng sau khi xóa thành công
        header('Location: index.php?action=manager');
        exit();
    }
    
    public function insert_student() {
        ob_start();
        if($this->is_login == true && isset($_SESSION['role_id']) && $_SESSION['role_id'] == 1) {
            $adminModel = new AdminModel();
            $faculty = $adminModel->getAllFaculty();
            $insert = true;
            

    
            # Xử lý thêm mới student
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if(isset($_FILES["avatar"]) && !empty($_FILES["avatar"]["tmp_name"])){
                    $file = $_FILES["avatar"];             
                    $imageData = file_get_contents($file["tmp_name"]);
                } else {
                    $imageData=null;
                }
                        
                $username = $_POST['username'];
                $password = $_POST['password'];
                $email = $_POST['email'];
                $fullname = $_POST['fullname'];
                $dob = $_POST['dob'];
                $role_Id = $_POST['role_id'];
                $fa_id = $_POST['fa_id'];

                $err = $adminModel->validateStudent('',$username, $password, $email, $dob, $role_Id, $fullname, $imageData, $fa_id, $insert);

                if(empty($err)){
                    $adminModel->addStudentAccount($username, $password, $email, $fullname, $dob, $role_Id, $fa_id,$imageData);
                    header('Location: index.php?action=student');
                    exit();
                }
            }  include 'views/admin_add_student.php'; 
        } else {
            header("Location: views/university_index.php");
        }
        ob_end_flush();
    }


    public function update_student($id) {
        ob_start();
        if($this->is_login == true && $_SESSION['role_id'] == 1) {
            $adminModel = new AdminModel();
                $admin = $adminModel->getStudentAccountById($id);
                $faculty = $adminModel->getAllFaculty();
                $insert = false;
                
                
                // Xử lý cập nhật Manager
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    
                    if(isset($_FILES["new_avatar"]) && !empty($_FILES["new_avatar"]["tmp_name"]))
                    { 
                        $file = $_FILES["new_avatar"];
                        $imageData = file_get_contents($file["tmp_name"]);          
                    }
                    else{
                        $image = $_POST["avatar"];
                        $imageData = base64_decode($image);                  
                    }
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $email = $_POST['email'];
                    $fullname = $_POST['fullname'];
                    $dob = $_POST['dob'];
                    $roleId = $_POST['role_id'];
                    $fa_id = $_POST['fa_id'];
        
                    $err = $adminModel->validateStudent($id,$username, $password, $email, $dob, $roleId, $fullname, $imageData, $insert);

                    if(empty($err)){
                        $adminModel->updateStudentAccount($id, $username, $password, $email, $fullname, $dob, $roleId, $fa_id,$imageData);
                        header('Location: index.php?action=student');
                        exit();
                    }
                
                } include 'views/admin_edit_student.php';
        } 
        else {
                header("Location: views/university_index.php");
            }
        ob_end_flush();
    }

    public function delete_student($id) {
        // Xử lý xóa Manager
        $adminModel = new AdminModel();
        $adminModel->deleteStudentAccount($id);

        // Chuyển hướng sau khi xóa thành công
        header('Location: index.php?action=student');
        exit();
    }

    public function insert_coordinator() {
        ob_start();
        if($this->is_login == true && $_SESSION['role_id'] == 1) {
            $adminModel = new adminModel();
            $faculty = $adminModel->getAllFaculty() ;
            $insert = true;
            
                    // Xử lý thêm mới Manager
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        if(isset($_FILES["avatar"]) && !empty($_FILES["avatar"]["tmp_name"])){
                           
                            $imageData = file_get_contents($_FILES["avatar"]["tmp_name"]);
                            }  else{
                                $imageData=null;
                            }
                        $username = $_POST['username'];
                        $password = $_POST['password'];
                        $email = $_POST['email'];
                        $fullname = $_POST['fullname'];
                        $dob = $_POST['dob'];
                        $role_Id = $_POST['role_id'];
                        $fa_id = $_POST['fa_id'];
                      
                        $err = $adminModel->validateCoordinator('',$username, $password, $email, $dob, $role_Id, $fullname, $imageData, $fa_id, $insert);

                        if(empty($err)){
                        $adminModel->addCoordinatorAccount($username, $password, $email, $fullname, $dob, $role_Id, $fa_id,$imageData);
                        header('Location: index.php?action=coordinator');
                        exit();
                        }

                    }include 'views/admin_add_coordinator.php'; 
            } 
            else {
                header("Location: views/university_index.php");
                     }
        ob_end_flush();
    }

    

    public function update_coordinator($id) {
        ob_start();
        if($this->is_login == true && $_SESSION['role_id'] == 1) {
            $adminModel = new AdminModel();
            $admin = $adminModel->getCoordinatorAccountById($id);
            $faculty = $adminModel->getAllFaculty() ;
            $insert = false;
                
                   // Xử lý cập nhật Manager
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {               
                    if(isset($_FILES["new_avatar"]) && !empty($_FILES["new_avatar"]["tmp_name"]))
                    { 
                        $file = $_FILES["new_avatar"];
                        $imageData = file_get_contents($file["tmp_name"]);          
                    }
                else{
                        $image = $_POST["avatar"];
                        $imageData = base64_decode($image);                  
                }
                
                        $username = $_POST['username'];
                        $password = $_POST['password'];
                        $email = $_POST['email'];
                        $fullname = $_POST['fullname'];
                        $dob = $_POST['dob'];
                        $roleId = $_POST['role_id'];
                        $fa_id = $_POST['fa_id'];

                        $err = $adminModel->validateCoordinator($id,$username, $password, $email, $dob, $roleId, $fullname, $imageData, $insert);

                        if(empty($err)){
                            $adminModel->updateCoordinatorAccount($id, $username, $password, $email, $fullname, $dob, $roleId, $fa_id,$imageData);
                            header('Location: index.php?action=coordinator');
                            exit();
                        }
                }include 'views/admin_edit_coordinator.php';

                } else {
                    header("Location: views/university_index.php");
                    }
        ob_end_flush();
    }

    public function delete_coordinator($id) {
        // Xử lý xóa Manager
        $adminModel = new AdminModel();
        $adminModel->deleteCoordinatorAccount($id);

        // Chuyển hướng sau khi xóa thành công
        header('Location: index.php?action=coordinator');
        exit();
    }
}
?>
