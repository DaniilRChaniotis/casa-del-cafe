<?php
// user_dashboard.php
session_start();
include 'header.php';

if ($_SESSION['role'] != 'customer') {
    header("Location: admin_dashboard.php");
    exit();
}

echo "<h1>User Dashboard</h1>";
echo "<p>Welcome, " . $_SESSION['username'] . "!</p>";

echo "<ul>
        <li><a href='view_cart.php'>View Cart</a></li>
        <li><a href='view_orders.php'>View Orders</a></li>
        <li><a href='update_account.php'>Manage Account</a></li>
      </ul>";

include 'footer.php';
?>
