<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    echo "Bạn không có quyền truy cập vào chức năng này.";
    exit();
}
?>


<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Nhân Viên</title>
</head>
<body>

<h2>Thêm Nhân Viên</h2>

<form method="post" action="index.php?action=add">
    Mã Nhân Viên: <input type="text" name="ma_nv" required><br>
    Tên Nhân Viên: <input type="text" name="ten_nv" required><br> <!-- Thêm trường nhập tên -->
    Giới Tính: <input type="text" name="phai" required><br>
    Nơi Sinh: <input type="text" name="noi_sinh" required><br>
    Phòng: 
    <select name="ma_phong" required>
        <?php
        // Lấy danh sách phòng ban từ cơ sở dữ liệu
        $sql = "SELECT * FROM phongban";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            echo "<option value='{$row['Ma_Phong']}'>{$row['Ten_Phong']}</option>";
        }
        ?>
    </select><br>
    Lương: <input type="number" name="luong" required><br>
    <input type="submit" value="Thêm Nhân Viên">
</form>

<a href="index.php">Quay lại danh sách nhân viên</a>

</body>
</html>