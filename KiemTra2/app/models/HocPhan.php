<?php
class HocPhan {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function readAll($limit, $offset) {
        $query = "SELECT * FROM HocPhan LIMIT :limit OFFSET :offset";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTotalRecords() {
        $query = "SELECT COUNT(*) as total FROM HocPhan";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchColumn();
    }
}
?>