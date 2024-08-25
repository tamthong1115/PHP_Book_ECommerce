<?php
$title = "Nhà sách TamThong";
ob_start();
?>
<link rel="stylesheet" href="<?= base_url('/public/css/pages/home.css') ?>">
<section id="mainBanner" style="background-image: url('<?= base_url('/public/img/hero/hero.png') ?>');">
    <h4>Ưu đãi đổi trả</h4>
    <h2>Giá trị siêu hời</h2>
    <h1>Trên tất cả sản phẩm</h1>
    <p>Tiết kiệm hơn với phiếu giảm giá & giảm giá lên đến 70%!</p>
    <button type="button" style="background-image: url('<?= base_url('/public/img/hero/button.png') ?>');">Shop Now</button>
</section>

<section id="groupOfFeatures" class="section-p1">
    <div class="feature"> <img src="<?= base_url("/public/img/features/f1.png") ?>" alt="">
        <h6>Free Shipping</h6>
    </div>
    <div class="feature"> <img src="<?= base_url("/public/img/features/f2.png") ?>" alt="">
        <h6>Online Order</h6>
    </div>
    <div class="feature"> <img src="<?= base_url("/public/img/features/f3.png") ?>" alt="">
        <h6>Save Money</h6>
    </div>
    <div class="feature"> <img src="<?= base_url("/public/img/features/f4.png") ?>" alt="">
        <h6>Promotions</h6>
    </div>
    <div class="feature"> <img src="<?= base_url("/public/img/features/f5.png") ?>" alt="">
        <h6>Happy Sellers</h6>
    </div>
    <div class="feature"> <img src="<?= base_url("/public/img/features/f6.png") ?>" alt="">
        <h6>24/7 Support</h6>
    </div>
</section>

<!-- sách mới nhất -->
<?php $books = $newestBooks; ?>
<?php $bannerTitle = "Sách Mới Nhất"; ?>
<?php include __DIR__ .  '/../components/booksBanner.php'; ?>

<!-- sách văn học -->
<?php $books = $bookLiteratures; ?>
<?php $bannerTitle = "Sách Văn Học"; ?>
<?php include __DIR__ .  '/../components/booksBanner.php'; ?>



<?php
$content = ob_get_clean();
include __DIR__ . '/../layout/layout.php';
?>