<?php
$title = "Add Book";
ob_start();
?>
<link rel="stylesheet" href="<?php echo base_url('/public/admin/css/books/addBook.css'); ?>">

<main>
    <h1>Thêm sách</h1>
    <form action="<?php echo base_url('/admin/books/add-book') ?>" method="POST" enctype="multipart/form-data">
        <input type="text" id="name" name="name" placeholder="Tên sách" required>
        <textarea id="description" name="description" placeholder="Mô tả" rows="10" required></textarea>
        <textarea type="text" id="summary" placeholder="Summary" name="summary" rows="4"></textarea>

        <label for="images" class="imageUploads">Chọn ảnh</label>
        <input type="file" id="images" name="images[]" accept="image/*" multiple required onchange="previewImages(event)">
        <div id="imagePreviews" style="margin-top: 10px; display:flex;flex-wrap: wrap;"></div>
        <div class="numberContainer">
            <input type="number" id="price" name="price" placeholder="Giá" required>
            <input type="number" id="stock" name="stock" placeholder="Số lượng" required>
        </div>
        <input type="text" id="author" name="author" placeholder="Tác giả" required>
        <input type="text" id="supplier" name="supplier" placeholder="Nhà cung cấp">
        <input type="text" id="publisher" name="publisher" placeholder="Nhà xuất bản">
        <label for="language">Ngôn ngữ:</label>
        <select id="language" name="language" required>
            <option value="Việt Nam">Việt Nam</option>
            <option value="English">English</option>
            <option value="French">French</option>
            <option value="Spanish">Spanish</option>
        </select>
        <input type="number" id="publication_year" name="publication_year" placeholder="Năm xuất bản" required>
        <div class="numberContainer">
            <input type="number" id="pages" name="pages" placeholder="Số trang" required>
            <input type="number" id="weight" name="weight" placeholder="Trọng lượng(g)">
        </div>
        <select name="format" id="format">
            <option value="Bìa mềm">Bìa mềm</option>
            <option value="Bìa cứng">Bìa cứng</option>
        </select>
        <label for="categories">Thể loại:</label>
        <div id="categories">
            <?php
            if (!isset($categories) || !is_iterable($categories)) {
                $categories = [];
            }
            ?>
            <?php foreach ($categories as $category) : ?>
                <div>
                    <input type="checkbox" id="category_<?php echo $category['id']; ?>" name="categories[]" value="<?php echo $category['id']; ?>">
                    <label for="category_<?php echo $category['id']; ?>"><?php echo $category['name']; ?></label>
                </div>
            <?php endforeach; ?>
        </div>
        <button type="submit">Add Book</button>
    </form>
    <script>
        function previewImages(event) {
            const input = event.target;
            const previewContainer = document.getElementById('imagePreviews');
            previewContainer.innerHTML = ''; // Clear any existing previews

            Array.from(input.files).forEach(file => {
                const reader = new FileReader();
                reader.onload = function() {
                    const img = document.createElement('img');
                    img.src = reader.result;
                    img.style.display = 'block';
                    img.style.maxWidth = '200px';
                    img.style.maxHeight = '200px';
                    img.style.width = 'auto';
                    img.style.height = 'auto';
                    img.style.padding = '10px';
                    img.style.marginTop = '10px';
                    previewContainer.appendChild(img);
                }
                reader.readAsDataURL(file);
            });
        }
    </script>
</main>

<?php
$content = ob_get_clean();
include __DIR__ . '/../layout/layoutAdmin.php';
?>