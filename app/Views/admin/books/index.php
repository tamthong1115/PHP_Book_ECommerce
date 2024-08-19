<?php
$title = "Books Admin";
ob_start();
?>  
<style>
    #starsforgrid {
        display: flex;
    }
</style>
<main>
    <?php $books = $newestBooks; ?>
    <?php $bannerTitle = "Books Admin"; ?>
    <?php include __DIR__ .  '/../../components/booksBanner.php'; ?>

</main>
<?php
$content = ob_get_clean();
include __DIR__ . '/../layout/layoutAdmin.php';
?>