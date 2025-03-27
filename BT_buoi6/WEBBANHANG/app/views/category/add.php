<?php include_once 'views/shares/header.php'; ?>
<h2>Add New Category</h2>
<form method="POST">
    <div class="form-group">
        <label for="name">Category Name</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <button type="submit" class="btn btn-primary">Add Category</button>
</form>
<?php include_once 'views/shares/footer.php'; ?>