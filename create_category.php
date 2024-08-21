<?php
session_start();
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category_name = $_POST['category_name'];

    $sql = "INSERT INTO categories (category_name) VALUES (?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $category_name);

    if ($stmt->execute()) {
        $message = "Category created successfully!";
    } else {
        $message = "Failed to create category.";
    }

    $stmt->close();
    $conn->close();

    include 'views/create_category_view.php';
}
?>

