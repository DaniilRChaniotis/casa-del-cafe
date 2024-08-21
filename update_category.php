<?php
include 'db_connect.php';

function updateCategory($category_id, $category_name) {
    global $conn;

    $sql = "UPDATE categories SET category_name = ? WHERE category_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $category_name, $category_id);

    return $stmt->execute();
}

$conn->close();
?>
