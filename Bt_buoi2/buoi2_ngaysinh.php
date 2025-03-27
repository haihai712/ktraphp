<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <select id = "ngay">
        <option value = "0">Chon ngay</option>
        <?php
            for ($i = 1; $i <= 31; $i++){
                echo "<option value = '$i'>ngay $i</option>";
            }
        ?>
    </select>
    <select id "Thang">
        <option value = "0">Chon thang</option>
        <?php
            for ($i = 1; $i <= 12; $i++){
                echo "<option value = '$i'>thang $i</option>";
            }
        ?>
    </select>
    <select id "Nam">
        <option value = "0">Chon Nam</option>
        <?php
            for ($i = 2000; $i <= 2099; $i++){
                echo "<option value = '$i'>nam $i</option>";
            }
        ?>
    </select>
</body>
</html>
