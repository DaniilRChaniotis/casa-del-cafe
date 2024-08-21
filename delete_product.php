<?php
include 'db_connect.php';

function deleteProduct($product_id) {
    global $conn;

    $sql = "DELETE FROM products WHERE product_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $product_id);

    return $stmt->execute();
}

$conn->close();
?>
