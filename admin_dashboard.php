<?php
session_start();
include 'db_connect.php';

// Check if the user is an admin
if ($_SESSION['role'] != 'admin') {
    header("Location: user_dashboard.php");
    exit();
}

// Fetch necessary data for the dashboard (e.g., number of users, orders, etc.)
// Example: $user_count, $order_count, etc.

include 'views/admin_dashboard_view.php';
?>
