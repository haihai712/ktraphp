<?php include_once 'views/shares/header.php'; ?>
<h2>Product List</h2>
<a href="index.php?controller=product&action=add" class="btn btn-success mb-3">Add New Product</a>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Category</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($products as $product): ?>
            <tr>
                <td><?php echo $product['id']; ?></td>
                <td><?php echo $product['name']; ?></td>
                <td><?php echo $product['price']; ?></td>
                <td><?php echo $product['category_name'] ?? 'N/A'; ?></td>
                <td><img src="public/uploads/<?php echo $product['image']; ?>" width="50"></td>
                <td>
                    <a href="index.php?controller=product&action=show&id=<?php echo $product['id']; ?>" class="btn btn-info btn-sm">View</a>
                    <a href="index.php?controller=product&action=edit&id=<?php echo $product['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="index.php?controller=product&action=delete&id=<?php echo $product['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php include_once 'views/shares/footer.php'; ?>