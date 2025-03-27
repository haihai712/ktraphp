<?php
session_start();
require_once 'app/models/User.php';

class UserController {
    private $db;
    private $userModel;

    public function __construct($db) {
        $this->db = $db;
        $this->userModel = new User($db);
    }

    public function login($username, $password) {
        $user = $this->userModel->findUserByUsername($username);
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['Id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];
            header("Location: views/employee_list.php");
            exit();
        } else {
            return "Tài khoản hoặc mật khẩu không chính xác.";
        }
    }

    public function logout() {
        session_destroy();
        header("Location: login.php");
        exit();
    }
}
?>