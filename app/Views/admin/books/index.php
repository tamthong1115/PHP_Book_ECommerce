<?php
$title = "Books Admin";
ob_start();
?>
<main>
    <h1>Books Admin</h1>
</main>
<?php
$content = ob_get_clean();
include __DIR__ . '/../layout/layoutAdmin.php';
?>