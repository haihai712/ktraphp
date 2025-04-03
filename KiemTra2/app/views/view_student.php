<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Chi Tiết Sinh Viên</title>
</head>
<body>

<div class="container mt-4">
    <h1>Chi Tiết Sinh Viên</h1>
    <p><strong>Mã SV:</strong> <?php echo $student['MaSV']; ?></p>
    <p><strong>Họ Tên:</strong> <?php echo $student['HoTen']; ?></p>
    <p><strong>Giới Tính:</strong> <?php echo $student['GioiTinh']; ?></p>
    <p><strong>Ngày Sinh:</strong> <?php echo $student['NgaySinh']; ?></p>
    <p><strong>Hình:</strong> <img src="<?php echo $student['Hinh']; ?>" alt="Hình sinh viên" width="100"></p>
    <p><strong>Mã Ngành:</strong> <?php echo $student['MaNganh']; ?></p>
    <a href="index.php?action=index" class="btn btn-primary">Trở lại</a>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>