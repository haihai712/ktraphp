<?php
session_start();
require_once 'students.php';

// Kiểm tra đăng nhập
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$edit = false;
if (isset($_GET['id'])) {
    $edit = true;
    $student = getStudent($_GET['id']);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    
    if ($edit) {
        updateStudent($id, $name, $age);
    } else {
        addStudent($id, $name, $age);
    }
    header("Location: student-list.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $edit ? 'Sửa' : 'Thêm'; ?> sinh viên</title>
</head>
<body>
    <h2><?php echo $edit ? 'Sửa' : 'Thêm'; ?> sinh viên</h2>
    <form method="POST">
        <label>Mã SV:</label><br>
        <input type="text" name="id" value="<?php echo $edit ? $student['id'] : ''; ?>" 
            <?php echo $edit ? 'readonly' : ''; ?> required><br>
        <label>Tên:</label><br>
        <input type="text" name="name" value="<?php echo $edit ? $student['name'] : ''; ?>" required><br>
        <label>Tuổi:</label><br>
        <input type="number" name="age" value="<?php echo $edit ? $student['age'] : ''; ?>" required><br>
        <input type="submit" value="<?php echo $edit ? 'Cập nhật' : 'Thêm'; ?>">
        <a href="student-list.php">Quay lại</a>
    </form>
</body>
</html>