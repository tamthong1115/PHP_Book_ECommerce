<?php
$title = "Order Success";
ob_start();
?>
<link rel="stylesheet" href="<?= base_url('/public/css/pages/order/orderSuccess.css') ?>">

<div class="order-success-container">
    <div class="order-success-message">
        <h1>Thank You!</h1>
        <p>Your order has been placed successfully.</p>
        <p>Order ID: <strong><?php echo htmlspecialchars($orderId); ?></strong></p>
        <a href="<?= base_url('/') ?>" class="btn">Continue Shopping</a>
    </div>
</div>

<?php
$content = ob_get_clean();
include __DIR__ . '/../layout/layout.php';
?>