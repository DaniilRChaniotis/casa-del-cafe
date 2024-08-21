<?php
include 'db_connect.php';

function getProducts() {
    global $conn;

    $sql = "SELECT p.product_id, p.name, p.description, p.price, p.stock_quantity, c.category_name, p.image_url 
            FROM products p 
            JOIN categories c ON p.category_id = c.category_id";
    $result = $conn->query($sql);

    $products = [];
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }

    return $products;
}

$conn->close();
?>
