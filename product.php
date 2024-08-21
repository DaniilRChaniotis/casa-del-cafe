<?php
session_start();
include 'db_connect.php';

$product_id = isset($_GET['id']) ? $_GET['id'] : null;
$product = null;

if ($product_id) {
    $sql = "SELECT * FROM products WHERE product_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();
}

$conn->close();

include 'views/product_view.php';
?>
