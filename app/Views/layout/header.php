<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nhà sách TamThong</title>
</head>

<body>
    <header >
        <div class="header">

        <a href="<?= base_url('/') ?>"><img src="<?= base_url('/public/icons/logo.svg') ?>" class="header__logo" alt="logo"></a>

            
            <div class="header__search">
                <form action="">
                    <input type="text" placeholder="Search for books, authors, genres">
                    <button type="submit">Tìm kiếm</button>
                </form>
            </div>
                        
            <div>
                <ul class="header__navbar">
                    <li class="nav-icon"><a class="active" href="<?= base_url('/') ?>"><img  src="<?= base_url('/public/icons/home.svg') ?>" title="Trang chủ">Trang chủ</a></li>
                    <li class="nav-icon"><a href="<?= base_url('/about') ?>"><img  src="<?= base_url('/public/icons/about.svg') ?>" title="Về chúng tôi">Về chúng tôi</a></li>
                    <li class="nav-icon"><a href="<?= base_url('/contact') ?>"><img  src="<?= base_url('/public/icons/contact.png') ?>" title="Liên hệ">Liên hệ</a></li>
                    <li class="nav-icon"><a  href="#"><img  src="<?= base_url('/public/icons/cart.png') ?>" title="Giỏ hàng">Giỏ hàng</a></li>
                    <li class="nav-icon"><a href="<?= base_url('/sign-in') ?>"><img  src="<?= base_url('/public/icons/sign-in-1.png') ?>" title="Đăng nhập">Đăng nhập</a></li>
                    <li class="nav-icon"><a href="<?= base_url('/sign-up') ?>"><img  src="<?= base_url('/public/icons/sign-out.png') ?>" title="Đăng kí">Đăng kí</a></li>
                </ul>
            </div>
            </div>
            </header>


