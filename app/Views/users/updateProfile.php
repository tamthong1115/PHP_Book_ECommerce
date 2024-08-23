<?php
$title = 'Trang cá nhân';
ob_start();
?>
<link rel="stylesheet" href="<?= base_url('/public/css/pages/profile.css') ?>">

<div class="update-profile-container">
    <h1>Update Profile</h1>
    <form action="<?= base_url('/users/updateProfile') ?>" method="POST" class="update-profile-form">
        <label for="avatar">Avatar URL:</label>
        <input type="text" id="avatar" name="avatar" value="<?= htmlspecialchars($user['avatar'] ?? '') ?>">

        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" value="<?= htmlspecialchars($user['first_name'] ?? '') ?>">

        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name" value="<?= htmlspecialchars($user['last_name'] ?? '') ?>">

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?= htmlspecialchars($user['email'] ?? '') ?>">

        <label for="phone_number">Phone Number:</label>
        <input type="text" id="phone_number" name="phone_number" value="<?= htmlspecialchars($user['phone_number'] ?? '') ?>">

        <label for="birth_of_date">Birth Date:</label>
        <input type="date" id="birth_of_date" name="birth_of_date" value="<?= htmlspecialchars($user['birth_of_date'] ?? '') ?>">

        <label for="address_line_1">Address Line 1:</label>
        <input type="text" id="address_line_1" name="address_line_1" value="<?= htmlspecialchars($user['address_line_1'] ?? '') ?>">

        <label for="address_line_2">Address Line 2:</label>
        <input type="text" id="address_line_2" name="address_line_2" value="<?= htmlspecialchars($user['address_line_2'] ?? '') ?>">

        <label for="ward">Ward:</label>
        <input type="text" id="ward" name="ward" value="<?= htmlspecialchars($user['ward'] ?? '') ?>">

        <label for="district">District:</label>
        <input type="text" id="district" name="district" value="<?= htmlspecialchars($user['district'] ?? '') ?>">

        <label for="city">City:</label>
        <input type="text" id="city" name="city" value="<?= htmlspecialchars($user['city'] ?? '') ?>">

        <button type="submit">Submit</button>
    </form>
</div>


<?php
$content = ob_get_clean();
include __DIR__ . '/../layout/layout.php';
?>