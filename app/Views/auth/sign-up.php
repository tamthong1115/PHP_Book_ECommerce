<?php
$title = "Đăng ký";
ob_start();
?>

<link rel="stylesheet" href="<?= base_url('/public/css/pages/auth.css') ?>">
<div class="auth-container">
    <form action="<?= base_url('/sign-up') ?>" method="POST">

        <h2>Đăng ký</h2>
        <div class="form-group">
            <input type="text" id="username" name="username" placeholder="Username" required>
        </div>
        <div class="form-group">
            <input type="email" id="email" name="email" placeholder="Email (Tuỳ chọn)">
        </div>
        <div class="form-group">
            <input type="password" id="password" name="password" placeholder="Mật khẩu" required>
        </div>
        <div class="form-group">
            <input type="password" id="confirm-password" name="confirm-password" placeholder="Xác nhận lại mật khẩu" required>
        </div>
        <button type="submit">Đăng ký</button>
        <p>Đã có tài khoản? <a href="<?= base_url('/sign-in') ?>">Đăng nhập tại đây</a></p>
    </form>
</div>
<?php
$content = ob_get_clean();
include __DIR__ . '/../layout/layout.php';
?>