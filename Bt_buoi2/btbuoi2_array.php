<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <?php
            $h = gmdate("H") + 7;
            if ($h <= 12){
                echo "<span class = 'sang'> Bay gio la $h gio sang! Chuc mot ngay tot lanh </span>";
            }
            else {
                echo "<span class = 'chieu'> luc nay la $h gio chieu! Chuc ban vui </span>";
            }
        ?>
    </div>
</body>
</html>