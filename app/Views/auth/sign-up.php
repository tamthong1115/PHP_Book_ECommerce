<link rel="stylesheet" href="<?= base_url('/public/css/pages/auth.css') ?>">
<div class="auth-container">
    <form id="signUpForm" action="<?= base_url('/sign-up') ?>" method="POST">
        <h2>Đăng ký</h2>
        <div class="form-group">
            <input type="text" id="username" name="username" placeholder="Username" minlength="5" required>
            <div class="error-message" id="usernameError"></div>
        </div>
        <div class="form-group">
            <input type="email" id="email" name="email" placeholder="Email">
            <div class="error-message" id="emailError"></div>
        </div>
        <div class="form-group">
            <input type="password" id="password" name="password" placeholder="Mật khẩu" minlength="6" required>
            <div class="error-message" id="passwordError"></div>
        </div>
        <div class="form-group">
            <input type="password" id="confirm_password" name="confirm_password" placeholder="Xác nhận lại mật khẩu" minlength="6" required>
            <div class="error-message" id="confirm_passwordError"></div>
        </div>
        <button type="submit">Đăng ký</button>
        <div class="navigate-container">
            <p>Đã có tài khoản?</p>
            <a href="#" class="open-modal-signIn">Đăng nhập tại đây</a>
        </div>
    </form>
    <input type="hidden" id="redirectUrl" name="redirectUrl" value="">
</div>