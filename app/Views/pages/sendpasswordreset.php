<?php
require_once __DIR__ . '/../../../vendor/autoload.php';

use Models\User;
use Utils\AuthUtil;

$email = $_POST["email"];
$userModel = new User();

if ($userModel->setPasswordResetToken($email)) {
    // Lấy token
    $token = $userModel->getPasswordResetToken($email);

    // Send email
    $mail = require __DIR__ . '/../../Controllers/Mailer.php';
    $mail->setFrom("noreply@example.com");
    $mail->addAddress($email);
    $mail->Subject = "Password Reset";
    $mail->Body = <<<END
    Click <a href="http://localhost/PHP_Book_ECommerce/resetpassword?token=$token">ở đáy</a> 
    để đặt lại mật khẩu.
    END;

    try {
        $mail->send();
    } catch (Exception $e) {
        echo "Email không được gửi : {$mail->ErrorInfo}";
    }

    // Success message
    $title = "Gửi liên kết đặt lại mật khẩu";
    ob_start();
?>
    <div class="auth-container">
        <h2>Gửi liên kết đặt lại mật khẩu</h2>
        <p>Chúng tôi đã gửi một email chứa liên kết đặt lại mật khẩu đến địa chỉ email của bạn. Vui lòng kiểm tra hộp thư đến hoặc thư rác của bạn.</p>
    </div>
<?php
    $content = ob_get_clean();
    include __DIR__ . '/../layout/layout.php';
} else {
    // Error handling
    die("Có lỗi xảy ra khi gửi liên kết đặt lại mật khẩu.");
}
?>
?>