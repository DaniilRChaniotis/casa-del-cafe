<?php
include 'db_connect.php';

function updateProduct($product_id, $name, $description, $price, $stock_quantity, $category_id, $image_url = null) {
    global $conn;

    if ($image_url) {
        $sql = "UPDATE products SET name = ?, description = ?, price = ?, stock_quantity = ?, category_id = ?, image_url = ? WHERE product_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssdiisi", $name, $description, $price, $stock_quantity, $category_id, $image_url, $product_id);
    } else {
        $sql = "UPDATE products SET name = ?, description = ?, price = ?, stock_quantity = ?, category_id = ? WHERE product_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssdiii", $name, $description, $price, $stock_quantity, $category_id, $product_id);
    }

    return $stmt->execute();
}

$conn->close();
?>
