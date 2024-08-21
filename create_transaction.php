<?php
session_start();
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $order_id = $_POST['order_id'];
    $user_id = $_SESSION['user_id'];
    $payment_method = $_POST['payment_method'];
    $payment_status = $_POST['payment_status'];
    $transaction_amount = $_POST['transaction_amount'];
    $transaction_reference = $_POST['transaction_reference'];

    $sql = "INSERT INTO transactions (order_id, user_id, payment_method, payment_status, transaction_amount, transaction_reference) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iissds", $order_id, $user_id, $payment_method, $payment_status, $transaction_amount, $transaction_reference);

    if ($stmt->execute()) {
        $message = "Transaction created successfully!";
    } else {
        $message = "Failed to create transaction.";
    }

    $stmt->close();
    $conn->close();

    include 'views/create_transaction_view.php';
}
?>
