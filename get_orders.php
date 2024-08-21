<?php
// get_orders.php
include 'db_connect.php';

function getOrders() {
    global $conn;

    $sql = "SELECT o.order_id, o.user_id, u.username, o.order_date, o.total_amount, o.pickup_in_store
            FROM orders o 
            JOIN users u ON o.user_id = u.user_id";
    $result = $conn->query($sql);

    $orders = [];
    while ($row = $result->fetch_assoc()) {
        $orders[] = $row;
    }

    return $orders;
}

$conn->close();
?>
