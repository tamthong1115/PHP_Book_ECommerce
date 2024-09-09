<?php
$title = "Tìm kiếm đơn hàng";
ob_start();
?>
<link rel="stylesheet" href="<?= base_url('/public/css/pages/order/searchTrackOrder.css') ?>">
<div class="search-track-order-container">
    <h1>Theo dõi đơn hàng</h1>
    <form action="<?= base_url('/order/search') ?>" method="GET" class="search-track-order-form">
        <input type="text" name="orderId" placeholder="Nhập mã đơn hàng." required>
        <button type="submit">Tìm đơn hàng</button>
    </form>
</div>
<?php
$content = ob_get_clean();
include __DIR__ . '/../layout/layout.php';
?>