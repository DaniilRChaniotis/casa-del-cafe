<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration - Casa Del Café</title>
</head>
<body>
    <h2>Register</h2>
    <form action="../controllers/UserController.php" method="POST">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>
        <input type="submit" name="register" value="Register">
    </form>
    <?php if (isset($_GET['error'])): ?>
        <p>Error: Could not register user. Please try again.</p>
    <?php endif; ?>
</body>
</html>
