<?php
// models/Product.php

function get_all_products($conn) {
    $stmt = $conn->prepare("SELECT * FROM products");
    $stmt->execute();
    return $stmt->get_result();
}

function add_product($conn, $name, $description, $price, $stock_quantity, $expiration_date, $barcode) {
    $stmt = $conn->prepare("INSERT INTO products (name, description, price, stock_quantity, expiration_date, barcode) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssdiis", $name, $description, $price, $stock_quantity, $expiration_date, $barcode);
    return $stmt->execute();
}

function delete_product($conn, $product_id) {
    $stmt = $conn->prepare("DELETE FROM products WHERE id = ?");
    $stmt->bind_param("i", $product_id);
    return $stmt->execute();
}
?>
