<?php
class Employee {
    public $ma_nv;
    public $ten_nv;
    public $phai;
    public $noi_sinh;
    public $ma_phong;
    public $luong;

    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function addEmployee($data) {
        $sql = "INSERT INTO nhanvien (Ma_NV, Ten_NV, Phai, Noi_Sinh, Ma_Phong, Luong) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("sssssi", $data['ma_nv'], $data['ten_nv'], $data['phai'], $data['noi_sinh'], $data['ma_phong'], $data['luong']);
        return $stmt->execute();
    }

    public function readAll($limit, $offset) {
        $sql = "SELECT n.Ma_NV, n.Ten_NV, n.Phai, n.Noi_Sinh, n.Ma_Phong, n.Luong, p.Ten_Phong 
                FROM nhanvien n 
                JOIN phongban p ON n.Ma_Phong = p.Ma_Phong 
                LIMIT ? OFFSET ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("ii", $limit, $offset);
        $stmt->execute();
        return $stmt->get_result();
    }

    public function getTotalEmployees() {
        $sql = "SELECT COUNT(*) as total FROM nhanvien";
        $result = $this->db->query($sql);
        return $result->fetch_assoc()['total'];
    }

    public function getEmployeeById($id) {
        $sql = "SELECT * FROM nhanvien WHERE Ma_NV = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("s", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
    
    public function updateEmployee($data) {
        $sql = "UPDATE nhanvien SET Ten_NV = ?, Phai = ?, Noi_Sinh = ?, Ma_Phong = ?, Luong = ? WHERE Ma_NV = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("sssssi", $data['ten_nv'], $data['phai'], $data['noi_sinh'], $data['ma_phong'], $data['luong'], $data['ma_nv']);
        return $stmt->execute();
    }
}
?>