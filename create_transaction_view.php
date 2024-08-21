<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Transaction | Casa del Cafe</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">Casa del Cafe</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="products.php">Products</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="view_cart.php">Cart</a>
            </li>
        </ul>
        <ul class="navbar-nav">
            <?php if (isset($_SESSION['user_id'])): ?>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        Logged in as <?php echo htmlspecialchars($_SESSION['username']); ?>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="register.php">Register</a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>

    <div class="container mt-5">
        <h2>Create Transaction</h2>
        <form action="create_transaction.php" method="post">
            <div class="form-group">
                <label for="order_id">Order ID</label>
                <input type="number" id="order_id" name="order_id" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="payment_method">Payment Method</label>
                <input type="text" id="payment_method" name="payment_method" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="payment_status">Payment Status</label>
                <input type="text" id="payment_status" name="payment_status" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="transaction_amount">Transaction Amount (€)</label>
                <input type="number" id="transaction_amount" name="transaction_amount" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="transaction_reference">Transaction Reference</label>
                <input type="text" id="transaction_reference" name="transaction_reference" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Create Transaction</button>
        </form>

        <?php if (isset($message)): ?>
            <div class="alert alert-info mt-3">
                <?php echo htmlspecialchars($message); ?>
            </div>
        <?php endif; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.amazonaws.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

