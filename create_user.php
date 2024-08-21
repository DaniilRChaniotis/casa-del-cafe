<?php
include 'db_connect.php';

function createUser($username, $email, $password, $role = 'customer') {
    global $conn;
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, email, password_hash, role) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $username, $email, $password_hash, $role);

    return $stmt->execute();
}

$conn->close();
?>
