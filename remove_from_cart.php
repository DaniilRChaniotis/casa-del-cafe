<?php
// remove_from_cart.php
session_start();
include 'db_connect.php';

function removeFromCart($user_id, $product_id) {
    global $conn;

    $sql = "DELETE FROM carts WHERE user_id = ? AND product_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $user_id, $product_id);

    return $stmt->execute();
}

$user_id = $_SESSION['user_id'];
$product_id = $_GET['product_id'];

if (removeFromCart($user_id, $product_id)) {
    header("Location: view_cart.php");
} else {
    echo "Failed to remove item from cart.";
}
$conn->close();
?>
