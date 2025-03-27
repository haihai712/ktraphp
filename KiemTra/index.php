<?php
require_once 'app/config/database.php'; // Kết nối đến cơ sở dữ liệu
require_once 'app/controllers/EmployeeController.php';

// Thực hiện logic điều hướng và điều khiển ở đây
$controller = new EmployeeController($conn);

// Xử lý thêm nhân viên
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['action']) && $_GET['action'] == 'add') {
    // Lấy dữ liệu từ biểu mẫu
    $ma_nv = $_POST['ma_nv'];
    $ten_nv = $_POST['ten_nv']; // Lấy tên nhân viên
    $phai = $_POST['phai'];
    $noi_sinh = $_POST['noi_sinh'];
    $ma_phong = $_POST['ma_phong'];
    $luong = $_POST['luong'];

    // Thêm nhân viên vào cơ sở dữ liệu
    if ($controller->addEmployee([
        'ma_nv' => $ma_nv,
        'ten_nv' => $ten_nv, // Thêm tên nhân viên vào dữ liệu
        'phai' => $phai,
        'noi_sinh' => $noi_sinh,
        'ma_phong' => $ma_phong,
        'luong' => $luong
    ])) {
        header("Location: views/employee_list.php");
        exit();
    } else {
        echo "Có lỗi xảy ra khi thêm nhân viên.";
    }
}

// Xử lý phân trang
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 5; // Số lượng nhân viên mỗi trang
$totalEmployees = $controller->getTotalEmployees(); // Lấy tổng số nhân viên
$totalPages = ceil($totalEmployees / $limit); // Tính số trang

// Lấy danh sách nhân viên cho trang hiện tại
$employees = $controller->listEmployees($page, $limit);

// Chuyển đến view
require_once 'app/views/employee_list.php';
?>