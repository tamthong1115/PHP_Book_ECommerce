<?php
$title = "Guest Checkout";
ob_start();
?>

<link rel="stylesheet" href="<?= base_url('/public/css/form/guestCheckout.css') ?>">
<div class="guest-order-container">
    <form class="guest-order-form">
        <input type="text" id="guest_name" name="guest_name" placeholder="Họ và tên">
        <div class="error-message" id="guest_nameError"></div>

        <input type="email" id="guest_email" name="guest_email" placeholder="Email">
        <div class="error-message" id="guest_emailError"></div>

        <input type="text" id="guest_phone_number" name="guest_phone_number" placeholder="Số điện thoại">
        <div class="error-message" id="guest_phone_numberError"></div>

        <input type="text" id="guest_address_line_1" name="guest_address_line_1" placeholder="Địa chỉ 1">
        <div class="error-message" id="guest_address_line_1Error"></div>

        <input type="text" id="guest_address_line_2" name="guest_address_line_2" placeholder="Địa chỉ 2(Không bắt buộc)">

        <input type="text" id="input_guest_province" name="guest_province" hidden>
        <select class="form-select" id="guest_province">
            <option value="" selected>Chọn tỉnh thành</option>
        </select>
        <div class="error-message" id="input_guest_provinceError"></div>

        <input type="text" id="input_guest_district" name="guest_district" hidden>
        <select class="form-select" id="guest_district">
            <option value="" selected>Chọn quận huyện</option>
        </select>
        <div class="error-message" id="input_guest_districtError"></div>

        <input type="text" id="input_guest_ward" name="guest_ward" hidden>
        <select class="form-select" id="guest_ward">
            <option value="" selected>Chọn phường xã</option>
        </select>
        <div class="error-message" id="input_guest_wardError"></div>

        <button type="submit">Hoàn thành</button>
    </form>
</div>

<script src="<?= base_url('/public/js/form/guestCheckout.js') ?>">

</script>


<?php
$content = ob_get_clean();
include __DIR__ . '/../layout/layout.php';
?>