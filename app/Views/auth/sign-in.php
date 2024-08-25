<link rel="stylesheet" href="<?= base_url('/public/css/pages/auth.css') ?>">
<div class="auth-container">
    <form id="signInForm" action="<?= base_url('/sign-in') ?>" method="POST">
        <h2>Đăng nhập</h2>
        <div id="message" class="message"></div> <!-- Message div added here -->
        <?php if (isset($error)): ?>
            <p class="error"><?= $error ?></p>
        <?php endif; ?>
        <div class="form-group">
            <div class="error-message" id="identifierError"></div>
            <input type="text" id="identifier" name="identifier" placeholder="Email hoặc username" minlength="5" required>
        </div>
        <div class="form-group">
            <div class="error-message" id="passwordError"></div>
            <input type="password" id="password" name="password" placeholder="Mật khẩu" minlength="6" required>
        </div>
        <input type="hidden" id="redirectUrl" name="redirectUrl" value="">
        <button type="submit">Đăng nhập</button>
        <div class="navigate-container">
            <p>Chưa có tài khoản?</p>
            <a href="#" class="open-modal-signUp">Đăng ký tại đây</a>
        </div>
    </form>
</div>
<script>
    document.getElementById('identifier').addEventListener('blur', function() {
        const identifier = this.value;
        const errorMessage = document.getElementById('identifierError');
        if (identifier === '') {
            errorMessage.textContent = '';
            errorMessage.style.display = 'none';
        } else if (identifier.length < 5) {
            errorMessage.textContent = 'Tài khoản phải dài ít nhất 5 ký tự.';
            errorMessage.style.display = 'block';
        } else {
            errorMessage.textContent = '';
            errorMessage.style.display = 'none';
        }
    });
    document.getElementById('password').addEventListener('blur', function() {
        const password = this.value;
        const errorMessage = document.getElementById('passwordError');
        if (password === '') {
            errorMessage.textContent = '';
            errorMessage.style.display = 'none';
        } else if (password.length < 6) {
            errorMessage.textContent = 'Mật khẩu phải dài ít nhất 6 ký tự.';
            errorMessage.style.display = 'block';
        } else {
            errorMessage.textContent = '';
            errorMessage.style.display = 'none';
        }
    });
    document.querySelector('.open-modal-signUp').addEventListener('click', function(event) {
        event.preventDefault();
    });
</script>