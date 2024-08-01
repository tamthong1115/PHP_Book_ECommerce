<?php
$title = "Home";
ob_start();
?>
    <h1>Welcome to the Home Page!</h1>
<?php
$content = ob_get_clean();
include __DIR__ . '/../layout/layout.php';
?>