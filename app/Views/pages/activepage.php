<?php
require_once __DIR__ . '/../../../vendor/autoload.php'; // Adjust the path as needed

use Models\User;
use Utils\AuthUtil;
function base_url($route = '')
{
    return BASE_URL . $route;
}
define('BASE_URL', '/PHP_Book_ECommerce'); 

$token = $_GET["token"];



$userModel = new User();
$user = $userModel->findByActivationHash($token);

 if ($user === false) {
     die("Bạn đã xác nhận xong rồi hoăc mã xác nhận không hợp lệ");
}

$userModel->activateUser($user["id"]);
?>
<?php
$title = "Liên hệ";
ob_start();
?>
    <h1>Account Activated</h1>
    <p>Account activated successfully. You can now
       <a href="<?php base_url('/home.php'); ?>">log in</a></p>
<?php
$content = ob_get_clean();
include __DIR__ . '/../layout/layout.php';
?>