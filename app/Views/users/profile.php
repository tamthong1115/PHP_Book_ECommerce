<?php
$title = 'Trang cá nhân';
ob_start();
?>
<link rel="stylesheet" href="<?= base_url('/public/css/pages/profile.css') ?>">
<div class="profile-container">
    <h1>Trang cá nhân</h1>
    <div class="profile-card">
        <img src="<?= htmlspecialchars($user['avatar'] ?? '') ?>" alt="Avatar" class="avatar">
        <p><?= htmlspecialchars(($user['first_name'] ?? 'Thêm họ') . ' ' . ($user['last_name'] ?? 'Thêm tên')) ?></p>
        <p><strong>Tên tài khoản:</strong> <?= htmlspecialchars($user['username'] ?? 'Thêm tên tài khoản') ?></p>
        <p><strong>Email:</strong> <?= htmlspecialchars($user['email'] ?? 'Thêm email') ?></p>
        <p><strong>Số điện thoại:</strong> <?= htmlspecialchars($user['phone_number'] ?? 'Thêm số điện thoại') ?></p>
        <p><strong>Ngày sinh:</strong> <?= htmlspecialchars($user['birth_of_date'] ?? 'Thêm ngày sinh') ?></p>
        <p><strong>Địa chỉ:</strong>
            <?php
            $addressParts = array_filter([
                $user['address_line_1'] ?? '',
                $user['address_line_2'] ?? '',
                $user['province'] ?? '',
                $user['ward'] ?? '',
                $user['district'] ?? ''
            ]);
            echo htmlspecialchars(implode(', ', $addressParts) ?: 'Thêm địa chỉ');
            ?>
        </p>
        <a href="<?= base_url('/users/updateProfile') ?>" class="btn">Chỉnh sửa</a>
    </div>
</div>

<?php
$content = ob_get_clean();
include __DIR__ . '/../layout/layout.php';
?>