<?php
include 'db_connect.php';

function deleteOrder($order_id)
{
    global $conn;

    $sql = "DELETE FROM orders WHERE order_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $order_id);

    return $stmt->execute();
}

$conn->close();
?>