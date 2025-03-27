<?php
session_start();
require_once 'students.php';

// Kiểm tra đăng nhập
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['id'])) {
    deleteStudent($_GET['id']);
}

header("Location: student-list.php");
exit();
?>