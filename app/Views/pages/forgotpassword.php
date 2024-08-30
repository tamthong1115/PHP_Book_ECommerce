<?php
$title = "Quên mật khẩu";
ob_start();
?>
<div class="auth-container">
<form method="POST" action="<?= base_url('/sendpasswordreset') ?>">
    <h2>Quên mật khẩu</h2>
    <div class="form-group">
        <input type="email" id="email" name="email" placeholder="Email" required>
        <div class="error-message" id="emailError"></div>
    </div>
    <button type="submit">Gửi liên kết đặt lại mật khẩu</button>
</form>
</div>
<?php
$content = ob_get_clean();
include __DIR__ . '/../layout/layout.php';
?>
