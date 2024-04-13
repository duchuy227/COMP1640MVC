<?php
session_start();

$action = $_GET['action'] ?? 'index';

switch ($action) {
    // admin
    case 'index':
        if($_SESSION['is_login']== true && $_SESSION['role_id']== 1){
            header("Location: admin_index.php");
            exit;
        }
        else{
            header("Location:./views/university_index.php ");
            exit;
        }
      
    case 'admin':
        require_once 'Controllers/AdminController.php';
        $adminController = new AdminController();
        $adminController->indexAdmin();
        break;
    
    case 'update_admin':
        require_once 'Controllers/AdminController.php';
        $adminController = new AdminController();
        $adminController->update_admin($_GET['id']);
        break;
    
    case 'admin_statistics':
        require_once 'Controllers/AdminController.php';
        $adminController = new AdminController();
        $adminController->admin_statistics();
        break;
    
    case 'admin_topic':
        require_once 'Controllers/AdminController.php';
        $adminController = new AdminController();
        $adminController->admin_topic();
        break;
    
    case 'admin_topic_detail':
        require_once 'Controllers/AdminController.php';
        $adminController = new AdminController();
        $adminController->admin_topic_detail($_GET['id']);
        break;
    
    case 'admin_add_topic':
        require_once 'Controllers/AdminController.php';
        $adminController = new AdminController();
        $adminController->admin_add_topic();
        break;
    
    case 'admin_edit_topic':
        require_once 'Controllers/AdminController.php';
        $adminController = new AdminController();
        $adminController->admin_edit_topic($_GET['id']);
        break;
    
    case 'admin_delete_topic':
        require_once 'Controllers/AdminController.php';
        $adminController = new AdminController();
        $adminController->admin_delete_topic($_GET['id']);
        break;

    case 'admin_magazine':
        require_once 'Controllers/AdminController.php';
        $adminController = new AdminController();
        $adminController->admin_magazine();
        break;
        
    
    case 'admin_magazine_detail':
        require_once 'Controllers/AdminController.php';
        $adminController = new AdminController();
        $adminController->admin_magazine_detail($_GET['id']);
        break;
    
    case 'viewdocc':
        require_once 'Controllers/AdminController.php';
        $adminController = new AdminController();
        $adminController -> viewdocc($_GET['id']);
        break;
    
    case 'admin_faculty':
        require_once 'Controllers/AdminController.php';
        $adminController = new AdminController();
        $adminController -> faculty();
        break;
   
    case 'insert_manager':
        require_once 'Controllers/AdminController.php';
        $adminController = new AdminController();
        $adminController->insert_manager();
        break;
   
    case 'update_manager':
        require_once 'Controllers/AdminController.php';
        $adminController = new AdminController();
        $adminController->update_manager($_GET['id']);
        break;
    case 'delete_manager':
        require_once 'Controllers/AdminController.php';
        $adminController = new AdminController();
        $adminController->delete_manager($_GET['id']);
        break;
    case 'student':
            require_once 'Controllers/AdminController.php';
            $adminController = new AdminController();
            $adminController->indexStudent();
            break;  
    case 'manager':
            require_once 'Controllers/AdminController.php';
            $adminController = new AdminController();
            $adminController->indexManager();
            break;   

    case 'insert_student':
        require_once 'Controllers/AdminController.php';
        $adminController = new AdminController();
        $adminController->insert_student();
        break;
   
    case 'update_student':
        require_once 'Controllers/AdminController.php';
        $adminController = new AdminController();
        $adminController->update_student($_GET['id']);
        break;
    case 'delete_student':
        require_once 'Controllers/AdminController.php';
        $adminController = new AdminController();
        $adminController->delete_student($_GET['id']);
        break;
    

    case 'coordinator':
        require_once 'Controllers/AdminController.php';
        $adminController = new AdminController();
        $adminController->indexCoordinator();
        break;  
    case 'insert_coordinator':
        require_once 'Controllers/AdminController.php';
        $adminController = new AdminController();
        $adminController->insert_coordinator();
        break;     
    case 'update_coordinator':
        require_once 'Controllers/AdminController.php';
        $adminController = new AdminController();
        $adminController->update_coordinator($_GET['id']);
        break;
    case 'delete_coordinator':
        require_once 'Controllers/AdminController.php';
        $adminController = new AdminController();
        $adminController->delete_coordinator($_GET['id']);
        break;
 
    case 'login':    
        require_once 'Controllers/UserController.php';
        $UserController = new UserController();
        $UserController->login();
        break;

    case 'register':
        require_once 'Controllers/UserController.php';
        $UserController = new UserController();
        $UserController->register();     
        break;  

    case 'logout':
        require_once 'Controllers/UserController.php';
        $UserController = new UserController();
        $UserController->logout();
        break;

            // student
        case 'student_index':
            require_once 'Controllers/StudentController.php';
            $StudentController = new StudentController();
            $StudentController ->indexStudent();
            break;
        
        case 'student_profile':
            require_once 'Controllers/StudentController.php';
            $StudentController = new StudentController();
            $StudentController -> StudentProfile();
            break;
        
        case 'student_edit_profile':
            require_once 'Controllers/StudentController.php';
            $StudentController = new StudentController();
            $StudentController -> StudentEditProfile();
            break;
        
        case 'student_faculty':
            require_once 'Controllers/StudentController.php';
            $StudentController = new StudentController();
            $StudentController -> People();
            break;
    
        case 'student_faq':
            require_once 'Controllers/StudentController.php';
            $StudentController = new StudentController();
            $StudentController -> FAQ();
            break;
        
        case 'student_topic':
            require_once 'Controllers/StudentController.php';
            $StudentController = new StudentController();
            $StudentController -> student_topic();
            break;
        
        case 'student_contribution':
            require_once 'Controllers/StudentController.php';
            $StudentController = new StudentController();
            $StudentController -> student_contribution();
            break;
        
        case 'student_add_contribution':
            require_once 'Controllers/StudentController.php';
            $StudentController = new StudentController();
            $StudentController -> student_add_contribution();
            break;
        
        case 'student_update_contribution':
            require_once 'Controllers/StudentController.php';
            $StudentController = new StudentController();
            $StudentController -> student_update_contribution($_GET['id']);
            break;
    
        case 'student_delete_contribution':
            require_once 'Controllers/StudentController.php';
            $StudentController = new StudentController();
            $StudentController -> student_delete_contribution($_GET['id']);
            break;
        
        case 'student_contribution_detail':
            require_once 'Controllers/StudentController.php';
            $StudentController = new StudentController();
            $StudentController -> student_contribution_detail($_GET['id']);
            break;
    
        case 'student_conditional':
            require_once 'Controllers/StudentController.php';
            $StudentController = new StudentController();
            $StudentController -> student_conditional();
            break;
        
        case 'student_mail':
            require_once 'Controllers/StudentController.php';
            $StudentController = new StudentController();
            $StudentController -> student_mail();
            break;
            
        case 'viewdoc':
            require_once 'Controllers/StudentController.php';
            $StudentController = new StudentController();
            $StudentController -> viewdoc($_GET['id']);
            break;
    

        /////////////////////////////////////
        // coordinator
        case 'coordinator_index':
            require_once 'Controllers/CoordinatorController.php';
            $CoordinatorController = new CoordinatorController();
            $CoordinatorController->coordinator_index();
            break;
        
        case 'coordinator_student':
            require_once 'Controllers/CoordinatorController.php';
            $CoordinatorController = new CoordinatorController();
            $CoordinatorController->coordinator_student();
            break;
        
        case 'coordinator_profile':
            require_once 'Controllers/CoordinatorController.php';
            $CoordinatorController = new CoordinatorController();
            $CoordinatorController->coordinator_profile();
            break;
        
        case 'coordinator_edit_profile':
            require_once 'Controllers/CoordinatorController.php';
            $CoordinatorController = new CoordinatorController();
            $CoordinatorController->coordinator_edit_profile();
            break;
        
        // case 'coordinator_edit_student':
        //     require_once 'Controllers/CoordinatorController.php';
        //     $CoordinatorController = new CoordinatorController();
        //     $CoordinatorController->coordinator_edit_student($_GET['id']);
        //     break;
        
        case 'coordinator_contribution':
            require_once 'Controllers/CoordinatorController.php';
            $CoordinatorController = new CoordinatorController();
            $CoordinatorController->coordinator_contribution();
            break;

        case 'coordinator_mail':
            require_once 'Controllers/CoordinatorController.php';
            $CoordinatorController = new CoordinatorController();
            $CoordinatorController->coordinator_mail();
            break;
        
        case 'coordinator_update_contribution':
            require_once 'Controllers/CoordinatorController.php';
            $CoordinatorController = new CoordinatorController();
            $CoordinatorController -> coor_update_contribution($_GET['id']);
            break;
        
        case 'coordinator_contribution_detail':
            require_once 'Controllers/CoordinatorController.php';
            $CoordinatorController = new CoordinatorController();
            $CoordinatorController -> coor_contribution_detail($_GET['id']);
            break;
        
        case 'viewdocx':
            require_once 'Controllers/CoordinatorController.php';
            $CoordinatorController = new CoordinatorController();
            $CoordinatorController -> viewdocx($_GET['id']);
            break;

        case 'coordinator_add_comment':
            require_once 'Controllers/CoordinatorController.php';
            $CoordinatorController = new CoordinatorController();
            $CoordinatorController->add_comment($_GET['id']);
            break;

        case 'delete_contribution':
            require_once 'Controllers/CoordinatorController.php';
            $CoordinatorController = new CoordinatorController();
            $CoordinatorController->delete($_GET['id']);
            break;


        /// Manager ///

        case 'manager_index':
            require_once 'Controllers/ManagerController.php';
            $ManagerController = new ManagerController();
            $ManagerController -> manager_index();
            break;
        
        case 'manager_profile':
            require_once 'Controllers/ManagerController.php';
            $ManagerController = new ManagerController();
            $ManagerController -> manager_profile();
            break;
        
        case 'manager_view_faculty':
            require_once 'Controllers/ManagerController.php';
            $ManagerController = new ManagerController();
            $ManagerController -> manager_view_faculty($_GET['fa']);
            break;
        
        case 'manager_edit_student':
            require_once 'Controllers/ManagerController.php';
            $ManagerController = new ManagerController();
            $ManagerController -> manager_edit_student($_GET['id']);
            break;
        
        case 'manager_update_coordinator':
            require_once 'Controllers/ManagerController.php';
            $ManagerController = new ManagerController();
            $ManagerController -> manager_edit_coordinator($_GET['id']);
            break;
        
        case 'manager_view_contribution':
            require_once 'Controllers/ManagerController.php';                       
            $ManagerController = new ManagerController();
            $ManagerController -> manager_view_contribution($_GET['id']);
            break;

        case 'download_zip':
            require_once 'Controllers/ManagerController.php';
            $ManagerController = new ManagerController();
            $ManagerController-> download();
            break;

        case 'manager_statistics':
            require_once 'Controllers/ManagerController.php';
            $ManagerController = new ManagerController();
            $ManagerController-> chart();
            break;

        case 'manager_edit_profile':
            require_once 'Controllers/ManagerController.php';
            $ManagerController = new ManagerController();
            $ManagerController-> manager_edit_profile();
            break;
        
        case 'manager_topic':
            require_once 'Controllers/ManagerController.php';
            $ManagerController = new ManagerController();
            $ManagerController-> manager_topic();
            break;
        
        case 'manager_topic_detail':
            require_once 'Controllers/ManagerController.php';
            $ManagerController = new ManagerController();
            $ManagerController-> manager_topic_detail($_GET['id']);
            break;
            //////// End manager //////////
    default:
        echo 'Error: Unknown action';
        break;
}
?>
