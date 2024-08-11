<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nhà sách TamThong</title>
</head>

<body>
    <header>
        <div class="header__container">

            <a href="<?= base_url('/') ?>"><img src="<?= base_url('/public/icons/logo.svg') ?>" class="header__logo" alt="logo"></a>


            <div class="header__search">
                <form action="">
                    <input type="text" placeholder="Search for books, authors, genres">
                    <button type="submit">Tìm kiếm</button>
                </form>
            </div>

            <div class="header__right">
                <ul class="header__navbar">
                    <li id="icon-header"><a href="<?= base_url('/') ?>" ><img src="<?= base_url('/public/icons/header-icon/home.svg') ?>">Home</a></li>
                    <li id="icon-header"><a href="<?= base_url('/about') ?>"><img src="<?= base_url('/public/icons/header-icon/about.svg') ?>" title="Về chúng tôi"></a></li>
                    <li id="icon-header"><a href="<?= base_url('/contact') ?>"><img src="<?= base_url('/public/icons/header-icon/contact.png') ?>" title="Liên hệ"></a></li>
                    <li id="icon-header"><a class="header__cart" href="#"><img src="<?= base_url('/public/icons/header-icon/cart.png') ?>" title="Giỏ hàng"></a></li>
                    <li id="icon-header"><a href="<?= base_url('/sign-in') ?>"><img src="<?= base_url('/public/icons/header-icon/sign-in-1.png') ?>" title="Đăng nhập"></a></li>
                    <li id="icon-header"><a href="<?= base_url('/sign-up') ?>"><img src="<?= base_url('/public/icons/header-icon/sign-out.png') ?>" title="Đăng kí"></a></li>
                </ul>
            </div>
        </div>
    </header>