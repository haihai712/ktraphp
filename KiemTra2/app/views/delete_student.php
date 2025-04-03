<?php
require_once('app/config/database.php');

if (isset($_GET['id'])) {
    $maSV = $_GET['id'];
    $database = new Database();
    $db = $database->dbConnection();

    $query = "DELETE FROM SinhVien WHERE MaSV = :MaSV";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':MaSV', $maSV);
    
    if ($stmt->execute()) {
        header("Location: index.php");
    } else {
        echo "Lỗi khi xóa sinh viên.";
    }
}
?>