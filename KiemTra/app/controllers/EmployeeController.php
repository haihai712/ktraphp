<?php
require_once 'app/models/Employee.php';

class EmployeeController {
    private $db;
    private $employee;

    public function __construct($db) {
        $this->db = $db;
        $this->employee = new Employee($db);
    }

    public function addEmployee($data) {
        // Cập nhật câu lệnh SQL để bao gồm tên nhân viên
        $sql = "INSERT INTO nhanvien (Ma_NV, Ten_NV, Phai, Noi_Sinh, Ma_Phong, Luong) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        
        // Thay đổi kiểu dữ liệu để bao gồm tên nhân viên
        $stmt->bind_param("sssssi", $data['ma_nv'], $data['ten_nv'], $data['phai'], $data['noi_sinh'], $data['ma_phong'], $data['luong']);
        
        return $stmt->execute();
    }

    public function listEmployees($page = 1, $limit = 5) {
        $offset = ($page - 1) * $limit;
        return $this->employee->readAll($limit, $offset);
    }
    
    public function getTotalEmployees() {
        return $this->employee->getTotalEmployees();
    }
}
?>