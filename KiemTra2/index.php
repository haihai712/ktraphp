<?php
require_once 'app/config/database.php';
require_once 'app/controllers/SinhvienController.php';
require_once 'app/controllers/LoginController.php';
require_once 'app/controllers/HocphanController.php';

$database = new Database();
$db = $database->dbConnection();
$sinhVienController = new SinhVienController($db);
$loginController = new LoginController($db);
$hocphanController = new HocPhanController($db);

$action = $_GET['action'] ?? 'index';

switch ($action) {
    case 'create':
        $sinhVienController->create();
        break;
    case 'edit':
        $sinhVienController->edit();
        break;
    case 'delete':
        $sinhVienController->delete();
        break;
    case 'detail':
        $sinhVienController->detail();
        break;
    case 'login':
        $loginController->login(); // Gọi phương thức login trong LoginController
        break;       
    
    default:
        $sinhVienController->index();
        break;
}
?>