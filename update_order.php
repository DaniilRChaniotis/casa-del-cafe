<?php
// update_order.php
include 'db_connect.php';

function updateOrder($order_id, $user_id, $total_amount, $pickup_in_store = false) {
    global $conn;

    $sql = "UPDATE orders SET user_id = ?, total_amount = ?, pickup_in_store = ? WHERE order_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("idii", $user_id, $total_amount, $pickup_in_store, $order_id);

    return $stmt->execute();
}

$conn->close();
?>
