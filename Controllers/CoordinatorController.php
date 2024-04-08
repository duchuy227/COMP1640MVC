<?php
    require_once 'Models/CoordinatorModel.php';
    require_once 'UserController.php';
    use PhpOffice\PhpWord\IOFactory;

    class CoordinatorController {

        protected $model;

        private  $is_login;
        public function __construct() {
            $usercontroller = new UserController();
            $this->is_login = $usercontroller->is_login();
        }

       

        public function coordinator_index(){
            if ($this->is_login == true && $_SESSION['role_id'] == 4 ) {
                $coordinatorModel = new CoordinatorModel();
                $coorInfo = $coordinatorModel ->getCoordinatorbyUserName($_SESSION['username']);

                // $coor_ID = $_SESSION['fa_id'];
                $fa_id = $coorInfo['Fa_ID'];
                $students = $coordinatorModel ->getAllStudentByCoordinator($fa_id);

                include 'views/coordinator_index.php';
            }
        }

        public function coordinator_student(){
            if ($this->is_login == true && $_SESSION['role_id'] == 4 ) {
                $coordinatorModel = new CoordinatorModel();

                $coorInfo = $coordinatorModel ->getCoordinatorbyUserName($_SESSION['username']);
                $fa_id = $coorInfo['Fa_ID'];
                $students = $coordinatorModel ->getAllStudentByCoordinator($fa_id);
                include 'views/coordinator_student.php';
            }
        }

        public function coordinator_profile(){
            if ($this->is_login == true && $_SESSION['role_id'] == 4 ) {
                $coordinatorModel = new CoordinatorModel();
                $coorInfo = $coordinatorModel ->getCoordinatorbyUserName($_SESSION['username']);

                include 'views/coordinator_profile.php';
            }
        }

        public function coordinator_edit_profile() {
            if ($this->is_login == true && $_SESSION['role_id'] == 4 ) {
                $coordinatorModel = new CoordinatorModel();
                // $username = $_SESSION['username'];
                $coorInfo = $coordinatorModel ->getCoordinatorbyUserName($_SESSION['username']);
                
        
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    // Kiểm tra xem các trường bắt buộc đã được gửi từ form hay không
                    // if(isset($_POST['password']) && isset($_POST['fa_id'])) {
                        $id = $_POST['id'];
                        $username = $_POST['username'];
                        $password = $_POST['password'];
                        $fa_id = $_POST['fa_id'];
                        
                        
                        // Xử lý tải ảnh mới hoặc sử dụng ảnh hiện tại
                        if(isset($_FILES["new_avatar"]) && !empty($_FILES["new_avatar"]["tmp_name"])) { 
                            $file = $_FILES["new_avatar"];
                            $imageData = file_get_contents($file["tmp_name"]);          
                        } else {
                            $image = $_POST["avatar"];
                            $imageData = base64_decode($image);                  
                        }
        
                        // Lấy các giá trị khác từ form
                        $email = $_POST['email'];
                        $fullname = $_POST['fullname'];
                        $dob = $_POST['dob'];
                        $roleId = $_POST['role_id'];
        
                        // Thực hiện cập nhật thông tin sinh viên
                        $updateCoor = $coordinatorModel->updateCoordinatorProfile($id,$username, $password, $email, $fullname, $dob, $roleId, $fa_id, $imageData);
                        $_SESSION['username'] = $username;
                        header('Location: index.php?action=coordinator_profile');
                        
                    // } else {
                        // echo 'Hi';
                    // }
                } else {
                    
                } include 'views/coordinator_edit_profile.php';
            }
            
        }

        public function coordinator_edit_student($id){
            if ($this->is_login == true && $_SESSION['role_id'] == 4 ) {
                $coordinatorModel = new CoordinatorModel();
                $coorInfo = $coordinatorModel->getCoordinatorbyUserName($_SESSION['username']);
                $faculty = $coordinatorModel->getAllFaculty();
                
                // Xử lý cập nhật thông tin sinh viên
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    // Xử lý tải ảnh mới hoặc sử dụng ảnh hiện tại
                    if (isset($_FILES["new_avatar"]) && !empty($_FILES["new_avatar"]["tmp_name"])) { 
                        $file = $_FILES["new_avatar"];
                        $imageData = file_get_contents($file["tmp_name"]);          
                    } else {
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
        
                    // Thực hiện cập nhật thông tin sinh viên
                    $coordinatorModel->updateStudentAccount($id, $username, $password, $email, $fullname, $dob, $roleId, $fa_id, $imageData);
                    header('Location: index.php?action=coordinator_student');
                    exit();
                }
                
                include 'views/coordinator_edit_student.php';
            } 
        }

        public function coordinator_contribution(){
            if ($this->is_login == true && $_SESSION['role_id'] == 4 ) {
                $coordinatorModel = new CoordinatorModel();
                $coorInfo = $coordinatorModel ->getCoordinatorbyUserName($_SESSION['username']);

                $faculty_id = $coorInfo['Fa_ID'];

        
                $contribution = $coordinatorModel->getAllContributionByFaculty($faculty_id);


                include 'views/coordinator_contribution.php';
            }
        }

        public function coordinator_mail(){
            if ($this->is_login == true && $_SESSION['role_id'] == 4 ) {
                $coordinatorModel = new CoordinatorModel();
                $coorInfo = $coordinatorModel ->getCoordinatorbyUserName($_SESSION['username']);

                include 'views/coordinator_mail.php';
            }
        }
    }  

    //     public function add_comment($id) {  
    //         ob_start() ;
    //        //if(isset($_SESSION['is_login']) && $_SESSION['is_login'] == true && $_SESSION['role_id']==4){
    //         $con = new ContributionModel();
    //         $contribution = $con->getContributionById($id);
    //         require_once "views/contri_add_cmt.php" ;
    //         if($_SERVER['REQUEST_METHOD'] == 'POST') {
    //             $Com_Detail = $_POST['Com_Detail'];
    //             $Con_ID = $_POST['Con_ID'];
    //             $Coor_ID = $_SESSION['userid'];
    //             $check = $this->model->checkDate($Con_ID);
    //             if($check == true) {
    //             $this->model->addComment($Com_Detail,$Con_ID,$Coor_ID);
    //             $this->model->changeStatus($Con_ID);
    //             header('location: index.php?action=contribution');
    //             exit;
    //             } else {
    
    //             }
    //         }
    //   //  }
    //         ob_end_flush() ;
    //     }
    // public function download() {  
    //     $zip = new ZipArchive();
    //     $download = $this->model->download();
    //     $zipName = 'contributions.zip';
    //     $zip->open($zipName, ZipArchive::CREATE) ;
      
    //     foreach($download as $row) {
            
    //         $fileName = 'contribution_' . $row['Con_Name'] . '.doc';
         
    //         $fileContent = $row['con_doc'];
            
    //         $zip->addFromString($fileName, $fileContent);
    //     }
        
        
    //     $zip->close();
        
    //     header("Content-type: application/zip");
       
    //     header("Content-Disposition: attachment; filename=$zipName");
    //     //
    //     readfile($zipName);
    //     // 
    //     unlink($zipName);
    
    // }
    
?>