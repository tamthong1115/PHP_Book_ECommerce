<?php
$title = "Đăng nhập";
ob_start();
?>
<link rel="stylesheet" href="<?= base_url('/public/css/pages/auth.css') ?>">
<div class="auth-container">
    <form action="<?= base_url('/sign-in') ?>" method="POST">
        <h2>Đăng nhập</h2>
        <?php if (isset($error)): ?>
            <p class="error"><?= $error ?></p>
        <?php endif; ?>
        <div class="form-group">
            <input type="text" id="identifier" name="identifier" placeholder="Email hoặc username" required>
        </div>
        <div class="form-group">
            <input type="password" id="password" name="password" placeholder="Mật khẩu" required>
        </div>
        <button type="submit">Đăng nhập</button>
        <p>Chưa có tài khoản? <a href="<?= base_url('/sign-up') ?>">Đăng ký tại đây</a></p>
    </form>
</div>
<?php
$content = ob_get_clean();
include __DIR__ . '/../layout/layout.php';
?>