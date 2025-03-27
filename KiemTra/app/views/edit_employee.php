<?php
session_start();
require_once 'app/config/database.php'; // Kết nối đến cơ sở dữ liệu
require_once 'app/controllers/EmployeeController.php';

$controller = new EmployeeController($conn);

// Kiểm tra quyền admin
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    echo "Bạn không có quyền truy cập vào chức năng này.";
    exit();
}

// Lấy thông tin nhân viên cần chỉnh sửa
if (isset($_GET['id'])) {
    $employeeId = $_GET['id'];
    $employee = $controller->getEmployeeById($employeeId);
} else {
    echo "Không tìm thấy nhân viên.";
    exit();
}

// Xử lý cập nhật thông tin nhân viên
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = [
        'ma_nv' => $_POST['ma_nv'],
        'ten_nv' => $_POST['ten_nv'],
        'phai' => $_POST['phai'],
        'noi_sinh' => $_POST['noi_sinh'],
        'ma_phong' => $_POST['ma_phong'],
        'luong' => $_POST['luong']
    ];

    if ($controller->updateEmployee($data)) {
        header("Location: views/employee_list.php");
        exit();
    } else {
        echo "Có lỗi xảy ra khi cập nhật thông tin.";
    }
}
?>

<h2>Chỉnh Sửa Nhân Viên</h2>
<form method="post" action="">
    <input type="hidden" name="ma_nv" value="<?= $employee['Ma_NV'] ?>">
    Tên Nhân Viên: <input type="text" name="ten_nv" value="<?= $employee['Ten_NV'] ?>" required><br>
    Giới Tính: 
    <select name="phai" required>
        <option value="Nam" <?= $employee['Phai'] == 'Nam' ? 'selected' : '' ?>>Nam</option>
        <option value="Nữ" <?= $employee['Phai'] == 'Nữ' ? 'selected' : '' ?>>Nữ</option>
    </select><br>
    Nơi Sinh: <input type="text" name="noi_sinh" value="<?= $employee['Noi_Sinh'] ?>" required><br>
    Phòng: 
    <select name="ma_phong" required>
        <!-- Các phòng ban được lấy từ cơ sở dữ liệu -->
    </select><br>
    Lương: <input type="number" name="luong" value="<?= $employee['Luong'] ?>" required><br>
    <input type="submit" value="Cập Nhật">
</form>