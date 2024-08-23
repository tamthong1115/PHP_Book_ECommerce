<?php
$title = 'Trang cá nhân';
ob_start();
?>
<link rel="stylesheet" href="<?= base_url('/public/css/pages/profile.css') ?>">
<div class="profile-container">
    <h1>User Profile</h1>
    <div class="profile-card">
        <img src="<?= htmlspecialchars($user['avatar'] ?? '') ?>" alt="Avatar" class="avatar">
        <p><?= htmlspecialchars(($user['first_name'] ?? 'Add your first name') . ' ' . ($user['last_name'] ?? 'Add your last name')) ?></p>
        <p><strong>Username:</strong> <?= htmlspecialchars($user['username'] ?? 'Add your username') ?></p>
        <p><strong>Email:</strong> <?= htmlspecialchars($user['email'] ?? 'Add your email') ?></p>
        <p><strong>Phone Number:</strong> <?= htmlspecialchars($user['phone_number'] ?? 'Add your phone number') ?></p>
        <p><strong>Birth Date:</strong> <?= htmlspecialchars($user['birth_of_date'] ?? 'Add your birth date') ?></p>
        <p><strong>Address:</strong>
            <?php
            $addressParts = array_filter([
                $user['address_line_1'] ?? '',
                $user['address_line_2'] ?? '',
                $user['ward'] ?? '',
                $user['district'] ?? '',
                $user['city'] ?? ''
            ]);
            echo htmlspecialchars(implode(', ', $addressParts) ?: 'Add your address');
            ?>
        </p>
        <a href="<?= base_url('/users/updateProfile') ?>" class="btn">Edit Profile</a>
    </div>
</div>

<?php
$content = ob_get_clean();
include __DIR__ . '/../layout/layout.php';
?>