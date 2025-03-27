<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = "Huynh Phuoc Hai";
    $password = $_POST['password'];
    
    // Kiểm tra thông tin đăng nhập (ở đây fix cứng để demo)
    if ($username && $password === "123") {
        $_SESSION['username'] = $username;
        header("Location: student-list.php");
        exit();
    } else {
        $error = "Tên đăng nhập hoặc mật khẩu không đúng!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Đăng nhập</title>
</head>
<body>
    <h2>Đăng nhập</h2>
    <?php if(isset($error)) echo "<p style='color:red'>$error</p>"; ?>
    <form method="POST">
        <label>Tên sinh viên:</label><br>
        <input type="text" name="username" value="Huynh Phuoc Hai"><br>
        <label>Mật khẩu:</label><br>
        <input type="password" name="password" required><br>
        <input type="submit" value="Đăng nhập">
    </form>
</body>
</html>