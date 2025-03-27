<?php
session_start();
require_once 'students.php';

// Kiểm tra đăng nhập
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Danh sách sinh viên</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h2>Chào mừng <?php echo $_SESSION['username']; ?></h2>
    <a href="student-add.php">Thêm sinh viên</a> | 
    <a href="login.php?logout=1">Đăng xuất</a>
    
    <h3>Danh sách sinh viên</h3>
    <table>
        <tr>
            <th>Mã SV</th>
            <th>Tên</th>
            <th>Tuổi</th>
            <th>Hành động</th>
        </tr>
        <?php
        $students = getStudents();
        foreach ($students as $student) {
            echo "<tr>";
            echo "<td>" . $student['id'] . "</td>";
            echo "<td>" . $student['name'] . "</td>";
            echo "<td>" . $student['age'] . "</td>";
            echo "<td>";
            echo "<a href='student-add.php?id=" . $student['id'] . "'>Sửa</a> ";
            echo "<a href='student-delete.php?id=" . $student['id'] . "' onclick='return confirm(\"Bạn có chắc muốn xóa?\")'>Xóa</a>";
            echo "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>