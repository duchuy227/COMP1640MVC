<?php
    require_once 'Models/ManagerModel.php';
    require_once 'UserController.php';
    require_once 'Models/CoordinatorModel.php';
    require_once 'Models/AdminModel.php';
    use PhpOffice\PhpWord\IOFactory;
    use PhpOffice\PhpWord\PhpWord;


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
                $allstu = $managerModel ->getAllStudentToRow();
                $alltopic = $managerModel ->getAllTopicToRow();

                $fdata = $managerModel->getContributionCountsByFaculty();
                $tdata = $managerModel->getContributionByTopic();
                $sdata = $managerModel->getStudentCountByFaculty();
        
                include 'views/manager_index.php';
            }
        }

        public function manager_topic(){
            if ($this->is_login == true && $_SESSION['role_id'] == 3) {
                $managerModel = new ManagerModel();
                $ManagerProfile = $managerModel->getManagerbyUserName($_SESSION['username']);
                $topic = $managerModel ->getAllTopic();

                include 'views/manager_topic.php';
            }
        }

        public function manager_topic_detail($id){
            if ($this->is_login == true && $_SESSION['role_id'] == 3) {
                $managerModel = new ManagerModel();
                $ManagerProfile = $managerModel->getManagerbyUserName($_SESSION['username']);
                $topics = $managerModel ->getTopicById($id);

                include 'views/manager_topic_detail.php';
            }
        }
        

        public function manager_profile(){
            if ($this->is_login == true && $_SESSION['role_id'] == 3 ) {
                $managerModel = new ManagerModel();
                $ManagerProfile = $managerModel->getManagerByUsername($_SESSION['username']);

                include 'views/manager_profile.php';
            }
        }


        public function manager_edit_profile(){
            if ($this->is_login == true && $_SESSION['role_id'] == 3 ) {
                $managerModel = new ManagerModel();
                $ManagerProfile = $managerModel->getManagerByUsername($_SESSION['username']);

                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    if(isset($_FILES["new_avatar"]) && !empty($_FILES["new_avatar"]["tmp_name"])) { 
                        $file = $_FILES["new_avatar"];
                        $imageData = file_get_contents($file["tmp_name"]);          
                    } else {
                        $image = $_POST["avatar"];
                        $imageData = base64_decode($image);                  
                    }
                    $id = $_POST['id'];
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $email = $_POST['email'];         
                    $dob = $_POST['dob'];
                    $roleId = $_POST['role_id'];
    
                    // $err = $adminModel->validateManager($id, $username, $password, $email, $dob, $roleId, $imageData, $insert);
    
                    if(empty($err)){
                        $managerModel->updateManagerAccount($id, $username, $password, $email, $dob, $roleId,$imageData);
                        header('Location: index.php?action=manager_profile');
                        exit();
                    }
                }

                include 'views/manager_edit_profile.php';
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

        public function manager_view_contribution(){
            if ($this->is_login == true && $_SESSION['role_id'] == 3 ) {
                $managerModel = new ManagerModel();
                $ManagerProfile = $managerModel->getManagerByUsername($_SESSION['username']);
                $contribution = $managerModel->getAllContribution() ;
                include 'views/manager_view_contribution.php';
            }
        }

        public function manager_select_contribution(){
            if ($this->is_login == true && $_SESSION['role_id'] == 3 ) {
                $managerModel = new ManagerModel();
                $ManagerProfile = $managerModel->getManagerByUsername($_SESSION['username']);
                $contribution = $managerModel->getContributionSelected() ;
                include 'views/manager_select_contribution.php';
            }
        }

        public function download(){
            if ($this->is_login == true && $_SESSION['role_id'] == 3 ) {
                $managerModel = new ManagerModel();
                $ManagerProfile = $managerModel->getManagerByUsername($_SESSION['username']);
                $contribution = $managerModel->getContributionSelected();        
                $zip = new ZipArchive();
                $zipFileName = 'contribution.zip';
                if ($zip->open($zipFileName, ZipArchive::CREATE || ZipArchive::OVERWRITE) === TRUE) {
                    foreach ($contribution as $con) {
                        $docFiles = $con['Con_Doc'];
                        $zip->addFile($docFiles);
                    }
                    $zip->close();

                    header("Content-type: application/zip");
                    header("Content-Disposition: attachment; filename=$zipFileName");

                    readfile($zipFileName);

                
                    unlink($zipFileName);
                } else {
                    echo "Error";
                }
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

        public function manager_delete_contribution($id){
            $user = new UserController();
            $is_login = $user->is_login();
            if ($is_login == true && $_SESSION['role_id'] == 3 ) {
                $managerModel = new ManagerModel();
                $managerModel->deleteContribution($id);
                header('Location: index.php?action=manager_view_contribution');
                exit();
        }
        }
    }

?>