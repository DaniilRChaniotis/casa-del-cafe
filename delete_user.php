<?php
include 'db_connect.php';

function deleteUser($user_id) {
    global $conn;

    $sql = "DELETE FROM users WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);

    return $stmt->execute();
}

$conn->close();
?>
