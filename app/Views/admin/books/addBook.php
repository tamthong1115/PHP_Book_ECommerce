<?php
$title = "Add Book";
ob_start();
?>
<main>
    <h1>Add New Book</h1>
    <form action="<?php echo base_url('/admin/books/add-book') ?>" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <label for="description">Description:</label>
        <textarea id="description" name="description" required></textarea>
        <label for="summary">Summary:</label>
        <input type="text" id="summary" name="summary">
        <label for="price">Price:</label>
        <input type="number" step="0.01" id="price" name="price" required>
        <label for="stock">Stock:</label>
        <input type="number" id="stock" name="stock" required>
        <label for="author">Author:</label>
        <input type="text" id="author" name="author" required>
        <label for="publisher">Publisher:</label>
        <input type="text" id="publisher" name="publisher">
        <label for="categories">Categories:</label>
        <select id="categories" name="categories[]" multiple required>
            <!--  -->
            <?php foreach ($categories as $category) : ?>
                <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Add Book</button>
    </form>
</main>
<?php
$content = ob_get_clean();
include __DIR__ . '/../layout/layoutAdmin.php';
?>