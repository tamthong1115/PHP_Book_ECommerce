<?php
$title = "Liên hệ";
ob_start();
?>
<div class="xin-chao">
    <h1>Xin chào, bạn cần hỗ trợ gì vậy?</h1><br>
    <div class="tim-kiem-tro-giup">
        <input type="text" placeholder="Tìm kiếm trợ giúp">
        <button>Tìm kiếm</button>
</div>
<?php
$content = ob_get_clean();
include __DIR__ . '/../layout/layout.php';
?>
