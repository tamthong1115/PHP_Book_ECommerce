<?php
$title = htmlspecialchars($book['name']);
ob_start();
?>
<link rel="stylesheet" href="<?= base_url('/public/css/pages/bookDetail.css') ?>">
<main>
    <section id="bookDetail" class="section-p1">
        <div class="book-images">
            
        <div class="slideshow-container">
                <?php foreach ($book['images'] as $index => $image): ?>
                    <div class="mySlides fade">
                        <img src="<?= base_url('/uploads/' . $book['id'] . '/' . $image) ?>" alt="<?= htmlspecialchars($book['name']) ?>">
                    </div>
                <?php endforeach; ?>
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
            </div>
        </div>
        <div class="book-info">
            <h1><?= htmlspecialchars($book['name']) ?></h1>
            <h2>Sáng tác bởi: <?= htmlspecialchars($book['author']) ?></h2>
            <p class="description">
        <?= substr($book['description'], 0, 1000) ?>...
        <span class="more-text" style="display: none;"><?= substr($book['description'], 100) ?></span>
        <button class="read-more-btn">Xem thêm</button>
            </p>
            <h3>$<?= htmlspecialchars($book['price']) ?></h3>
            <form class="formAddToCart" action="<?= base_url('/cart/add/' . $book['id']) ?>" method="POST">
                                <button type="submit" class="add-to-cart" data-book-id="<?= $book['id'] ?>">
                                    Thêm vào giỏ hàng
                                </button>
                            </form>
            <form class="formAddToCart" action="<?= base_url('/cart/add/' . $book['id']) ?>" method="POST">
                                <button type="submit" class="add-to-cart" data-book-id="<?= $book['id'] ?>">
                                    Mua ngay
                                </button>
                            </form>
        </div>
    </section>
    <script>
        let slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
        showSlides(slideIndex += n);
        }

        function showSlides(n) {
        let i;
        let slides = document.getElementsByClassName("mySlides");
         if (n > slides.length) {slideIndex = 1}
         if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
         slides[i].style.display = "none";
         }
        slides[slideIndex-1].style.display = "block";
        }
        document.addEventListener('DOMContentLoaded', function() {
    const readMoreBtn = document.querySelector('.read-more-btn');
    const moreText = document.querySelector('.more-text');

    readMoreBtn.addEventListener('click', function() {
        if (moreText.style.display === 'none') {
            moreText.style.display = 'inline';
            readMoreBtn.textContent = 'Thu gọn';
        } else {
            moreText.style.display = 'none';
            readMoreBtn.textContent = 'Xem thêm';
        }
    });
});  
const formAddToCart = document.querySelectorAll('.formAddToCart');
    formAddToCart.forEach(form => {
        form.addEventListener('submit', (e) => {
            e.preventDefault();
            const bookId = form.querySelector('.add-to-cart').getAttribute('data-book-id');
            fetch('<?= base_url('/cart/add/') ?>' + bookId, {
                method: 'POST',
            }).then(response => {
                if (response.ok) {
                    alert('Added to cart successfully');
                } else {
                    alert('Failed to add to cart');
                }
            });
        });
    });
     </script>
</main>
<?php
$content = ob_get_clean();
include __DIR__ . '/../layout/layout.php';
?>