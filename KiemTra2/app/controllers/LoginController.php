<?php
require_once 'app/models/SinhVien.php';

class LoginController {
    private $db;
    private $sinhVienModel;

    public function __construct($db) {
        $this->db = $db;
        $this->sinhVienModel = new SinhVien($db);
    }

    public function login() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Kiểm tra thông tin đăng nhập
            if ($this->sinhVienModel->authenticate($username, $password)) {
                // Chuyển hướng đến trang chính
                header("Location: index.php?action=index");
                exit();
            } else {
                $error = "Sai thông tin đăng nhập!";
            }
        }
        include "app/views/login.php"; // Đường dẫn tới view
    }
}
?>