<?php
    require_once 'Models/ManagerModel.php';
    require_once 'UserController.php';
    require_once 'Models/CoordinatorModel.php';
    require_once 'Models/AdminModel.php';

    class ManagerController {
        private  $is_login;
        public function __construct() {
            $usercontroller = new UserController();
            $this->is_login = $usercontroller->is_login();
        }

        public function manager_index() {
            // Kiểm tra xem người dùng đã đăng nhập và có quyền là manager hay không
            if ($this->is_login == true && $_SESSION['role_id'] == 3) {
                $managerModel = new ManagerModel();
                $ManagerProfile = $managerModel->getManagerbyUserName($_SESSION['username']);
                $percent = $managerModel->percentContribution();
                $percentValue = floor($percent['percentage']);
                $allContri = $managerModel->getAllContributionToRow();

                $fdata = $managerModel->getContributionCountsByFaculty();
                $tdata = $managerModel->getContributionByTopic();
                $sdata = $managerModel->getStudentCountByFaculty();
        
                include 'views/manager_index.php';
            }
        }
        

        public function manager_profile(){
            if ($this->is_login == true && $_SESSION['role_id'] == 3 ) {
                $managerModel = new ManagerModel();
                $ManagerProfile = $managerModel->getManagerByUsername($_SESSION['username']);

                include 'views/manager_profile.php';
            }
        }

        public function manager_view_faculty($fa){
            if ($this->is_login == true && $_SESSION['role_id'] == 3 ) {
                $coordinatorModel = new CoordinatorModel();
                $managerModel = new ManagerModel();
                $ManagerProfile = $managerModel->getManagerByUsername($_SESSION['username']);
                $facultyName = $managerModel->getFacultyNameById($fa);
                
                $adminModel = new AdminModel();
                $students = $managerModel ->getStudentByFaculty($fa);
                $coordinator = $adminModel->getCoordinatorAccountByFaculty($fa);
                include 'views/manager_view_faculty.php';
            }
            
        }

        public function manager_edit_student($id){
            if ($this->is_login == true && $_SESSION['role_id'] == 3 ) {
                $managerModel = new ManagerModel();
                $ManagerProfile = $managerModel->getManagerByUsername($_SESSION['username']);

                $coordinatorModel = new CoordinatorModel();
                $adminModel = new AdminModel();
                $insert = false;
                $admin= $adminModel -> getStudentAccountById($id);
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
        
                    // $err = $adminModel->validateStudent($id,$username, $password, $email, $dob, $roleId, $fullname, $imageData, $insert);

                    // if(empty($err)){
                    $adminModel->updateStudentAccount($id, $username, $password, $email, $fullname, $dob, $roleId, $fa_id,$imageData);
                    header('Location: index.php?action=manager_index');
                    exit();
                    // }
                
                }include 'views/manager_edit_student.php';
            } 
        
        }

        public function manager_edit_coordinator($id){
            if ($this->is_login == true && $_SESSION['role_id'] == 3 ) {
                $managerModel = new ManagerModel();
                $adminModel = new AdminModel();
                $coordinatorModel = new CoordinatorModel();
                $ManagerProfile = $managerModel->getManagerByUsername($_SESSION['username']);

                $admin = $adminModel->getCoordinatorAccountById($id);
                $faculty = $adminModel->getAllFaculty() ;
                $insert = false;

                if ($_SERVER['REQUEST_METHOD'] == 'POST') {               
                    if(isset($_FILES["new_avatar"]) && !empty($_FILES["new_avatar"]["tmp_name"]))
                    { 
                        $file = $_FILES["new_avatar"];
                        $imageData = file_get_contents($file["tmp_name"]);          
                    } else{
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

                    $adminModel->updateCoordinatorAccount($id, $username, $password, $email, $fullname, $dob, $roleId, $fa_id,$imageData);
                    header('Location: index.php?action=manager_index');
                    exit();
                        // }
                }include 'views/manager_edit_coordinator.php';
            }
        }

        public function manager_view_contribution($id){
            if ($this->is_login == true && $_SESSION['role_id'] == 3 ) {
                $managerModel = new ManagerModel();
                $ManagerProfile = $managerModel->getManagerByUsername($_SESSION['username']);
                if($id ==1)
                {
                    $contribution = $managerModel->getAllContribution() ;
                    include 'views/manager_view_contribution.php';
                }
                else if($id == 2)
                {
                    $contribution = $managerModel->getContributionSelected() ;
                    include 'views/manager_view_contribution.php';
                }
            }
        }

        public function download($id){
            if ($this->is_login == true && $_SESSION['role_id'] == 3 ) {
                $managerModel = new ManagerModel();
                $ManagerProfile = $managerModel->getManagerByUsername($_SESSION['username']);
                $contribution = $managerModel->getContributionByID($id);
        
                // Tạo tệp tin zip
                $zip = new ZipArchive();
                $zipFileName = 'contributions.zip';
                $zip->open($zipFileName, ZipArchive::CREATE | ZipArchive::OVERWRITE);
        
                foreach ($contribution as $singleContribution) {
                    if (!empty($singleContribution['Con_Doc'])) {
                        // Tạo tên tệp tin
                        $fileName = 'contribution_' . $singleContribution['Con_Name'] . '.doc';
                        
                        // Mã hóa dữ liệu văn bản trước khi thêm vào tệp zip
                        $fileContent = base64_encode($singleContribution['Con_Doc']);
        
                        // Thêm vào tệp zip
                        $zip->addFromString($fileName, $fileContent);
                    }
                }
        
                $zip->close();
        
                // Trả về tệp tin zip để người dùng tải xuống
                header("Content-Type: application/zip");
                header("Content-Disposition: attachment; filename=$zipFileName");
                header("Content-Length: " . filesize($zipFileName));
                readfile($zipFileName);
        
                // Xóa tệp tin zip sau khi đã truyền cho người dùng
                unlink($zipFileName);
            }
        }
        
        

        public function chart(){
            if ($this->is_login == true && $_SESSION['role_id'] == 3 ) {
                $managerModel = new ManagerModel();
                $ManagerProfile = $managerModel->getManagerByUsername($_SESSION['username']);

                $fdata = $managerModel->getContributionCountsByFaculty();
                $tdata = $managerModel->getContributionByTopic();
                $sdata = $managerModel->getStudentCountByFaculty();
                include 'views/manager_statistics.php';
            }
        }
    }

?>