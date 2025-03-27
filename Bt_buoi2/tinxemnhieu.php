<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$listtin = [
    ['https://longnv.name.vn/featured/su-dung-sse-trong-php', 'Sử dụng SSE trong PHP'],
    ['https://longnv.name.vn/featured/phalcon-la-gi', 'Phalcon là gì'],
    ['http://songdep.xitrum.net/trenon/547.html', 'Bạn có bao nhiêu người bạn?'],
    ['http://songdep.xitrum.net/nghethuatsong/876.html', 'Bài học từ loài ngỗng'],
    ['http://songdep.xitrum.net/nghethuatsong/872.html', 'Đường hầm xuyên qua trái đất'],
    ['http://songdep.xitrum.net/ngungon/673.html', 'Tham ăn'],
];
?>

<div id="tinxemnhieu">
    <h2>Tin xem nhiều</h2>
    <?php $i = 0; ?>
    <?php while ($i < count($listtin)) { ?>
        <p><a href="<?= $listtin[$i][0]; ?>" target="_blank"><?= $listtin[$i][1]; ?></a></p>
        <?php $i++; ?>
    <?php } ?>
</div>

</body>
</html>