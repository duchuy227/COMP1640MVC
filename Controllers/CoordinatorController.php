<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    require_once 'Models/CoordinatorModel.php';
    require_once 'UserController.php';
    use PhpOffice\PhpWord\IOFactory;
    include 'PHPMailer/src/Exception.php';
    include 'PHPMailer/src/PHPMailer.php';
    include 'PHPMailer/src/SMTP.php';

    class CoordinatorController {

        protected $model;

        private  $is_login;
        public function __construct() {
            $this->model = new CoordinatorModel();
            $usercontroller = new UserController();
            $this->is_login = $usercontroller->is_login();
        }

       

        public function coordinator_index(){
            if ($this->is_login == true && $_SESSION['role_id'] == 4 ) {
                $coordinatorModel = new CoordinatorModel();
                $coorInfo = $coordinatorModel ->getCoordinatorbyUserName($_SESSION['username']);

                $alltp = $coordinatorModel ->getTopic($coorInfo["Fa_ID"]);

                // $coor_ID = $_SESSION['fa_id'];
                $fa_id = $coorInfo['Fa_ID'];
                $students = $coordinatorModel ->getAllStudentByCoordinator($fa_id);
                $allstu = $coordinatorModel ->getAllStudentByCoordinatorRow($fa_id);

                $contribution = $coordinatorModel->getAllContributionByFaculty($fa_id);
                $allcontri = $coordinatorModel ->getAllContributionByFacultyRow($fa_id);

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
                        $id = $_POST['id'];
                        $username = $_POST['username'];
                        $password = $_POST['password'];
                        $fa_id = $_POST['fa_id'];

                        if(isset($_FILES["new_avatar"]) && !empty($_FILES["new_avatar"]["tmp_name"])) { 
                            $file = $_FILES["new_avatar"];
                            $imageData = file_get_contents($file["tmp_name"]);          
                        } else {
                            $image = $_POST["avatar"];
                            $imageData = base64_decode($image);                  
                        }
        
                        $email = $_POST['email'];
                        $fullname = $_POST['fullname'];
                        $dob = $_POST['dob'];
                        $roleId = $_POST['role_id'];

                        $updateCoor = $coordinatorModel->updateCoordinatorProfile($id,$username, $password, $email, $fullname, $dob, $roleId, $fa_id, $imageData);
                        $_SESSION['username'] = $username;
                        header('Location: index.php?action=coordinator_profile');
                } else {
                    
                } include 'views/coordinator_edit_profile.php';
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

        public function change_status($id){
            if ($this->is_login == true && $_SESSION['role_id'] == 4 ) {
                $coordinatorModel = new CoordinatorModel();
                $coorInfo = $coordinatorModel ->getCoordinatorbyUserName($_SESSION['username']);
        
                $contribution = $coordinatorModel ->getContributionByID($id);
        
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $status = $_POST['status'];
                    $contributionID = $id; // Lưu lại ID của contribution
                    $success = $coordinatorModel ->updateContributionStatus($contributionID, $status);
        
                    // Kiểm tra nếu trạng thái mới là "Approval", thêm vào bảng Magazine
                    if ($status === 'Approval') {
                        // Lấy thông tin contribution đã được cập nhật
                        $updatedContribution = $coordinatorModel->getContributionByID($contributionID);
                        // Thêm vào bảng Magazine
                        $coordinatorModel->addContributionToMagazine($updatedContribution);
                    }
        
                    header('Location: index.php?action=coordinator_contribution');
                }
        
                include 'views/coordinator_update_contribution.php';
            }
        }
        

        public function coor_contribution_detail($id){
            if ($this->is_login == true && $_SESSION['role_id'] == 4 ) {
                $coordinatorModel = new CoordinatorModel();
                $coorInfo = $coordinatorModel ->getCoordinatorbyUserName($_SESSION['username']);

                $contribution = $coordinatorModel ->getContributionDetail($id);;

                include 'views/coordinator_contribution_detail.php';
            }
        }

        public function viewdocx($id){
            $coordinatorModel = new CoordinatorModel();
            $coorInfo = $coordinatorModel ->getCoordinatorbyUserName($_SESSION['username']);
            $contribution = $coordinatorModel->getContributionByID($id);
            
            $docxFilePath = $contribution['Con_Doc'];
            $image = $contribution['Con_Image'];
            
            // Sử dụng PHPWord để tải tệp DOCX
            require 'vendor/autoload.php';
            // Tải tệp DOCX
            $phpWord = IOFactory::load($docxFilePath);
            // Trích xuất tất cả các hình ảnh từ tệp DOCX
            // Lấy nội dung của tệp DOCX dưới dạng HTML
            $html = '';
            foreach ($phpWord->getSections() as $section) {
                foreach ($section->getElements() as $element) {
                    if ($element instanceof \PhpOffice\PhpWord\Element\TextRun) {
                        // Xử lý phần tử TextRun
                        foreach ($element->getElements() as $textElement) {
                            if ($textElement instanceof \PhpOffice\PhpWord\Element\Text) {
                                // Xử lý phần tử Text
                                $html .= $textElement->getText();
                            } elseif ($textElement instanceof \PhpOffice\PhpWord\Element\TextBreak) {
                                // Xử lý phần tử TextBreak
                                $html .= "<br>";
                            }
                        }
                    }
                }
            }
        
            include 'views/showDoc1.php';
        }

        public function add_comment($id) {
            ob_start();
            if(isset($_SESSION['is_login']) && $_SESSION['is_login'] == true && $_SESSION['role_id'] == 4) {
                $coordinatorModel = new CoordinatorModel();
                $coorInfo = $coordinatorModel ->getCoordinatorbyUserName($_SESSION['username']);
                $contribution = $coordinatorModel->getContributionById($id);
                $comments = $coordinatorModel->getCommentsForContribution($id); 
                if($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $Com_Detail = strip_tags($_POST['Com_Detail']);
                    $Con_ID = $_POST['Con_ID'];
                    $Coor_ID = $_SESSION['userid'];
                    $check = $this->model->checkDate($Con_ID);
                    if($check == true) {
                        $this->model->addComment($Com_Detail, $Con_ID, $Coor_ID);
                        $time = time();
                        $currentTime = $time - (7 * 3600);
                        $CommentTime = date('Y-m-d H:i:s', $currentTime);
                        $this->mailToAdmin($CommentTime,$coorInfo['Coor_FullName'],$Con_ID);
                        header('location: index.php?action=coordinator_contribution');
                        exit;
                    } 
                } include "views/coordinator_add_cmt.php";
            }
            ob_end_flush();
        }

        public function viewContributionWithComments($conID) {
            $coordinatorModel = new CoordinatorModel();
            $contributions = $coordinatorModel->getContributionWithComments($conID);
            include 'views/coordinator_add_cmt.php';
        }

        public function mailToAdmin($CommentTime, $coorname, $Con_ID){
            $mail = new PHPMailer(true);
            try {
                $mail->SMTPDebug = 0;
                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com'; 
                $mail->SMTPAuth   = true;
                $mail->Username   = 'leduchuy22072002@gmail.com';
                $mail->Password   = 'utkziciechiujjxy';
                $mail->Port       = 587;
                $mail->setFrom('leduchuy22072002@gmail.com');
                $mail->addAddress('huyldgbh200353@fpt.edu.vn');
                $mail->isHTML(true);
                $mail->Subject = 'Comment on Contribution';
                $htmlContent = '
                    <!DOCTYPE html>
                    <html lang="en">
                    <head>
                        <meta charset="UTF-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <title>Comment on Contribution</title>
                        <style>
                            body {
                                font-family: Arial, sans-serif;
                                background-color: #f4f4f4;
                                margin: 0;
                                padding: 0;
                                box-sizing: border-box;
                            }
                            .container {
                                max-width: 600px;
                                margin: 20px auto;
                                background-color: #fff;
                                padding: 20px;
                                border-radius: 8px;
                                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                            }
                            h1 {
                                color: #8B008B;
                                text-align: center;
                            }
                            p {
                                color: #333;
                                font-size: 18px;
                                line-height: 1.6;
                                margin-bottom: 20px;
                            }
                            .highlight {
                                color: #4B0082;
                                font-weight: bold;
                            }
                        </style>
                    </head>
                    <body>
                        <div class="container">
                            <h1>Comment on Contribution</h1>
                            <p>The coordinator <span class="highlight">' . $coorname . '</span> has commented on contribution with ID <span class="highlight">' . $Con_ID . '</span> at <span class="highlight">' . $CommentTime . '</span>.</p>
                        </div>
                    </body>
                    </html>
                ';
                $mail->Body = $htmlContent;
                $mail->send();
            } catch (Exception $e) {
        
            }
        }
        

        public function delete($id){
                $user = new UserController();
                $is_login = $user->is_login();
                if ($is_login == true && $_SESSION['role_id'] == 4 ) {
                    $coordinatorModel = new CoordinatorModel();
                    $coorInfo = $coordinatorModel ->getCoordinatorbyUserName($_SESSION['username']);
                    $coordinatorModel->deleteContribution($id);
                    header('Location: index.php?action=coordinator_contribution');
                    exit();
                }
        }
        

        public function coordinator_mail(){
            if ($this->is_login == true && $_SESSION['role_id'] == 4 ) {
                $coordinatorModel = new CoordinatorModel();
                $coorInfo = $coordinatorModel->getCoordinatorbyUserName($_SESSION['username']);
                $fa_id = $coorInfo['Fa_ID'];
                $students = $coordinatorModel->getAllStudentByCoordinator($fa_id);
        
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $title = $_POST['title'];
                    $content = $_POST['content'];
                    $selectedStudents = $_POST['studentID']; // Sửa tên của biến để phù hợp với tên trong form
        
                    if (!empty($selectedStudents)) {
                        // Kiểm tra xem người dùng đã chọn gửi cho tất cả sinh viên hay không
                        if ($selectedStudents == 'All') {
                            // Gửi email cho tất cả sinh viên trong khoa
                            foreach ($students as $student) {
                                $coordinatorModel->sendMail($student, $coorInfo['Coor_ID'], $content);
                            }
                            $this->mailToAllStudent($content, $title, $coorInfo);
                        } else {
                            // Gửi email cho từng sinh viên được chọn
                            foreach ($selectedStudents as $studentID) {
                                $coordinatorModel->sendMail($studentID, $coorInfo['Coor_ID'], $content);
                                // Lấy thông tin sinh viên từ ID và gửi email
                                $student = $coordinatorModel->getStudentById($studentID);
                                $this->mailSingleStudent($student, $content, $title, $coorInfo);
                            }
                        }
                    } else {
                        // Gửi email cho tất cả sinh viên trong khoa nếu không có sinh viên được chọn
                        foreach ($students as $student) {
                            $coordinatorModel->sendMail($student['Stu_ID'], $coorInfo['Coor_ID'], $content);
                        }
                        $this->mailToAllStudent($content, $title, $coorInfo);
                    }
        
                    // Chuyển hướng sau khi gửi email
                    header('location: index.php?action=coordinator_index');
                    exit;
                }
        
                include 'views/coordinator_mail.php';
            }
        }
        

        public function mailSingleStudent($student, $content, $title, $coorInfo){
            $mail = new PHPMailer(true);
            try {
                //Server settings
                $mail->SMTPDebug = 0;
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;
                $mail->Username   = 'leduchuy22072002@gmail.com';
                $mail->Password   = 'utkziciechiujjxy';
                $mail->Port       = 587;
        
                //Recipients
                $mail->setFrom('leduchuy22072002@gmail.com', $coorInfo['Coor_FullName']);
                $mail->addAddress('huyldgbh200353@fpt.edu.vn');  // Thay đổi địa chỉ email tại đây
        
                //Content
                $mail->isHTML(true);
                $mail->Subject = 'New Coordinator Mail';
                $mail->Body    = '
                    <!DOCTYPE html>
                    <html lang="en">
                    <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
                    <style>
        
                    body {
                        font-family: Arial, sans-serif;
                        background-color: #f4f4f4;
                        margin: 0;
                        padding: 0;
                        box-sizing:border-box;
                    }
                    .container {
                        max-width: 600px;
                        margin: 20px auto;
                        background-color: #fff;
                        padding: 20px;
                        border-radius: 8px;
                        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                    }
                    h1 {
                        color: #8B008B;
                        text-align: center;
                    }
                    p {
                        color: #333;
                        font-size: 18px;
                    }
                    span {
                        color: #4B0082;
                        font-size: 17px;
                    }
                    </style>
                    </head>
                    <body>
                    <div class="container">
                        <h1>New Coordinator Mail</h1>
                        <p>Dear Student: <strong>' . $student['Stu_FullName'] . '</strong></p>
                        <p>My name is <strong>' . $coorInfo['Coor_FullName'] . '</strong></p>
                        <p> Title: <strong>' .$title.' </strong></p>
                        <p> Content: <strong>' .$content.' </strong></p>
                        <span>I hope student can reply as soon as possible</span>
                    </div>
                    </body>
                    </html>
                ';   
                $mail->send();
            } catch (Exception $e) {
        
            }
        }


        public function mailToAllStudent($content, $title, $coorInfo){
            $mail = new PHPMailer(true);
            try {
                //Server settings
                $mail->SMTPDebug = 0;
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;
                $mail->Username   = 'leduchuy22072002@gmail.com';
                $mail->Password   = 'utkziciechiujjxy';
                $mail->Port       = 587;
        
                //Recipients
                $mail->setFrom('leduchuy22072002@gmail.com', $coorInfo['Coor_FullName']);
                $mail->addAddress('huyldgbh200353@fpt.edu.vn');  // Thay đổi địa chỉ email tại đây
        
                //Content
                $mail->isHTML(true);
                $mail->Subject = 'New Coordinator Mail';
                $mail->Body    = '
                    <!DOCTYPE html>
                    <html lang="en">
                    <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
                    <style>
        
                    body {
                        font-family: Arial, sans-serif;
                        background-color: #f4f4f4;
                        margin: 0;
                        padding: 0;
                        box-sizing:border-box;
                    }
                    .container {
                        max-width: 600px;
                        margin: 20px auto;
                        background-color: #fff;
                        padding: 20px;
                        border-radius: 8px;
                        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                    }
                    h1 {
                        color: #8B008B;
                        text-align: center;
                    }
                    p {
                        color: #333;
                        font-size: 18px;
                    }
                    span {
                        color: #4B0082;
                        font-size: 17px;
                    }
                    </style>
                    </head>
                    <body>
                    <div class="container">
                        <h1>New Coordinator Mail</h1>
                        <p>Dear All Student,</p>
                        <p>My name is <strong>' . $coorInfo['Coor_FullName'] . '</strong></p>
                        <p> Title: <strong>' .$title.' </strong></p>
                        <p> Content: <strong>' .$content.' </strong></p>
                        <span>I hope student can reply as soon as possible</span>
                    </div>
                    </body>
                    </html>
                ';   
                $mail->send();
                // echo 'Message has been sent';
            } catch (Exception $e) {
        
            }
        }
    }  
?>