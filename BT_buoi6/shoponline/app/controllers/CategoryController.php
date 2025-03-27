<?php
class CategoryController {
    private $categoryModel;

    public function __construct() {
        $this->categoryModel = new CategoryModel();
    }

    public function index() {
        $categories = $this->categoryModel->getAll();
        include_once 'views/category/list.php';
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $this->categoryModel->create($name);
            header("Location: index.php?controller=category&action=index");
        }
        include_once 'views/category/add.php';
    }

    public function edit($id) {
        $category = $this->categoryModel->find($id);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $this->categoryModel->update($id, $name);
            header("Location: index.php?controller=category&action=index");
        }
        include_once 'views/category/edit.php';
    }

    public function delete($id) {
        $this->categoryModel->delete($id);
        header("Location: index.php?controller=category&action=index");
    }
}
?>