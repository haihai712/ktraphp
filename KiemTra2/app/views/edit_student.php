<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Sửa Sinh Viên</title>
</head>
<body>

<div class="container mt-4">
    <h1>Sửa Sinh Viên</h1>
    <form method="POST">
        <input type="hidden" name="MaSV" value="<?php echo $student['MaSV']; ?>">
        <div class="form-group">
            <label for="HoTen">Họ Tên:</label>
            <input type="text" class="form-control" id="HoTen" name="HoTen" value="<?php echo $student['HoTen']; ?>" required>
        </div>
        <div class="form-group">
            <label for="GioiTinh">Giới Tính:</label>
            <input type="text" class="form-control" id="GioiTinh" name="GioiTinh" value="<?php echo $student['GioiTinh']; ?>" required>
        </div>
        <div class="form-group">
            <label for="NgaySinh">Ngày Sinh:</label>
            <input type="date" class="form-control" id="NgaySinh" name="NgaySinh" value="<?php echo $student['NgaySinh']; ?>" required>
        </div>
        <div class="form-group">
            <label for="Hinh">Hình:</label>
            <input type="text" class="form-control" id="Hinh" name="Hinh" value="<?php echo $student['Hinh']; ?>" required>
        </div>
        <div class="form-group">
            <label for="MaNganh">Mã Ngành:</label>
            <input type="text" class="form-control" id="MaNganh" name="MaNganh" value="<?php echo $student['MaNganh']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Cập Nhật</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>