<?php
session_start();
include 'db_connect.php';

$category_id = isset($_GET['category_id']) ? $_GET['category_id'] : null;
$sql = $category_id ? "SELECT * FROM products WHERE category_id = ?" : "SELECT * FROM products";
$stmt = $conn->prepare($sql);

if ($category_id) {
    $stmt->bind_param("i", $category_id);
}

$stmt->execute();
$result = $stmt->get_result();

$products = [];

while ($row = $result->fetch_assoc()) {
    $products[] = $row;
}

$stmt->close();
$conn->close();

include 'views/products_view.php';
?>
