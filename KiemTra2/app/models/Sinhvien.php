<?php
class SinhVien {
    private $conn;
    public $MaSV;
    public $HoTen;
    public $GioiTinh;
    public $NgaySinh;
    public $Hinh;
    public $MaNganh;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function readAll($limit, $offset) {
        $query = "SELECT * FROM SinhVien LIMIT :limit OFFSET :offset";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTotalRecords() {
        $query = "SELECT COUNT(*) as total FROM SinhVien";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    }

    public function create() {
        $query = "INSERT INTO SinhVien (MaSV, HoTen, GioiTinh, NgaySinh, Hinh, MaNganh) VALUES (:MaSV, :HoTen, :GioiTinh, :NgaySinh, :Hinh, :MaNganh)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':MaSV', $this->MaSV);
        $stmt->bindParam(':HoTen', $this->HoTen);
        $stmt->bindParam(':GioiTinh', $this->GioiTinh);
        $stmt->bindParam(':NgaySinh', $this->NgaySinh);
        $stmt->bindParam(':Hinh', $this->Hinh);
        $stmt->bindParam(':MaNganh', $this->MaNganh);
        return $stmt->execute();
    }

    public function getById($MaSV) {
        $query = "SELECT * FROM SinhVien WHERE MaSV = :MaSV";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':MaSV', $MaSV);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update() {
        $query = "UPDATE SinhVien SET HoTen = :HoTen, GioiTinh = :GioiTinh, NgaySinh = :NgaySinh, Hinh = :Hinh, MaNganh = :MaNganh WHERE MaSV = :MaSV";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':MaSV', $this->MaSV);
        $stmt->bindParam(':HoTen', $this->HoTen);
        $stmt->bindParam(':GioiTinh', $this->GioiTinh);
        $stmt->bindParam(':NgaySinh', $this->NgaySinh);
        $stmt->bindParam(':Hinh', $this->Hinh);
        $stmt->bindParam(':MaNganh', $this->MaNganh);
        return $stmt->execute();
    }

    public function delete($MaSV) {
        $query = "DELETE FROM SinhVien WHERE MaSV = :MaSV";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':MaSV', $MaSV);
        return $stmt->execute();
    }

    public function authenticate($username, $password) {
        $query = "SELECT * FROM SinhVien WHERE MaSV = :username AND Password = :password";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password); // Nên mã hóa password
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC) !== false;
    }
}
?>