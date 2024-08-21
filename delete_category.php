<?php
include 'db_connect.php';

function deleteCategory($category_id) {
    global $conn;

    $sql = "DELETE FROM categories WHERE category_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $category_id);

    return $stmt->execute();
}

$conn->close();
?>
