<?php

use Utils\AuthUtil; ?>

<link rel="stylesheet" href="<?= base_url('/public/css/components/booksBanner.css') ?>">
<section id="product1" class="section-p1">
    <h2><?= $bannerTitle ?></h2>
    <p>Summer Collection New Morden Design</p>
    <div class="pro-container">
        <?php
        if (isset($books) && is_iterable($books)) : ?>
            <?php foreach ($books as $book) : ?>
                <div class="pro">
                    <a href="<?= base_url('/book/' . $book['id']) ?>">
                        <img src="<?= base_url('/uploads/' . $book['id'] . '/' . $book['image']) ?>" alt="<?= htmlspecialchars($book['name']) ?>">
                    </a>
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
                            <a class="add-to-cart" data-book-id="<?= $book['id'] ?>">
                                <img id="cart" src="<?= base_url('/public/img/header/cart-shopping-solid.svg') ?>" alt="">
                            </a>
                        </span>

                        <?php if (AuthUtil::isAdmin()) : ?>
                            <form action="<?= base_url('/admin/books/delete/' . $book['id']) ?>" method="POST" onsubmit="return confirm('Are you sure you want to delete this book?');">
                                <button type="submit">Delete</button>
                            </form>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <h1>No books found.</h1>
        <?php endif; ?>
    </div>
</section>
<script>
    document.querySelectorAll('.add-to-cart').forEach(function(button) {
        button.addEventListener('click', function() {
            const bookId = this.getAttribute('data-book-id');
            fetch('<?= base_url('/cart/add/') ?>' + bookId, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    credentials: 'include'
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('An error occurred while adding the book to the cart.');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        alert('Book added to cart successfully!');
                    } else {
                        alert('Failed to add book to cart: ' + data.message);
                    }
                })
                .catch(error => {
                    console.log('Error:', error);
                    alert('An error occurred while adding the book to the cart.');
                });
        });
    });
</script>