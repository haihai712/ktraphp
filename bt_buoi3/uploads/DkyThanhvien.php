<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Ký Thành Viên</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            width: 50%;
            margin: auto;
        }
        .container {
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 10px;
            background-color: #f9f9f9;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            font-weight: bold;
        }
        input, textarea, select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            padding: 10px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }
        .btn-submit {
            background-color: blue;
            color: white;
        }
        .btn-reset {
            background-color: red;
            color: white;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>ĐĂNG KÝ THÀNH VIÊN</h2>
    <form action="process.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="username">Tên truy cập:</label>
            <input type="text" id="username" name="username" required>
        </div>
        
        <div class="form-group">
            <label for="password">Mật khẩu:</label>
            <input type="password" id="password" name="password" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>

        <div class="form-group">
            <label>Phái:</label><br>
            <input type="radio" name="gender" value="Nam" required> Nam
            <input type="radio" name="gender" value="Nữ"> Nữ
        </div>

        <div class="form-group">
            <label>Sở thích:</label><br>
            <input type="checkbox" name="hobbies[]" value="Nhìn mưa rơi"> Nhìn mưa rơi
            <input type="checkbox" name="hobbies[]" value="Nghe chim hót"> Nghe chim hót
            <input type="checkbox" name="hobbies[]" value="Ngắm máy bay"> Ngắm máy bay
        </div>

        <div class="form-group">
            <label for="image">Hình ảnh:</label>
            <input type="file" id="image" name="image">
        </div>

        <div class="form-group">
            <label for="job">Nghề nghiệp:</label>
            <input type="text" id="job" name="job">
        </div>

        <div class="form-group">
            <label for="about">Giới thiệu bản thân:</label>
            <textarea id="about" name="about" rows="4"></textarea>
        </div>

        <button type="submit" class="btn-submit">Đăng ký</button>
<button type="reset" class="btn-reset">Làm lại</button>
    </form>
</div>

</body>
</html>
