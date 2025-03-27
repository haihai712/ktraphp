<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xếp loại tuyển sinh</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            text-align: center;
        }
        .container {
            width: 350px;
            margin: 50px auto;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #333;
        }
        label {
            font-weight: bold;
            display: block;
            text-align: left;
            margin: 10px 0 5px;
        }
        input, select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            width: 100%;
            padding: 10px;
            background: #28a745;
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background: #218838;
        }
        .result {
            margin-top: 20px;
            padding: 15px;
            background: #e9ecef;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Xếp loại kết quả tuyển sinh</h2>
        <form method="POST" action="">
            <label>Điểm môn Toán</label>
            <input type="number" name="toan" required min="0" max="10">

            <label>Điểm môn Lý</label>
            <input type="number" name="ly" required min="0" max="10">

            <label>Điểm môn Hóa</label>
            <input type="number" name="hoa" required min="0" max="10">

            <label>Chọn khu vực</label>
            <select name="khu_vuc">
                <option value="0">Khu vực 4 (Không cộng điểm)</option>
                <option value="5">Khu vực 1 (Cộng 5 điểm)</option>
                <option value="5">Khu vực 2 (Cộng 5 điểm)</option>
                <option value="3">Khu vực 3 (Cộng 3 điểm)</option>
            </select>

            <button type="submit" name="submit">Xếp loại</button>
        </form>

        <?php
        if (isset($_POST['submit'])) {
            $toan = $_POST['toan'];
            $ly = $_POST['ly'];
            $hoa = $_POST['hoa'];
            $khu_vuc = $_POST['khu_vuc'];

            $tong_diem = $toan + $ly + $hoa + $khu_vuc;

            // Xếp loại
            if ($tong_diem >= 24) {
                $xep_loai = "Giỏi";
            } elseif ($tong_diem >= 18) {
                $xep_loai = "Khá";
            } elseif ($tong_diem >= 15) {
                $xep_loai = "Trung Bình";
            } else {
                $xep_loai = "Yếu";
            }

            echo "<div class='result'>";
            echo "<h3>Kết quả xếp loại</h3>";
            echo "<p><strong>Tổng điểm:</strong> $tong_diem</p>";
            echo "<p><strong>Xếp loại:</strong> $xep_loai</p>";
            echo "<p><strong>Điểm ưu tiên:</strong> $khu_vuc</p>";
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>
