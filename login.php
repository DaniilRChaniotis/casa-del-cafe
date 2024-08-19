<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login - Casa Del Café</title>
</head>
<body>
    <h2>Login</h2>
    <form action="../controllers/UserController.php" method="POST">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" name="login" value="Login">
    </form>
    <?php if (isset($_GET['error'])): ?>
        <p>Error: Invalid username or password. Please try again.</p>
    <?php endif; ?>
</body>
</html>
