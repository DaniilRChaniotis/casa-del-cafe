<?php
session_start();
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category_id = $_POST['category_id'];
    $image_url = $_POST['image_url'];
    $stock_quantity = $_POST['stock_quantity'];

    $sql = "INSERT INTO products (name, description, price, category_id, image_url, stock_quantity) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssdisi", $name, $description, $price, $category_id, $image_url, $stock_quantity);

    if ($stmt->execute()) {
        $message = "Product created successfully!";
    } else {
        $message = "Failed to create product.";
    }

    $stmt->close();
    $conn->close();

    include 'views/create_product_view.php';
}
?>

