<?php
$title = "Search Page";
ob_start();
?>
<link rel="stylesheet" href="<?= base_url('/public/css/pages/searchResults.css') ?>">
<link rel="stylesheet" href="<?= base_url('/public/css/components/booksBanner.css') ?>">

<div class="searchPageContainer">
    <?php if (isset($query) && !empty($query)): ?>
        <div class="searchBanner">
            <h1>Search Results for "<?= htmlspecialchars($query) ?>"</h1>
        </div>
    <?php endif; ?>
    <div class="searchFilter"></div>
    <div class="bookSearchContent">
        <?php if (empty($results)): ?>
            <p>No results found.</p>
        <?php else: ?>
            <ul>
                <div class="pro-container">
                    <?php
                    if (isset($results) && is_iterable($results)) : ?>
                        <?php foreach ($results as $book) : ?>

                            <div class="pro">
                                <form class="formToDetailBook" action="<?= base_url('/book/' . $book['id']) ?>" method="get">
                                    <button class="buttonImagePreview" type="submit">
                                        <img class="previewBookImg" src="<?= base_url('/uploads/' . $book['id'] . '/' . $book['image_url']) ?>" alt="<?= htmlspecialchars($book['name']) ?>" border="0">
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
                            </div>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <h1>No books found.</h1>
                    <?php endif; ?>
                </div>
            </ul>
            <div class="pagination">
                <ul class="pagination-ul">
                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                        <li class="pagination-li">
                            <a href="<?= base_url('/search?query=' . urlencode($query) . '&page=' . $i) ?>" class="<?= $i == $currentPage ? 'active' : '' ?>"><?= $i ?></a>
                        </li>
                    <?php endfor; ?>
                </ul>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php
$content = ob_get_clean();
include __DIR__ . '/../layout/layout.php';
?>