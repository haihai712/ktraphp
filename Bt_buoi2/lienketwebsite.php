<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$links = [
    ['http://google.com', 'Google'],
    ['http://w3schools.com', 'W3Schools'],
    ['https://longnv.name.vn', 'Thầy Long Web'],
    ['http://vnexpress.net', 'VnExpress'],
    ['http://tuoitre.vn', 'Tuổi trẻ'],
    ['http://thanhnien.vn', 'Thanh niên'],
    ['http://youtube.com', 'Youtube'],
];
?>

<div id="lienketwebsite">
    <h2>Liên kết website</h2>
    <select onchange="window.open(this.value)">
        <?php foreach ($links as $link) { ?>  
            <option value="<?= $link[0]; ?>" <?= $link[1] == 'W3Schools' ? 'selected' : ''; ?>>
                <?= $link[1]; ?>
            </option>
        <?php } ?>
    </select>
</div>

</body>
</html>



