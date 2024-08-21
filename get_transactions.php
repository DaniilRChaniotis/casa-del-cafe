<?php
// get_transactions.php
include 'db_connect.php';

function getTransactions() {
    global $conn;

    $sql = "SELECT t.transaction_id, t.order_id, t.user_id, u.username, t.payment_method, t.payment_status, t.transaction_amount, t.transaction_date
            FROM transactions t 
            JOIN users u ON t.user_id = u.user_id";
    $result = $conn->query($sql);

    $transactions = [];
    while ($row = $result->fetch_assoc()) {
        $transactions[] = $row;
    }

    return $transactions;
}

$conn->close();
?>
