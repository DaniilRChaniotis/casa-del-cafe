<?php
include 'db_connect.php';

function updateUser($user_id, $username, $email, $password = null) {
    global $conn;

    if ($password) {
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "UPDATE users SET username = ?, email = ?, password_hash = ? WHERE user_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssi", $username, $email, $password_hash, $user_id);
    } else {
        $sql = "UPDATE users SET username = ?, email = ? WHERE user_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssi", $username, $email, $user_id);
    }

    return $stmt->execute();
}

$conn->close();
?>
