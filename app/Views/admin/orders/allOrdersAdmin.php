<?php
$title = "Tất cả đơn hàng";
ob_start();
?>
<link rel="stylesheet" href="<?= base_url('/public/css/pages/order/allOrders.css') ?>">
<main>
    <div class="all-orders-admin-container">
        <div class="recent-orders">
            <h2>Tất cả đơn hàng</h2>
            <table id="recent-orders--table">
                <thead>
                    <tr>
                        <th>Tên khách hàng</th>
                        <th>Tên sách</th>
                        <th>Trạng thái</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orders as $order): ?>
                        <tr>
                            <td>
                                <?php if (!empty($order['username'])): ?>
                                    <?= htmlspecialchars($order['username']); ?>
                                <?php else: ?>
                                    Khách vãng lai
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php $bookNames = join(", ", $order['books']); ?>
                                <?= htmlspecialchars($bookNames); ?>
                            </td>
                            <td><?= htmlspecialchars($order['status']); ?></td>
                            <td class="primary" data-order-id="<?= htmlspecialchars($order['id']); ?>">Chi tiết</td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const detailCells = document.querySelectorAll('td.primary');
        detailCells.forEach(cell => {
            cell.addEventListener('click', function() {
                const orderId = this.getAttribute('data-order-id');
                window.location.href = `<?= base_url('/admin/orders?orderId='); ?>${orderId}`;
            });
        });
    });
</script>
<?php
$content = ob_get_clean();
include __DIR__ . '/../layout/layoutAdmin.php';
?>