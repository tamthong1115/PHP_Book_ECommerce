<?php
$title = 'Trang cá nhân';
ob_start();
?>
<link rel="stylesheet" href="<?= base_url('/public/css/pages/profile.css') ?>">

<div class="update-profile-container">
    <h1>Update Profile</h1>
    <form action="<?= base_url('/users/updateProfile') ?>" method="POST" class="update-profile-form">
        <label for="update_avatar">Avatar URL:</label>
        <input type="text" id="update_avatar" name="update_avatar" value="<?= htmlspecialchars($user['avatar'] ?? '') ?>">

        <label for="update_first_name">First Name:</label>
        <input type="text" id="update_first_name" name="update_first_name" value="<?= htmlspecialchars($user['first_name'] ?? '') ?>">

        <label for="update_last_name">Last Name:</label>
        <input type="text" id="update_last_name" name="update_last_name" value="<?= htmlspecialchars($user['last_name'] ?? '') ?>">

        <label for="update_email">Email:</label>
        <input type="email" id="update_email" name="update_email" value="<?= htmlspecialchars($user['email'] ?? '') ?>">

        <label for="update_phone_number">Phone Number:</label>
        <input type="text" id="update_phone_number" name="update_phone_number" value="<?= htmlspecialchars($user['phone_number'] ?? '') ?>">

        <label for="update_birth_of_date">Birth Date:</label>
        <input type="date" id="update_birth_of_date" name="update_birth_of_date" value="<?= htmlspecialchars($user['birth_of_date'] ?? '') ?>">

        <label for="update_address_line_1">Address Line 1:</label>
        <input type="text" id="update_address_line_1" name="update_address_line_1" value="<?= htmlspecialchars($user['address_line_1'] ?? '') ?>">

        <label for="update_address_line_2">Address Line 2:</label>
        <input type="text" id="update_address_line_2" name="update_address_line_2" value="<?= htmlspecialchars($user['address_line_2'] ?? '') ?>">

        <label for="update_province">Province:</label>
        <input type="text" id="input_update_province" name="update_province" value="<?= htmlspecialchars($user['province'] ?? '') ?>" hidden>

        <select class="form-select" id="update_province">
            <option value="" <?php isset($user['province']) ? '' : 'selected'; ?>>Chọn tỉnh thành</option>
        </select>


        <label for="update_district">District:</label>
        <input type="text" id="input_update_district" name="update_district" value="<?= htmlspecialchars($user['district'] ?? '') ?>" hidden>
        <select class="form-select" id="update_district">
            <option value="" <?php isset($user['district']) ? '' : 'selected'; ?> >Chọn quận huyện</option>
        </select>

        <label for="update_ward">Ward:</label>
        <input type="text" id="input_update_ward" name="update_ward" value="<?= htmlspecialchars($user['ward'] ?? '') ?>" hidden>
        <select class="form-select" id="update_ward">
            <option value="" <?php isset($user['ward']) ? '' : 'selected'; ?> >Chọn phường xã</option>
        </select>


        <button type="submit">Update Profile</button>
    </form>
</div>

<script src="<?= base_url('/public/js/pages/updateProfile.js') ?>"></script>

<?php
$content = ob_get_clean();
include __DIR__ . '/../layout/layout.php';
?>