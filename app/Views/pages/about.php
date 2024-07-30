<?php
$title = "About Us";
ob_start();
?>
    <h1>About Us</h1>
    <p>We are a leading e-commerce platform providing a wide range of products to our customers.</p>
<?php
$content = ob_get_clean();
include __DIR__ . '/../layout/layout.php';
?>