<?php include_once 'views/shares/header.php'; ?>
<h2>Edit Category</h2>
<form method="POST">
    <div class="form-group">
        <label for="name">Category Name</label>
        <input type="text" class="form-control" id="name" name="name" value="<?php echo $category['name']; ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Update Category</button>
</form>
<?php include_once 'views/shares/footer.php'; ?>