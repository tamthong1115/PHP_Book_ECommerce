<?php

use Utils\Helpers;

$helpers = new Helpers();
$title = "Đơn hàng chi tiết";
ob_start();
?>

<link rel="stylesheet" href="<?= base_url('/public/admin/css/orders/orderDetailAdmin.css') ?>">
<main>
    <div class="order-detail-admin-container">
        <h1>Đơn hàng chi tiết</h1>
        <?php if (!empty($order)): ?>
            <div class="order-detail">
                <p>Mã đơn hàng: <strong><?= htmlspecialchars($order['order_id']); ?></strong></p>
                <p>Tên khách hàng:
                    <?php if (($order['username'])) :
                        echo htmlspecialchars($order['username']);
                    else :
                        echo htmlspecialchars($order['guest_name']) . " (Khách vãng lai)";
                    endif;
                    ?>
                </p>
                <p>Email: <?php
                            if ($order['email']) {
                                echo htmlspecialchars($order['email']);
                            } else if ($order['guest_email']) {
                                echo htmlspecialchars($order['guest_email']);
                            } else {
                                echo "Không có";
                            }

                            ?></p>
                <p>Địa chỉ 1: <?php
                                if ($order['address_line_1']) {
                                    echo htmlspecialchars($order['address_line_1']);
                                } else {
                                    echo "Không có";
                                }
                                ?></p>

                <ul class="order-items-list">
                    <?php foreach ($order['items'] as $item): ?>
                        <li class="order-li-container">
                            <div class="book-order-detail">
                                <?php if (!empty($item['image_url'])): ?>
                                    <div class="img-product-order">
                                        <img src="<?= $helpers->getPathImg($item['book_id'], $item['image_url']) ?>" alt="">
                                    </div>
                                <?php endif; ?>

                                <div class="book-order-detail-content">

                                    <p>Book Name: <?= htmlspecialchars($item['book_name']); ?></p>
                                    <div>
                                        <p>Quantity: <?= htmlspecialchars($item['quantity']); ?></p>
                                        <p>Price: <?= htmlspecialchars($item['price']); ?></p>
                                    </div>
                                </div>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php else: ?>
            <p>Không tìm thấy đơn hàng nào.</p>
        <?php endif; ?>
    </div>
</main>
<?php
$content = ob_get_clean();
include __DIR__ . '/../layout/layoutAdmin.php';
?>