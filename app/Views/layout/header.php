<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Store</title>
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
                    <li><a class="active" href="<?= base_url('/') ?>"><img src="<?= base_url('/public/icons/home.svg') ?>" title="Trang chủ"></a></li>
                    <li><a href="<?= base_url('/about') ?>"><img src="<?= base_url('/public/icons/about.svg') ?>" title="Về chúng tôi"></a></li>
                    <li><a href="#"><img src="<?= base_url('/public/icons/contact.png') ?>" title="Liên hệ"></a></li>
                    <li><a class="header__cart" href="#"><img src="<?= base_url('/public/icons/cart.png') ?>" title="Giỏ hàng"></a></li>
                    <li><a href="<?= base_url('/sign-in') ?>"><img src="<?= base_url('/public/icons/sign-in-1.png') ?>" title="Đăng nhập"></a></li>
                    <li><a href="<?= base_url('/sign-up') ?>"><img src="<?= base_url('/public/icons/sign-out.png') ?>" title="Đăng kí"></a></li>
                </ul>
            </div>
            </div>
            </header>


