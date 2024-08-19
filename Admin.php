<?php
// models/Admin.php

function login_admin($conn, $username, $password) {
    $stmt = $conn->prepare("SELECT * FROM admin WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows === 1) {
        $admin = $result->fetch_assoc();
        if (password_verify($password, $admin['password'])) {
            return $admin;
        }
    }
    return false;
}
?>
