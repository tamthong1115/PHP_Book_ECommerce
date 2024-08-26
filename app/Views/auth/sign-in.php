<link rel="stylesheet" href="<?= base_url('/public/css/pages/auth.css') ?>">
<div class="auth-container">
    <form id="signInForm" action="<?= base_url('/sign-in') ?>" method="POST">
        <h2>Đăng nhập</h2>
        <div id="message" class="message"></div> <!-- Message div added here -->
        <?php if (isset($error)): ?>
            <p class="error"><?= $error ?></p>
        <?php endif; ?>
        <div class="form-group">
            <input type="text" id="identifier" name="identifier" placeholder="Email hoặc username" minlength="5" required>
            <div class="error-message" id="identifierError"></div>
        </div>
        <div class="form-group">
            <input type="password" id="sign-in-password" name="sign-in-password" placeholder="Mật khẩu" minlength="6" required>
            <div class="error-message" id="passwordError"></div>
        </div>
        <input type="hidden" id="redirectUrl" name="redirectUrl" value="">
        <button type="submit">Đăng nhập</button>
        <div class="navigate-container">
            <p>Chưa có tài khoản?</p>
            <a href="#" class="open-modal-signUp">Đăng ký tại đây</a>
        </div>
    </form>
</div>