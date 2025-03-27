<?php include_once 'views/shares/header.php'; ?>
<h2>Product Details</h2>
<div class="card" style="width: 18rem;">
    <img src="uploads/<?php echo $product['image']; ?>" class="card-img-top" alt="<?php echo $product['name']; ?>">
    <div class="card-body">
        <h5 class="card-title"><?php echo $product['name']; ?></h5>
        <p class="card-text">Price: $<?php echo $product['price']; ?></p>
        <p class="card-text">Category: <?php echo $product['category_name'] ?? 'N/A'; ?></p>
        <a href="index.php?controller=product&action=index" class="btn btn-primary">Back to List</a>
    </div>
</div>
<?php include_once 'views/shares/footer.php'; ?>