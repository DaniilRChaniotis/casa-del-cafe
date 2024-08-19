<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Products - Casa Del Café</title>
</head>
<body>
    <h2>Manage Products</h2>
    <h3>Add New Product</h3>
    <form action="../controllers/ProductController.php" method="POST">
        <label for="name">Product Name:</label><br>
        <input type="text" id="name" name="name" required><br>
        <label for="description">Description:</label><br>
        <textarea id="description" name="description" required></textarea><br>
        <label for="price">Price:</label><br>
        <input type="number" step="0.01" id="price" name="price" required><br>
        <label for="stock_quantity">Stock Quantity:</label><br>
        <input type="number" id="stock_quantity" name="stock_quantity" required><br>
        <label for="expiration_date">Expiration Date:</label><br>
        <input type="date" id="expiration_date" name="expiration_date"><br>
        <label for="barcode">Barcode:</label><br>
        <input type="text" id="barcode" name="barcode"><br><br>
        <input type="submit" name="add_product" value="Add Product">
    </form>
    <h3>Existing Products</h3>
    <ul>
        <?php
        include '../db.php';
        include '../models/Product.php';
        $products = get_all_products($conn);
        while ($product = $products->fetch_assoc()): ?>
            <li>
                <?php echo $product['name'] . " - " . $product['price'] . " EUR"; ?>
                <form action="../controllers/ProductController.php" method="POST" style="display:inline;">
                    <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                    <input type="submit" name="delete_product" value="Delete">
                </form>
            </li>
        <?php endwhile; ?>
    </ul>
    <?php if (isset($_GET['success'])): ?>
        <p>Product added successfully!</p>
    <?php elseif (isset($_GET['error'])): ?>
        <p>Error: Could not perform the operation. Please try again.</p>
    <?php elseif (isset($_GET['deleted'])): ?>
        <p>Product deleted successfully!</p>
    <?php endif; ?>
</body>
</html>
