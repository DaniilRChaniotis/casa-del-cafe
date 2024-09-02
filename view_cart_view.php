<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart | Casa del Cafe</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <?php include 'header.php'; ?>

    <div class="container mt-5">
        <h1 class="mb-4">Your Cart</h1>

        <?php if (count($cart_items) > 0): ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cart_items as $item): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($item['name']); ?></td>
                            <td><?php echo number_format($item['price'], 2); ?></td>
                            <td><?php echo $item['quantity']; ?></td>
                            <td><?php echo number_format($item['subtotal'], 2); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <div class="text-right">
                <h4>Total: <?php echo number_format($total, 2); ?></h4>
            </div>

            <div class="text-right mt-3">
                <a href="checkout.php" class="btn btn-success">Proceed to Checkout</a>
            </div>
        <?php else: ?>
            <div class="alert alert-warning">
                Your cart is empty. <a href="products.php">Browse products</a> to add items to your cart.
            </div>
        <?php endif; ?>
    </div>

    <?php include 'footer.php'; ?>

</body>

</html>