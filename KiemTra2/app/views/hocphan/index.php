<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Danh Sách Học Phần</title>
</head>
<body>

<div class="container mt-4">
    <h1 class="text-center">DANH SÁCH HỌC PHẦN</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Mã HP</th>
                <th>Tên HP</th>
                <th>Số Tín Chỉ</th>
                <th>Ghi Chú</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($hocPhanList as $hocPhan): ?>
            <tr>
                <td><?php echo htmlspecialchars($hocPhan['MaHP']); ?></td>
                <td><?php echo htmlspecialchars($hocPhan['TenHP']); ?></td>
                <td><?php echo htmlspecialchars($hocPhan['SoTinChi']); ?></td>
                <td><?php echo htmlspecialchars($hocPhan['GhiChu']); ?></td>
                <td>
                    <a href="index.php?action=edit&MaHP=<?php echo htmlspecialchars($hocPhan['MaHP']); ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="index.php?action=delete&MaHP=<?php echo htmlspecialchars($hocPhan['MaHP']); ?>" class="btn btn-danger btn-sm">Delete</a>
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