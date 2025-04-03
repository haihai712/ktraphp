<?php
session_start();
if (isset($_SESSION['role'])) {
    header("Location: employee_list.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 50px;
        }
        .login-container {
            max-width: 400px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<div class="login-container">
    <h2>Đăng Nhập</h2>
    <form method="post" action="login.php">
        <input type="text" name="username" placeholder="Tên Đăng Nhập" required>
        <input type="password" name="password" placeholder="Mật Khẩu" required>
        <input type="submit" value="Đăng Nhập">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        require_once 'app/config/database.php'; // Kết nối đến cơ sở dữ liệu

        $username = $_POST['username'];
        $password = $_POST['password'];

        // Truy vấn để lấy thông tin người dùng
        $sql = "SELECT * FROM user WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            // Kiểm tra mật khẩu
            if (password_verify($password, $user['password'])) {
                // Lưu thông tin người dùng vào session
                $_SESSION['user_id'] = $user['Id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['fullname'] = $user['fullname'];
                $_SESSION['role'] = $user['role'];
                header("Location: employee_list.php"); // Chuyển hướng đến danh sách nhân viên
                exit();
            } else {
                echo "<p style='color:red;'>Mật khẩu không chính xác.</p>";
            }
        } else {
            echo "<p style='color:red;'>Tài khoản không tồn tại.</p>";
        }
    }
    ?>
</div>

</body>
</html>