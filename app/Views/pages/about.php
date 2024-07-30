<?php
$title = "About Us";
ob_start();
?>

<?php
$content = ob_get_clean();
include __DIR__ . '/../layout/layout.php';
?>