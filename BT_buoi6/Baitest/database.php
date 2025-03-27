<?php
// Thông tin đăng nhập cơ sở dữ liệu
$servername = "localhost";
$username = "root"; // Thay bằng tên người dùng MySQL của bạn
$password = ""; // Thay bằng mật khẩu MySQL của bạn
$dbname = "sangthu5";   // Thay bằng tên cơ sở dữ liệu MySQL của bạn

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
  die("Kết nối thất bại: " . $conn->connect_error);
}

// Truy vấn SQL để lấy dữ liệu sản phẩm - loại bỏ cột mo_ta
$sql = "SELECT ten_san_pham, gia, duong_dan_anh FROM sanpham ORDER BY gia ASC"; 

// Thực hiện truy vấn và kiểm tra nếu có lỗi
$result = $conn->query($sql);

// Nếu truy vấn thất bại, hiển thị lỗi SQL
if ($result === false) {
    die("Lỗi truy vấn: " . $conn->error);
}

// Thêm CSS cho thiết kế chuyên nghiệp
echo '<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: "Segoe UI", Roboto, Arial, sans-serif;
        }
        body {
            background-color: #f5f5f5;
            padding: 20px;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
            padding: 20px 0;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .products {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(270px, 1fr));
            gap: 20px;
        }
        .product-card {
            background: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }
        .product-image {
            position: relative;
            width: 100%;
            height: 200px;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f9f9f9;
        }
        .product-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .no-image {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
            color: #aaa;
            font-size: 3rem;
        }
        .product-info {
            padding: 15px;
        }
        .product-name {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 10px;
            color: #333;
            height: 40px;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
        }
        .product-price {
            font-size: 1.2rem;
            font-weight: 700;
            color: #e74c3c;
            margin-bottom: 15px;
        }
        .product-action {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .btn {
            padding: 8px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 600;
            transition: background 0.3s ease;
        }
        .btn-primary {
            background-color: #3498db;
            color: white;
        }
        .btn-primary:hover {
            background-color: #2980b9;
        }
        .btn-secondary {
            background-color: #f1c40f;
            color: #333;
        }
        .btn-secondary:hover {
            background-color: #f39c12;
        }
        .empty-message {
            text-align: center;
            padding: 40px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            color: #666;
            font-size: 1.1rem;
        }
        .error-message {
            text-align: center;
            padding: 40px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            color: #e74c3c;
            font-size: 1.1rem;
        }
        @media (max-width: 768px) {
            .products {
                grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            }
        }
        @media (max-width: 480px) {
            .products {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Sản phẩm của chúng tôi</h1>
            <p>Khám phá những sản phẩm chất lượng cao</p>
        </div>';

// Kiểm tra nếu có bản ghi được trả về
if ($result->num_rows > 0) {
    echo '<div class="products">';
    
    // Hiển thị dữ liệu của từng hàng
    while($row = $result->fetch_assoc()) {
        // Định dạng giá tiền
        $formatted_price = number_format($row["gia"], 0, ',', '.') . ' ₫';
        
        echo '<div class="product-card">';
        
        echo '<div class="product-image">';
        if (!empty($row["duong_dan_anh"])) {
            echo '<img src="' . htmlspecialchars($row["duong_dan_anh"]) . '" alt="' . htmlspecialchars($row["ten_san_pham"]) . '">';
        } else {
            echo '<div class="no-image"><i class="fas fa-image"></i></div>';
        }
        echo '</div>';
        
        echo '<div class="product-info">';
        echo '<h3 class="product-name">' . htmlspecialchars($row["ten_san_pham"]) . '</h3>';
        echo '<div class="product-price">' . $formatted_price . '</div>';
        
        echo '<div class="product-action">';
        echo '<button class="btn btn-primary">Mua ngay</button>';
        echo '<button class="btn btn-secondary"><i class="fas fa-shopping-cart"></i></button>';
        echo '</div>';
        
        echo '</div>'; // Đóng product-info
        echo '</div>'; // Đóng product-card
    }
    
    echo '</div>'; // Đóng products
} else {
    echo '<div class="empty-message">
            <i class="fas fa-search" style="font-size: 3rem; color: #ddd; margin-bottom: 15px;"></i>
            <p>Không tìm thấy sản phẩm nào.</p>
            <p>Vui lòng quay lại sau.</p>
          </div>';
}

echo '</div>'; // Đóng container
echo '</body>
</html>';

$conn->close();
?>