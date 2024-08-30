<?php

use Utils\AuthUtil;
use Utils\Helpers;

$helpers = new Helpers();
?>

<link rel="stylesheet" href="<?= base_url('/public/css/components/booksBanner.css') ?>">
<section id="product1" class="section-p1">
    <h2><?= $bannerTitle ?></h2>
    <p>Khám phá thế giới tri thức vô tận với những cuốn sách hay nhất tại cửa hàng của chúng tôi.</p>
    <div class="pro-container">
        <?php
        if (isset($books) && is_iterable($books)) : ?>
            <?php foreach ($books as $book) : ?>

                <div class="pro">
                    <form class="formToDetailBook" action="<?= base_url('/book/' . $book['id']) ?>" method="get">
                        <button class="buttonImagePreview" type="submit">
                            <img class="previewBookImg" src="<?= $helpers->getPathImg($book['id'], $book['image']) ?>" alt="<?= htmlspecialchars($book['name']) ?>" border="0">
                        </button>
                    </form>
                    <div class="description">
                        <span id="brandGrid"><?= htmlspecialchars($book['author']) ?></span>
                        <h5 id="T-styleGrid"><?= htmlspecialchars($book['name']) ?></h5>
                        <div id="starsforgrid" class="stars">
                            <img class="star_rating" src="<?= base_url('/public/img/star.svg') ?>" alt="">
                            <img class="star_rating" src="<?= base_url('/public/img/star.svg') ?>" alt="">
                            <img class="star_rating" src="<?= base_url('/public/img/star.svg') ?>" alt="">
                            <img class="star_rating" src="<?= base_url('/public/img/star.svg') ?>" alt="">
                            <img class="star_rating" src="<?= base_url('/public/img/star.svg') ?>" alt="">
                        </div>
                        <h5 id="priceGrid" class="price">$<?= htmlspecialchars($book['price']) ?></h5>
                        <span id="cartGrid" class="productCart">
                            <form class="formAddToCart" action="<?= base_url('/cart/add/' . $book['id']) ?>" method="POST">
                                <button type="submit" class="add-to-cart" data-book-id="<?= $book['id'] ?>">
                                    <img id="cart" src="<?= base_url('/public/img/header/cart-shopping-solid.svg') ?>" alt="">
                                </button>
                            </form>
                        </span>

                    </div>
                    <?php if (AuthUtil::isAdmin()) : ?>
                        <div class="delete-book-container">
                            <form class="delete-book-form" action="<?= base_url('/admin/books/delete/' . $book['id']) ?>" method="POST" onsubmit="return confirm('Are you sure you want to delete this book?');">
                                <button type="submit">Delete</button>
                            </form>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <h1>No books found.</h1>
        <?php endif; ?>
    </div>
</section>

<script>
    // Immediately invoked function expression (IIFE)
    (function() {
        const formAddToCart = document.querySelectorAll('.formAddToCart');
        formAddToCart.forEach(form => {
            form.addEventListener('submit', (e) => {
                e.preventDefault();
                const bookId = form.querySelector('.add-to-cart').getAttribute('data-book-id');
                fetch('<?= base_url('/cart/add/') ?>' + bookId, {
                    method: 'POST',
                }).then(response => {
                    if (response.ok) {
                        showMessage('success', "Thêm vào giỏ hàng thành công");
                    } else {
                        showMessage('error', "Thêm vào giỏ hàng thất bại");
                    }
                });
            });
        });
    })();
</script>