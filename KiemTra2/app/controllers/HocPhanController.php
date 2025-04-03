<?php
require_once 'app/models/HocPhan.php';

class HocPhanController {
    private $db;
    private $hocPhanModel;

    public function __construct($db) {
        $this->db = $db;
        $this->hocPhanModel = new HocPhan($db);
    }

    public function hocphan() {
        $limit = 5; // Giới hạn số học phần hiển thị
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $offset = ($page - 1) * $limit;

        $hocPhanList = $this->hocPhanModel->readAll($limit, $offset);
        $totalRecords = $this->hocPhanModel->getTotalRecords();
        $totalPages = ceil($totalRecords / $limit);

        include "app/views/hocphan/index.php"; // Đường dẫn tới view
    }
}
?>