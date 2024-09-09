<?php
$title = "Tất cả đơn hàng";
ob_start();
?>

<?php
$content = ob_get_clean();
include __DIR__ . '/../layout/layoutAdmin.php';
?>