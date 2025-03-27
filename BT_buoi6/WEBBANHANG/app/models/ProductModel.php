<?php
class ProductModel {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function getAll() {
        $stmt = $this->db->prepare("SELECT p.*, c.name as category_name FROM products p LEFT JOIN categories c ON p.category_id = c.id");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addProduct($name, $price, $image, $category_id) {
        $stmt = $this->db->prepare("INSERT INTO products (name, price, image, category_id) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$name, $price, $image, $category_id]);
    }

    public function find($id) {
        $stmt = $this->db->prepare("SELECT p.*, c.name as category_name FROM products p LEFT JOIN categories c ON p.category_id = c.id WHERE p.id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateProduct($id, $name, $price, $image, $category_id) {
        $stmt = $this->db->prepare("UPDATE products SET name = ?, price = ?, image = ?, category_id = ? WHERE id = ?");
        return $stmt->execute([$name, $price, $image, $category_id, $id]);
    }

    public function deleteProduct($id) {
        $stmt = $this->db->prepare("DELETE FROM products WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>