<?php
// controllers/AdminController.php
session_start();
include '../db.php';
include '../models/Admin.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $admin = login_admin($conn, $username, $password);
        if ($admin) {
            $_SESSION['admin_username'] = $admin['username'];
            header("Location: ../views/admin_dashboard.php");
        } else {
            header("Location: ../views/admin_login.php?error=1");
        }
    }
}
?>
