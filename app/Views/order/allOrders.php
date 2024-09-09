<?php

use Utils\Helpers;

$helpers = new Helpers();
$title = "Đơn đặt hàng";
ob_start();

?>
<link rel="stylesheet" href="<?= base_url('/public/css/pages/order/allOrders.css') ?>">
<div class="all-orders-container">
    <h1>Đơn đặt hàng</h1>
    <?php if (!empty($orders)): ?>
        <ul class="orders-list">
            <?php foreach ($orders as $order): ?>
                <li>
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
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Không tìm thấy đơn hàng nào.</p>
    <?php endif; ?>
</div>
<?php
$content = ob_get_clean();
include __DIR__ . '/../layout/layout.php';
?>