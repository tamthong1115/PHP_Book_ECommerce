<?php

use Utils\Helpers;

$helpers = new Helpers();
$title = "Track Order";
ob_start();
?>
<link rel="stylesheet" href="<?= base_url('/public/css/pages/order/trackOrder.css') ?>">
<div class="track-order-container">
    <h1>Track Order</h1>
    <?php if (!empty($order)): ?>
        <div class="order-details">
            <p>Mã đơn hàng: <strong><?= htmlspecialchars($order['id']); ?></strong></p>
            <p>Trạng thái: <?= htmlspecialchars($order['status']); ?></p>
            <ul class="order-items-list">
                <?php foreach ($order['items'] as $item): ?>
                    <li class="order-li-container">
                        <?php if (!empty($item['image_url'])): ?>
                            <div class="img-product-order">
                                <img src="<?= $helpers->getPathImg($item['book_id'], $item['image_url']) ?>" alt="">
                            </div>
                        <?php endif; ?>
                        <div class="book-order-detail">
                            <p>Tên sách: <?= htmlspecialchars($item['book_name']); ?></p>
                            <div>
                                <p>Số lượng: <?= htmlspecialchars($item['quantity']); ?></p>
                                <p>Giá: <?= htmlspecialchars($item['price']); ?></p>
                            </div>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php else: ?>
        <p>Order not found.</p>
    <?php endif; ?>
</div>
<?php
$content = ob_get_clean();
include __DIR__ . '/../layout/layout.php';
?>