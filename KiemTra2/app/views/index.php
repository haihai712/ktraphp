<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Danh Sách Sinh Viên</title>
</head>
<body>

<div class="container mt-4">
    <h1 class="text-center">DANH SÁCH SINH VIÊN</h1>
    <a href="index.php?action=create" class="btn btn-primary mb-3">Thêm Sinh Viên</a>
    <a href="index.php?action=login" class="btn btn-secondary mb-3">Login</a> <!-- Nút Login -->
    <a href="index.php?action=hocphan" class="btn btn-secondary mb-3">Đăng ký học phần</a> <!-- Nút Login -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Mã SV</th>
                <th>Họ Tên</th>
                <th>Giới Tính</th>
                <th>Ngày Sinh</th>
                <th>Hình</th>
                <th>Ngành</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sinhVienList as $sinhVien): ?>
            <tr>
                <td><?php echo htmlspecialchars($sinhVien['MaSV']); ?></td>
                <td><?php echo htmlspecialchars($sinhVien['HoTen']); ?></td>
                <td><?php echo htmlspecialchars($sinhVien['GioiTinh']); ?></td>
                <td><?php echo htmlspecialchars($sinhVien['NgaySinh']); ?></td>
                <td><img src="<?php echo $sinhvien['Hinh']; ?>" alt="Hình sinh viên" width="100"></td>
                <td><?php echo htmlspecialchars($sinhVien['MaNganh']); ?></td>
                <td>
                    <a href="index.php?action=edit&MaSV=<?php echo htmlspecialchars($sinhVien['MaSV']); ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="index.php?action=delete&MaSV=<?php echo htmlspecialchars($sinhVien['MaSV']); ?>" class="btn btn-danger btn-sm">Delete</a>
                    <a href="index.php?action=detail&MaSV=<?php echo htmlspecialchars($sinhVien['MaSV']); ?>" class="btn btn-info btn-sm">View</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Phân trang -->
    <nav>
        <ul class="pagination justify-content-center">
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <li class="page-item <?php echo ($i == $page) ? 'active' : ''; ?>">
                    <a class="page-link" href="index.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                </li>
            <?php endfor; ?>
        </ul>
    </nav>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>