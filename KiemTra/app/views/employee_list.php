<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    $isAdmin = false;
} else {
    $isAdmin = true;
}

// Kết nối đến cơ sở dữ liệu
require_once 'app/config/database.php';

// Số lượng nhân viên mỗi trang
$limit = 5; 
// Lấy số trang từ URL, nếu không có thì mặc định là 1
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Truy vấn để lấy tổng số nhân viên
$totalResult = $conn->query("SELECT COUNT(*) as total FROM nhanvien");
$totalRow = $totalResult->fetch_assoc();
$totalEmployees = $totalRow['total'];
$totalPages = ceil($totalEmployees / $limit);

// Truy vấn để lấy danh sách nhân viên với phân trang
$sql = "SELECT * FROM nhanvien LIMIT $limit OFFSET $offset"; 
$result = $conn->query($sql);
$employees = $result->fetch_all(MYSQLI_ASSOC);
?>

<?php
$genderImages = [
    'Nam' => 'man.jpg',
    'Nữ' => 'woman.jpg',
    // Có thể thêm giới tính khác nếu cần
];
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Nhân Viên</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        img {
            width: 30px;
            height: 30px;
        }
        .action-links a {
            margin: 0 5px;
            text-decoration: none;
            color: #fff;
            background-color: #e74c3c;
            padding: 5px 10px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .action-links a:hover {
            background-color: #c0392b;
        }
        .pagination {
            text-align: center;
            margin: 20px 0;
        }
        .pagination a {
            margin: 0 5px;
            text-decoration: none;
            padding: 8px 12px;
            border: 1px solid #4CAF50;
            color: #4CAF50;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .pagination a:hover {
            background-color: #4CAF50;
            color: white;
        }
        .login-button {
            display: block;
            text-align: center;
            margin: 20px;
            background-color: #007BFF;
            color: white;
            padding: 10px;
            border-radius: 5px;
            text-decoration: none;
        }
        .login-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<h2>THÔNG TIN NHÂN VIÊN</h2>

<table border="1">
    <tr>
        <th>Mã Nhân Viên</th>
        <th>Tên Nhân Viên</th>
        <th>Giới Tính</th>
        <th>Nơi Sinh</th>
        <th>Phòng</th>
        <th>Lương</th>
        <th>Action</th>
    </tr>
    <?php foreach ($employees as $employee): ?>
        <tr>
            <td><?= $employee['Ma_NV'] ?></td>
            <td><?= $employee['Ten_NV'] ?></td>
            <td>
                <img src='img/<?= isset($genderImages[$employee['Phai']]) ? $genderImages[$employee['Phai']] : 'default.jpg' ?>' alt='<?= $employee['Phai'] ?>'>
            </td>
            <td><?= $employee['Noi_Sinh'] ?></td>
            <td><?= $employee['Ma_Phong'] ?></td>
            <td><?= number_format($employee['Luong'], 0, ',', '.') ?> VNĐ</td>
            <td class="action-links">
                <?php if ($isAdmin): ?>
                    <a href='edit_employee.php?id=<?= $employee['Ma_NV'] ?>'>Sửa</a>
                    <a href='delete.php?id=<?= $employee['Ma_NV'] ?>' onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa</a>
                <?php else: ?>
                    <span style="color: gray;">Không có quyền</span>
                <?php endif; ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<!-- Phân trang -->
<div class="pagination">
    <?php if ($page > 1): ?>
        <a href="?page=<?= $page - 1 ?>">Trang Trước</a>
    <?php endif; ?>

    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
        <a href="?page=<?= $i ?>" <?= ($i == $page) ? 'style="font-weight: bold;"' : '' ?>><?= $i ?></a>
    <?php endfor; ?>

    <?php if ($page < $totalPages): ?>
        <a href="?page=<?= $page + 1 ?>">Trang Sau</a>
    <?php endif; ?>
</div>

<?php if ($isAdmin): ?>
    <a href="app/views/add_employee.php" style="display: block; text-align: center; margin: 20px; background-color: #4CAF50; color: white; padding: 10px; border-radius: 5px; text-decoration: none;">Thêm Nhân Viên</a>
<?php endif; ?>
<a href="login.php" class="login-button">Đăng Nhập</a>
<a href="logout.php" style="display: block; text-align: center; margin: 20px; background-color: #e74c3c; color: white; padding: 10px; border-radius: 5px; text-decoration: none;">Đăng Xuất</a>

</body>
</html>