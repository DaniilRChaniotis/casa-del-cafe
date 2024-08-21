<?php
session_start();
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'];
    $total_amount = $_POST['total_amount'];
    $pickup_in_store = isset($_POST['pickup_in_store']) ? 1 : 0;

    $sql = "INSERT INTO orders (user_id, total_amount, pickup_in_store) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("idi", $user_id, $total_amount, $pickup_in_store);

    if ($stmt->execute()) {
        $message = "Order created successfully!";
    } else {
        $message = "Failed to create order.";
    }

    $stmt->close();
    $conn->close();

    include 'views/create_order_view.php';
}
?>
