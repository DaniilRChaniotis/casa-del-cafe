<?php
// update_cart.php
session_start();
include 'db_connect.php';

function updateCart($user_id, $product_id, $quantity) {
    global $conn;

    $sql = "UPDATE carts SET quantity = ? WHERE user_id = ? AND product_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iii", $quantity, $user_id, $product_id);

    return $stmt->execute();
}

$user_id = $_SESSION['user_id'];
$product_id = $_POST['product_id'];
$quantity = $_POST['quantity'];

if (updateCart($user_id, $product_id, $quantity)) {
    header("Location: view_cart.php");
} else {
    echo "Failed to update cart.";
}
$conn->close();
?>
