<?php
$title="Đặt lại mật khẩu";
ob_start();
use Models\User;

$token = $_GET["token"];
$token_hash = hash("sha256", $token);
$userModel = new User();
$user = $userModel->findByResetTokenHash($token);
if ($user === false) {
    header("Location: resetpassword?token=$token&error=Token không hợp lệ hoặc đã hết hạn.");
    exit();
}
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (strtotime($user["reset_token_expires_at"]) <= time()) {
        header("Location: resetpassword?token=$token&error=Token đã hết hạn.");
        exit();
    }
    if (strlen($_POST["password"]) < 8) {
        header("Location: resetpassword?token=$token&error=Mật khẩu phải có ít nhất 8 ký tự.");
        exit();
    }
    if ($_POST["password"] !== $_POST["password_confirmation"]) {
        header("Location: resetpassword?token=$token&error=Mật khẩu không khớp.");
        exit();
    }
    $password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $userModel->updatePassword($user["id"], $password_hash);
    echo "<script>
        alert('Mật khẩu đã được cập nhật. Bạn có thể đăng nhập ngay bây giờ.');
        window.location.href = '" . base_url('/') . "';
    </script>";
    exit();
}
$error = isset($_GET["error"]) ? $_GET["error"] : "";
?>
    <div class="auth-container">
        <?php if ($error): ?>
            <p class="error"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>
        <form method="POST" action="">
            <h2>Đặt lại mật khẩu</h2>
            <div class="form-group">
                <input type="password" name="password" placeholder="Mật khẩu mới" minlength="8" required>
            </div>
            <div class="form-group">
                <input type="password" name="password_confirmation" placeholder="Xác nhận mật khẩu mới" minlength="8" required>
            </div>
            <button type="submit">Đặt lại mật khẩu</button>
        </form>
    </div>
<?php
$content = ob_get_clean();
include __DIR__ . '/../layout/layout.php';
?>