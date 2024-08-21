<?php
include 'db_connect.php';

function getCategories() {
    global $conn;

    $sql = "SELECT * FROM categories";
    $result = $conn->query($sql);

    $categories = [];
    while ($row = $result->fetch_assoc()) {
        $categories[] = $row;
    }

    return $categories;
}

$conn->close();
?>
