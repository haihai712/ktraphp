<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giải Phương Trình Bậc Hai</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #74ebd5, #acb6e5);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background: white;
            padding: 25px;
            width: 400px;
            text-align: center;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }
        h2 {
            margin-bottom: 20px;
            color: #333;
        }
        input {
            width: 90%;
            padding: 10px;
            margin: 10px 0;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        button {
            background: #007bff;
            color: white;
            padding: 10px;
            font-size: 18px;
            border: none;
            cursor: pointer;
            width: 100%;
            border-radius: 5px;
            transition: 0.3s;
        }
        button:hover {
            background: #0056b3;
        }
        .result {
            font-size: 18px;
            margin-top: 20px;
            padding: 15px;
            background: #f8f9fa;
            border-left: 5px solid #007bff;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Giải Phương Trình Bậc Hai</h2>
    <form method="post">
        <input type="number" name="a" step="any" placeholder="Nhập hệ số a" required> <br>
        <input type="number" name="b" step="any" placeholder="Nhập hệ số b" required> <br>
        <input type="number" name="c" step="any" placeholder="Nhập hệ số c" required> <br>
        <button type="submit" name="solve">Giải</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $a = $_POST["a"];
        $b = $_POST["b"];
        $c = $_POST["c"];
        $result = "";

        if ($a == 0) { 
            if ($b == 0) {
                $result = ($c == 0) ? "Phương trình vô số nghiệm!" : "Phương trình vô nghiệm!";
            } else {
                $x = -$c / $b;
                $result = "Nghiệm của phương trình bậc nhất: x = " . number_format($x, 2);
            }
        } else { 
            $delta = $b * $b - 4 * $a * $c;
            if ($delta < 0) {
                $result = "Phương trình vô nghiệm!";
            } elseif ($delta == 0) {
                $x = -$b / (2 * $a);
                $result = "Phương trình có nghiệm kép: x = " . number_format($x, 2);
            } else {
                $x1 = (-$b + sqrt($delta)) / (2 * $a);
                $x2 = (-$b - sqrt($delta)) / (2 * $a);
                $result = "Phương trình có hai nghiệm:<br>x1 = " . number_format($x1, 2) . "<br>x2 = " . number_format($x2, 2);
            }
        }
        echo "<div class='result'>$result</div>";
    }
    ?>
</div>

</body>
</html>
