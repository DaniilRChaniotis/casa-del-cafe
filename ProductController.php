<?php
// controllers/ProductController.php
session_start();
include '../db.php';
include '../models/Product.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add_product'])) {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $stock_quantity = $_POST['stock_quantity'];
        $expiration_date = $_POST['expiration_date'];
        $barcode = $_POST['barcode'];

        if (add_product($conn, $name, $description, $price, $stock_quantity, $expiration_date, $barcode)) {
            header("Location: ../views/manage_products.php?success=1");
        } else {
            header("Location: ../views/manage_products.php?error=1");
        }
    }

    if (isset($_POST['delete_product'])) {
        $product_id = $_POST['product_id'];

        if (delete_product($conn, $product_id)) {
            header("Location: ../views/manage_products.php?deleted=1");
        } else {
            header("Location: ../views/manage_products.php?error=1");
        }
    }
}
?>
