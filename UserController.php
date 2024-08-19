<?php
// controllers/UserController.php
session_start();
include '../db.php';
include '../models/User.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['register'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];

        // Call the register_user function to insert the new user into the database
        if (register_user($conn, $username, $password, $email)) {
            $_SESSION['username'] = $username;
            header("Location: ../views/welcome.php");  // Redirect to a welcome page after successful registration
        } else {
            header("Location: ../views/register.php?error=1");  // Redirect back to registration with an error
        }
    }

    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Call the login_user function to verify user credentials
        $user = login_user($conn, $username, $password);
        if ($user) {
            $_SESSION['username'] = $user['username'];
            header("Location: ../views/dashboard.php");  // Redirect to the user's dashboard upon successful login
        } else {
            header("Location: ../views/login.php?error=1");  // Redirect back to login with an error
        }
    }
}
?>
