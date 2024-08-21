<?php
session_start();
include 'db_connect.php';

$sql = "SELECT * FROM products WHERE featured = 1 LIMIT 3";
$result = $conn->query($sql);

$featured_products = [];

while ($row = $result->fetch_assoc()) {
    $featured_products[] = $row;
}

$conn->close();

include 'views/index_view.php';
?>
