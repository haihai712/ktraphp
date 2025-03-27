<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars($_POST["username"]);
    $password = htmlspecialchars($_POST["password"]); // Không nên hiển thị
    $email = htmlspecialchars($_POST["email"]);
    $gender = isset($_POST["gender"]) ? $_POST["gender"] : "Không xác định";
    $hobbies = isset($_POST["hobbies"]) ? $_POST["hobbies"] : [];
    $job = htmlspecialchars($_POST["job"]);
    $about = nl2br(htmlspecialchars($_POST["about"]));

    // Xử lý hình ảnh
    $imagePath = "";
    if (!empty($_FILES["image"]["name"])) {
        $uploadDir = "uploads/";
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }
        $imagePath = $uploadDir . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath);
    }
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông Tin Đăng Ký</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: white;
            width: 50%;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h2 {
            color: #333;
        }
        .info {
            text-align: left;
            margin-top: 20px;
        }
        .info p {
            margin: 10px 0;
            font-size: 16px;
        }
        .highlight {
            font-weight: bold;
            color: #007bff;
        }
        .image-container {
            margin-top: 15px;
        }
        .image-container img {
            width: 150px;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
        }
        .btn {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Thông Tin Đăng Ký</h2>
    <div class="info">
        <p><span class="highlight">Tên truy cập:</span> <?= $username; ?></p>
        <p><span class="highlight">Email:</span> <?= $email; ?></p>
        <p><span class="highlight">Phái:</span> <?= $gender; ?></p>
        <p><span class="highlight">Sở thích:</span> <?= !empty($hobbies) ? implode(", ", $hobbies) : "Không có"; ?></p>
        <p><span class="highlight">Nghề nghiệp:</span> <?= $job; ?></p>
        <p><span class="highlight">Giới thiệu bản thân:</span> <?= $about; ?></p>

        <?php if ($imagePath): ?>
            <div class="image-container">
                <p><span class="highlight">Hình ảnh:</span></p>
                <img src="<?= $imagePath; ?>" alt="Uploaded Image">
            </div>
        <?php else: ?>
            <p><span class="highlight">Hình ảnh:</span> Không có ảnh</p>
        <?php endif; ?>
    </div>
    
    <a href="DkyThanhvien.php" class="btn">Quay lại trang đăng ký</a>
</div>

</body>
</html>
<?php
} else {
    echo "<p>Không có dữ liệu được gửi.</p>";
}
?>
