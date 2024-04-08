<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require_once 'Models/StudentModel.php';
require_once 'Controllers/UserController.php';
use PhpOffice\PhpWord\IOFactory;
include 'PHPMailer/src/Exception.php';
include 'PHPMailer/src/PHPMailer.php';
include 'PHPMailer/src/SMTP.php';

    class StudentController{
        
        protected $model;

        public function __construct() {
            $this->model = new StudentModel();
            $user = new UserController();
        }

        public function student_add_contribution() {
            $studentModel = new StudentModel();
            $student= $studentModel -> getStudentbyUserName($_SESSION['username']);
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                
                $contributionName = $_POST['Con_Name'];
            
                $time = time();
                $currentTime = $time - (7 * 3600);
                $submissionDate = date('Y-m-d H:i:s', $currentTime);
                $status = $_POST['Con_Status'];
                $studentID = $student['Stu_ID'];
                $topicID = $_POST['Topic_ID'];
                $description = $_POST['Con_Description'];

                $fa_id = $student['Fa_ID'];
                $coordinator = $studentModel ->getCoordinatorAndStudentsByFaculty($fa_id);
                
                }
                if(isset($_FILES["Con_Image"]) && !empty($_FILES["Con_Image"]["tmp_name"])){
                            
                    $imageData = file_get_contents($_FILES["Con_Image"]["tmp_name"]);
                    }  else{
                        $imageData=null;
                    }
                    if(isset($_FILES["Con_Doc"]) && !empty($_FILES["Con_Doc"]["tmp_name"])) {
                    foreach ($_FILES['Con_Doc']['tmp_name'] as $key => $tmpName) {
                        // if(isset($_FILES["Con_Doc"]) && !empty($_FILES["Con_Doc"]["tmp_name"][ $key ])) {
                            $fileName = $_FILES['Con_Doc']['name'][$key];
                            $temp = $_FILES['Con_Doc']['tmp_name'][$key];
                            $uploadPath = "Upload/" . $fileName;
                        // }
                if (move_uploaded_file($temp, $uploadPath)) {
                            
                    $studentModel->addContribution($contributionName, $submissionDate, $status, $studentID, $uploadPath, $imageData, $topicID, $description);
                    $student= $studentModel->getStudentbyUserName($_SESSION['username']);
                    $this->mailNotiToCoordinator($student,$submissionDate,$contributionName,$topicID,$uploadPath, $coordinator);
                    header('location:index.php?action=student_contribution');
                }
                    // echo "File uploaded successfully.";
                else {
                    echo "Error uploading file.";
                }
            
        }
    }
        $topic = $studentModel ->getTopic($student["Fa_ID"]);
        include "views/student_add_contribution.php";
    }
        


    public function mailNotiToCoordinator($student,$submissionDate,$contributionName,$topicID,$uploadPath, $coordinator){
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
            $mail->setFrom('leduchuy22072002@gmail.com', $student['Stu_FullName']);
            $mail->addAddress('huyldgbh200353@fpt.edu.vn');            
            //Content
            $mail->isHTML(true);         
            $mail->addAttachment($uploadPath);                        
            $mail->Subject = 'New Contribution Notification';
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
                color: #333;
                text-align: center;
            }
            p {
                color: #333;
                font-size: 18px;
            }
            span {
                color: #333;
                font-size: 20px;
            }
            </style>
            </head>
            <body>
            <div class="container">
                <h1>New Contribution Uploaded</h1>
                <p>Dear Coordinator: ' . $coordinator['coordinator']['Coor_FullName'] . ',</p>
                <p>A new contribution has been uploaded by student <strong>' . $student['Stu_FullName'] . '</strong> on <strong>' . $submissionDate . '</strong>.</p>
                <p><strong>Contribution Name:</strong> ' . $contributionName . '</p>
                <span>Please log in and review them as soon as possible. </span>
                <span>(This is an automated message, please do not respond)</span>
            </div>
            </body>
            </html>
                        
                        
            ';   
            $mail->send();
            // echo 'Message has been sent';
        } catch (Exception $e) {
        
        }

    }

    public function indexStudent() {
        $user = new UserController();
        $is_login = $user->is_login();
        if($is_login == true && $_SESSION['role_id'] == 2 ) {
            $studentModel = new StudentModel();
            $studentInfo = $studentModel->getStudentByUsername($_SESSION['username']);
            $studentsInSameFaculty = $studentModel->getStudentsByFacultyExcludingCurrentUser($_SESSION['username']);
            $contribution = $studentModel->getContribution($_SESSION['username']);
            $numContribution = $studentModel->numberOfContribution($_SESSION['username']);
            // Chuyển thông tin sinh viên cho View để hiển thị
            include 'views/student_index.php';
        }
    }

    public function StudentProfile(){
        $user = new UserController();
        $is_login = $user->is_login();
        if ($is_login == true && $_SESSION['role_id'] == 2 ) {
            $studentModel = new StudentModel();

            $currentStudent = $studentModel->getStudentByUsername($_SESSION['username']);
        
            include 'views/student_profile.php';
        }

    }

    public function StudentEditProfile() {
        $user = new UserController();
        $is_login = $user->is_login();
        if ($is_login == true && $_SESSION['role_id'] == 2 ) {
            $studentModel = new StudentModel();
        
            $studentProfile = $studentModel->getStudentByUsername($_SESSION['username']);
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {  
                    // Xử lý tải ảnh mới hoặc sử dụng ảnh hiện tại
                    if(isset($_FILES["new_avatar"]) && !empty($_FILES["new_avatar"]["tmp_name"]))
                        { 
                            $file = $_FILES["new_avatar"];
                            $imageData = file_get_contents($_FILES["new_avatar"]["tmp_name"]);          
                        }
                        else{
                            $image = $_POST["avatar"];
                            $imageData = base64_decode($image);                  
                        }
                    
                    $id = $_POST['id'];
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $email = $_POST['email'];
                    $fullname = $_POST['fullname'];
                    $dob = $_POST['dob'];
                    $roleId = $_POST['role_id'];
                    $fa_id = $_POST['fa_id'];
                    
                    // Thực hiện cập nhật thông tin sinh viên
                    $studentModel->updateStudentProfile($id,$username, $password, $email, $fullname, $dob, $roleId, $fa_id, $imageData);
                    $_SESSION['username'] = $username;
                
                    header('Location: index.php?action=student_profile');
                    
            } else {
                
            } include 'views/student_edit_profile.php';
        }
        
    }
    public function People(){
        $user = new UserController();
        $is_login = $user->is_login();
        if ($is_login == true && $_SESSION['role_id'] == 2 ) {
            $studentModel = new StudentModel();

            $studentProfile = $studentModel->getStudentByUsername($_SESSION['username']);

            $fa_id = $studentProfile['Fa_ID'];

            $data = $studentModel->getCoordinatorAndStudentsByFaculty($fa_id);

            include 'views/student_faculty.php';
        }
    }

    public function FAQ(){
        $user = new UserController();
        $is_login = $user->is_login();
        if ($is_login== true && $_SESSION['role_id'] == 2 ) {
            $studentModel = new StudentModel();
            include 'views/student_faq.php';
        }
    }

    public function student_topic(){
        $user = new UserController();
        $is_login = $user->is_login();
        if ($is_login == true && $_SESSION['role_id'] == 2 ) {
            $studentModel = new StudentModel();
            $studentProfile = $studentModel->getStudentByUsername($_SESSION['username']);
        
            $topic = $studentModel->getTopic($studentProfile["Fa_ID"]);
            include 'views/student_topic.php';
        }
    }

    public function student_contribution(){
        $user = new UserController();
        $is_login = $user->is_login();
        if ($is_login == true && $_SESSION['role_id'] == 2 ) {
            $studentModel = new StudentModel();
            $studentContri = $studentModel->getAllContribution($_SESSION['username']);
            include 'views/student_contribution.php';
        }
    }



    public function student_update_contribution($id){
        $user = new UserController();
        $is_login = $user->is_login();
        if ($is_login == true && $_SESSION['role_id'] == 2 ) {
            $studentModel = new StudentModel();
            $contribution = $studentModel->getContributionByID($id);
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $con_id= $_POST['Con_ID'];
                $con_name = $_POST['Con_Name'];
                $con_des = $_POST['Con_Description'];
            
                if(isset($_FILES["New_Image"]) && !empty($_FILES["New_Image"]["tmp_name"])){
                            
                    $imageData = file_get_contents($_FILES["New_Image"]["tmp_name"]);
                    }  else{
                        $imageData=base64_decode($_POST['Con_Image']);
                    }
                    if(isset($_FILES["New_Con_Doc"]) && !empty($_FILES["New_Con_Doc"]["tmp_name"])) {
                                $fileName = $_FILES['New_Con_Doc']['name'];
                                $temp = $_FILES['New_Con_Doc']['tmp_name'];
                                $uploadPath = "Upload/" . $fileName;
                            } else {
                                $fileName = $_FILES['Con_Doc']['name'];
                                $temp = $_FILES['Con_Doc']['tmp_name'];
                                $uploadPath = "Upload/" . $fileName;
                            }
                    if (move_uploaded_file($temp, $uploadPath)) {
                                $studentModel -> updateContribution($con_id,$con_name,$con_des,$imageData, $uploadPath);
                    header("location: index.php?action=student_contribution");
                    exit;
                    }
                }
            include 'views/student_update_contribution.php';
            
        }
    }

    public function student_delete_contribution($id){
        $user = new UserController();
        $is_login = $user->is_login();
        if ($is_login == true && $_SESSION['role_id'] == 2 ) {
            $studentModel = new StudentModel();
            $studentModel->deleteContribution($id);
            header('Location: index.php?action=student_contribution');
            exit();
        }
    }

    public function student_contribution_detail($id){
        $user = new UserController();
        $is_login = $user->is_login();
        if ($is_login == true && $_SESSION['role_id'] == 2 ) {
            $studentModel = new StudentModel();
            
            $studentContri = $studentModel->getContributionDetail($id);
            include 'views/student_contribution_detail.php';
        }
    }

    public function student_conditional(){
        $user = new UserController();
        $is_login = $user->is_login();
        if ($is_login == true && $_SESSION['role_id'] == 2 ) {
            $studentModel = new StudentModel();
            include 'views/student_conditional.php';
        }
    }

    public function student_mail(){
        $user = new UserController();
        $is_login = $user->is_login();
        if ($is_login == true && $_SESSION['role_id'] == 2 ) {
            $studentModel = new StudentModel();
            $Student = $studentModel->getStudentbyUserName($_SESSION['username']);
            // $stuname = $Student['Stu_FullName'];
            $Stu_ID = $Student['Stu_ID'];
            $Stu_fa = $Student['Fa_ID'];
            $Coor = $studentModel->getCoorIDByFaculty($Stu_fa);
            $Coor_ID = $Coor['Coor_ID'];
            $fa_id = $Student['Fa_ID'];
            $coorname = $studentModel ->getCoordinatorAndStudentsByFaculty($fa_id);
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $content = $_POST['content'];
                $title = $_POST['title'];
                $studentModel->sendmail($Stu_ID, $Coor_ID, $content);
                $this ->sendmailtoCoor($Student,$title,$content, $coorname);
                $_SESSION['noti'] = "email has been sent";
                header('location: index.php?action=student_index');
            
                exit;
            }
        
            include 'views/student_mail.php';
        }
    }

    public function sendmailtoCoor($Student,$title,$content, $coorname){
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
            $mail->setFrom('leduchuy22072002@gmail.com',$Student);
            $mail->addAddress('huyldgbh200353@fpt.edu.vn');            
            //Content
            $mail->isHTML(true);                              
            $mail->Subject = 'New Student Mail';
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
                <h1>New Student Mail</h1>
                <p>Dear Coordinator: <strong>' . $coorname['coordinator']['Coor_FullName'] . '</strong></p>
                <p>My name is <strong>' . $Student['Stu_FullName'] . '</strong></p>
                <p> Title: <strong>' .$title.' </strong></p>
                <p> Content: <strong>' .$content.' </strong></p>
                <span>I hope the coordinator can reply as soon as possible</span>
            </div>
            </body>
            </html>
            ';   
            $mail->send();
            // echo 'Message has been sent';
        } catch (Exception $e) {
            
        }
    
    }

    public function viewdoc($id){
        $studentModel = new StudentModel();
        $contribution = $studentModel->getContributionByID($id);
        
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
    
        include 'views/showDocx.php';
    }


    }
?>