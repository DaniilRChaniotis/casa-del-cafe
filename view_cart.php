<?php
session_start();
include 'db_connect.php';

$user_id = $_SESSION['user_id'];
$sql = "SELECT c.*, p.name, p.price FROM carts c JOIN products p ON c.product_id = p.product_id WHERE c.user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

$cart_items = [];
$total = 0;

while ($row = $result->fetch_assoc()) {
    $row['subtotal'] = $row['price'] * $row['quantity'];
    $total += $row['subtotal'];
    $cart_items[] = $row;
}

$stmt->close();
$conn->close();

include 'views/view_cart_view.php';
?>
