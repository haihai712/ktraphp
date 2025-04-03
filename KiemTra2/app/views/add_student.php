<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Thêm Sinh Viên</title>
</head>
<body>

<div class="container mt-4">
    <h1>Thêm Sinh Viên</h1>
    <form method="POST">
        <div class="form-group">
            <label for="MaSV">Mã SV:</label>
            <input type="text" class="form-control" id="MaSV" name="MaSV" required>
        </div>
        <div class="form-group">
            <label for="HoTen">Họ Tên:</label>
            <input type="text" class="form-control" id="HoTen" name="HoTen" required>
        </div>
        <div class="form-group">
            <label for="GioiTinh">Giới Tính:</label>
            <input type="text" class="form-control" id="GioiTinh" name="GioiTinh" required>
        </div>
        <div class="form-group">
            <label for="NgaySinh">Ngày Sinh:</label>
            <input type="date" class="form-control" id="NgaySinh" name="NgaySinh" required>
        </div>
        <div class="form-group">
            <label for="Hinh">Hình:</label>
            <input type="text" class="form-control" id="Hinh" name="Hinh" required>
        </div>
        <div class="form-group">
            <label for="MaNganh">Mã Ngành:</label>
            <input type="text" class="form-control" id="MaNganh" name="MaNganh" required>
        </div>
        <button type="submit" class="btn btn-primary">Thêm</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>