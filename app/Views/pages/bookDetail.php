<?php
$title = htmlspecialchars($book['name']);
ob_start();
?>
<link rel="stylesheet" href="<?= base_url('/public/css/pages/bookDetail.css') ?>">
<main>
    <section id="bookDetail" class="section-p1">
        <div class="book-images">
            <?php foreach ($book['images'] as $image): ?>
                <img src="<?= base_url('/uploads/' . $book['id'] . '/' . $image) ?>" alt="<?= htmlspecialchars($book['name']) ?>">
            <?php endforeach; ?>
        </div>
        <div class="book-info">
            <h1><?= htmlspecialchars($book['name']) ?></h1>
            <h2>by <?= htmlspecialchars($book['author']) ?></h2>
            <p><?= htmlspecialchars($book['description']) ?></p>
            <h3>$<?= htmlspecialchars($book['price']) ?></h3>
            <button type="button">Add to Cart</button>
        </div>
    </section>
</main>
<?php
$content = ob_get_clean();
include __DIR__ . '/../layout/layout.php';
?>