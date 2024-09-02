<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Casa del Cafe</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php include 'header.php'; ?>

    <div class="container mt-5">
        <h2>Register</h2>
        <form action="register.php" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control"
                    value="<?php echo htmlspecialchars($username); ?>">
                <span class="text-danger"><?php echo htmlspecialchars($username_err); ?></span>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="<?php echo htmlspecialchars($email); ?>">
                <span class="text-danger"><?php echo htmlspecialchars($email_err); ?></span>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" id="password" pattern=".{8,}"
                    title="Eight or more characters">
                <span class="text-danger"><?php echo htmlspecialchars($password_err); ?></span>
            </div>
            <div class="form-group">
                <input type="checkbox" onclick="togglePasswordVisibility()"> Show Password
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control">
                <span class="text-danger"><?php echo htmlspecialchars($confirm_password_err); ?></span>
            </div>
            <div class="form-group">
                <label>
                    <input type="checkbox" name="is_admin" value="1"> Register as Admin
                </label>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Register">
            </div>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
    </div>
    <?php include 'footer.php'; ?>

    <script>
        function togglePasswordVisibility() {
            var passwordField = document.getElementById("password");
            if (passwordField.type === "password") {
                passwordField.type = "text";
            } else {
                passwordField.type = "password";
            }
        }
    </script>

</body>

</html>