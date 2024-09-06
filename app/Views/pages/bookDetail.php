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
            <h3 id="price-in-detail">$<?= htmlspecialchars($book['price']) ?></h3>
            <div class="book-detail-buttons">
            <form class="formAddToCart" action="<?= base_url('/cart/add/' . $book['id']) ?>" method="POST">
                <button type="submit" class="add-to-cart" data-book-id="<?= $book['id'] ?>">
                    Thêm vào giỏ hàng
                </button>
            </form>
            <form class="" action="" method="POST">
                <button type="submit" class="book-detail-submit" data-book-id="<?= $book['id'] ?>">
                    Mua ngay
                </button>
            </form>
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
            
            </div>
        
        
    </section>
    <div class="thongtinchitiet">
            <h2>Thông tin chi tiết</h2>
            <p>Tên nhà cung cấp: <?= htmlspecialchars($book['supplier']) ?></p>
            <p>Tác giả: <?= htmlspecialchars($book['author']) ?></p>
            <p>Nhà xuất bản: <?= htmlspecialchars($book['publisher']) ?></p>
            <p>Năm xuất bản: <?= htmlspecialchars($book['publication_year']) ?></p>
            <p>Ngôn ngữ: <?= htmlspecialchars($book['language']) ?></p>
            <p>Số trang: <?= htmlspecialchars($book['pages']) ?></p>
            <p>Trọng lượng(gram): <?= htmlspecialchars($book['weight']) ?></p>
            <p>Hình thức: <?= htmlspecialchars($book['format']) ?></p>
        </div>
        <div class="similar-books">
    <h2>Sách tương tự từ nhà xuất bản <?= htmlspecialchars($book['publisher']) ?></h2>
    <div class="book-list">
        <?php if (!empty($similarBooks) && is_array($similarBooks)): ?>
            <?php foreach ($similarBooks as $similarBook): ?>
                <div class="book-item">
                <?php
                    $bookModel = new \Models\Book;
                    $image = $bookModel->getFirstImage($similarBook['id']);
                    ?>
                    <img src="<?= htmlspecialchars($image) ?>" alt="<?= htmlspecialchars($similarBook['name'] ?? '') ?>">
    <h3><?= htmlspecialchars($similarBook['name'] ?? '') ?></h3>
    <p><?= htmlspecialchars($similarBook['author'] ?? '') ?></p>
    <p><?= htmlspecialchars($similarBook['price'] ?? '0') ?> VND</p>
    <a href="<?= base_url('/bookDetail/' . ($similarBook['id'] ?? '')) ?>">Xem chi tiết</a>
</div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Không có sách tương tự nào.</p>
        <?php endif; ?>
    </div>
</div>
                    
    <script>
        let slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function showSlides(n) {
            let i;
            let slides = document.getElementsByClassName("mySlides");
            if (n > slides.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = slides.length
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slides[slideIndex - 1].style.display = "block";
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
                        showMessage('success', 'Thêm vào giỏ hàng thành công');
                    } else {
                        showMessage('error', 'Thêm vào giỏ hàng thất bại');
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