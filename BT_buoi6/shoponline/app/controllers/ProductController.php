<?php
class ProductController {
    private $productModel;
    private $categoryModel;

    public function __construct() {
        $this->productModel = new ProductModel();
        $this->categoryModel = new CategoryModel();
    }

    public function index() {
        $products = $this->productModel->getAll();
        include_once 'views/product/list.php';
    }

    public function add() {
        $categories = $this->categoryModel->getAll();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $price = $_POST['price'];
            $category_id = $_POST['category_id'];
            $image = $_FILES['image']['name'];
            $target = "uploads/" . basename($image);
            move_uploaded_file($_FILES['image']['tmp_name'], $target);

            $this->productModel->create($name, $price, $image, $category_id);
            header("Location: index.php?controller=product&action=index");
        }
        include_once 'views/product/add.php';
    }

    public function edit($id) {
        $product = $this->productModel->find($id);
        $categories = $this->categoryModel->getAll();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $price = $_POST['price'];
            $category_id = $_POST['category_id'];
            $image = $product['image'];
            if (!empty($_FILES['image']['name'])) {
                $image = $_FILES['image']['name'];
                $target = "uploads/" . basename($image);
                move_uploaded_file($_FILES['image']['tmp_name'], $target);
            }
            $this->productModel->update($id, $name, $price, $image, $category_id);
            header("Location: index.php?controller=product&action=index");
        }
        include_once 'views/product/edit.php';
    }

    public function delete($id) {
        $this->productModel->delete($id);
        header("Location: index.php?controller=product&action=index");
    }

    public function show($id) {
        $product = $this->productModel->find($id);
        include_once 'views/product/show.php';
    }
}
?>