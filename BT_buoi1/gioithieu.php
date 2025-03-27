<?php
    $ho = "Huỳnh Phước";
    $ten = "Hải";
    $ngaySinh = "15/04/2003";
    $diem = 8;

    if($diem >= 9) $xeploai = "Xuất sắc";
    else if($diem >= 8) $xeploai = "Giỏi";
    else if($diem >= 6.5) $xeploai = "Khá";
    else if($diem >= 5) $xeploai = "Trung bình";
    else if($diem >= 3.5) $xeploai = "Yếu";
    else $xeploai = "Kém";
?>

<div id="gioithieu">
    <p>Thông tin sinh viên</p>
    <p><span>Họ tên</span> : <?php echo $ho. " " . $ten;?></p>
    <p><span>Ngày sinh</span> : <?php echo $ngaySinh;?></p>
    <p><span>Điểm</span> : <?php echo $diem;?></p>
    <p><span>Xếp loại</span> : <?php echo $xeploai;?></p>
</div>