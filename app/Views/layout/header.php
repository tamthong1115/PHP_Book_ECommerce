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
                    <li><a class="active" href="<?= base_url('/') ?>">Trang chủ</a></li>
                    <li><a href="<?= base_url('/about') ?>">Về chúng tôi</a></li>
                    <li><a href="#">Liên hệ</a></li>
                    <li><a class="header__cart" href="#"><img src="<?= base_url('/public/icons/shopping-cart.svg') ?>" alt="cart-logo"></a></li>
                    <li><a href="<?= base_url('/sign-in') ?>">Đăng nhập</a></li>
                    <li><a href="<?= base_url('/sign-up') ?>">Đăng ký</a></li>
                </ul>
            </div>
            </div>
            </header>


