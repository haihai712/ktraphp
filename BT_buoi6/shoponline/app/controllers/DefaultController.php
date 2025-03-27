<?php
class DefaultController {
    public function index() {
        header("Location: index.php?controller=product&action=index");
    }
}
?>