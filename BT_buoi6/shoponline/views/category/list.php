<?php include_once 'views/shares/header.php'; ?>
<h2>Category List</h2>
<a href="index.php?controller=category&action=add" class="btn btn-success mb-3">Add New Category</a>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($categories as $category): ?>
            <tr>
                <td><?php echo $category['id']; ?></td>
                <td><?php echo $category['name']; ?></td>
                <td>
                    <a href="index.php?controller=category&action=edit&id=<?php echo $category['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="index.php?controller=category&action=delete&id=<?php echo $category['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php include_once 'views/shares/footer.php'; ?>