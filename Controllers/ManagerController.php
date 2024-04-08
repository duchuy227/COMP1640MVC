<?php
    require_once 'Models/ManagerModel.php';
    require_once 'UserController.php';

    class ManagerController {
        private  $is_login;
        public function __construct() {
            $usercontroller = new UserController();
            $this->is_login = $usercontroller->is_login();
        }

        public function manager_index() {
            // Kiểm tra xem người dùng đã đăng nhập và có quyền là manager hay không
            if ($this->is_login == true && $_SESSION['role_id'] == 3) {
                // Tạo một đối tượng ManagerModel
                $managerModel = new ManagerModel();
        
                // Gọi hàm để lấy thông tin của manager hiện tại dựa trên username từ session
                $ManagerProfile = $managerModel->getManagerbyUserName($_SESSION['username']);
        
                // Include view và truyền dữ liệu ManagerProfile
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
    }
?>