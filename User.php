<?php
// models/User.php

function register_user($conn, $username, $password, $email)
{
    $password_hash = password_hash($password, PASSWORD_BCRYPT);
    $stmt = $conn->prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $password_hash, $email);
    return $stmt->execute();
}

function login_user($conn, $username, $password)
{
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            return $user;
        }
    }
    return false;
}
?>