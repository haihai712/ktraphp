<?php
require_once 'app/models/Sinhvien.php'; // Đảm bảo rằng bạn đã nhập đúng mô hình

class SinhVienController {
    private $db;
    private $sinhVienModel;

    public function __construct($db) {
        $this->db = $db;
        $this->sinhVienModel = new SinhVien($db);
    }

    public function index() {
        $limit = 5;
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $offset = ($page - 1) * $limit;

        $sinhVienList = $this->sinhVienModel->readAll($limit, $offset);
        $totalRecords = $this->sinhVienModel->getTotalRecords();
        $totalPages = ceil($totalRecords / $limit);

        include "app/views/index.php"; // Đảm bảo đường dẫn này đúng
    }

    public function create() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->sinhVienModel->MaSV = $_POST['MaSV'];
            $this->sinhVienModel->HoTen = $_POST['HoTen'];
            $this->sinhVienModel->GioiTinh = $_POST['GioiTinh'];
            $this->sinhVienModel->NgaySinh = $_POST['NgaySinh'];
            $this->sinhVienModel->Hinh = $_POST['Hinh'];
            $this->sinhVienModel->MaNganh = $_POST['MaNganh'];

            if ($this->sinhVienModel->create()) {
                header("Location: index.php?action=index");
                exit();
            } else {
                $error = "Không thể thêm sinh viên!";
            }
        }
        include "app/views/add_student.php"; // Đường dẫn tới file view
    }

    public function edit() {
        $MaSV = $_GET['MaSV'] ?? '';
        if (empty($MaSV)) {
            header("Location: index.php?action=index");
            exit();
        }

        $student = $this->sinhVienModel->getById($MaSV);
        if (!$student) {
            header("Location: index.php?action=index");
            exit();
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->sinhVienModel->MaSV = $MaSV;
            $this->sinhVienModel->HoTen = $_POST['HoTen'];
            $this->sinhVienModel->GioiTinh = $_POST['GioiTinh'];
            $this->sinhVienModel->NgaySinh = $_POST['NgaySinh'];
            $this->sinhVienModel->Hinh = $_POST['Hinh'];
            $this->sinhVienModel->MaNganh = $_POST['MaNganh'];

            if ($this->sinhVienModel->update()) {
                header("Location: index.php?action=index");
                exit();
            } else {
                $error = "Không thể cập nhật sinh viên!";
            }
        }

        include "app/views/edit_student.php"; // Đường dẫn tới file view
    }

    public function delete() {
        $MaSV = $_GET['MaSV'] ?? '';
        if (!empty($MaSV)) {
            if ($this->sinhVienModel->delete($MaSV)) {
                header("Location: index.php?action=index");
                exit();
            } else {
                $error = "Không thể xóa sinh viên!";
            }
        }
    }

    public function detail() {
        $MaSV = $_GET['MaSV'] ?? '';
        if (empty($MaSV)) {
            header("Location: index.php?action=index");
            exit();
        }

        $student = $this->sinhVienModel->getById($MaSV);
        if (!$student) {
            header("Location: index.php?action=index");
            exit();
        }

        include "app/views/view_student.php"; // Đường dẫn tới file view
    }
}
?>