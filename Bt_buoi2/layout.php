<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Liên Kết & Tin Xem Nhiều</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
        }
        h2 {
            color: #2c3e50;
            border-bottom: 2px solid #3498db;
            padding-bottom: 5px;
        }
        select {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        a {
            display: block;
            text-decoration: none;
            color: #3498db;
            padding: 8px 0;
            border-bottom: 1px solid #eee;
        }
        a:hover {
            color: #e74c3c;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php require_once 'lienketwebsite.php'; ?>
        <?php require_once 'tinxemnhieu.php'; ?>
    </div>
</body>
</html>