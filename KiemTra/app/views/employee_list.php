<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    $isAdmin = false;
} else {
    $isAdmin = true;
}

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
            <td><img src='img/<?= ($employee['Phai'] == 'Nữ') ? 'woman.jpg' : 'man.jpg' ?>' alt='<?= $employee['Phai'] ?>'></td>
            <td><?= $employee['Noi_Sinh'] ?></td>
            <td><?= $employee['Ten_Phong'] ?></td>
            <td><?= $employee['Luong'] ?></td>
            <td class="action-links">
                <?php if ($isAdmin): ?>
                    <a href='edit_employee.php?id=<?= $employee['Ma_NV'] ?>'>Sửa</a>
                    <a href='delete.php?id=<?= $employee['Ma_NV'] ?>'>Xóa</a>
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
        <a href="?page=<?= $i ?>"><?= $i ?></a>
    <?php endfor; ?>

    <?php if ($page < $totalPages): ?>
        <a href="?page=<?= $page + 1 ?>">Trang Sau</a>
    <?php endif; ?>
</div>

<a href="app/views/add_employee.php" style="display: block; text-align: center; margin: 20px; background-color: #4CAF50; color: white; padding: 10px; border-radius: 5px; text-decoration: none;">Thêm Nhân Viên</a>

</body>
</html>