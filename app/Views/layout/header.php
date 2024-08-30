<?php

use Utils\AuthUtil; ?>

<header>

    <nav id="nav">
        <a href="<?= base_url('/') ?>" class="a-logo">
            <img id="logo" src="<?php echo base_url('/public/img/header/logo.svg') ?>" alt="Logo">
        </a>

        <div class="header__search">
            <form action="<?= base_url('/search') ?>" method="GET">
                <input type="text" name="query" placeholder="Tìm kiếm">
                <button type="submit">Tìm kiếm</button>
            </form>
        </div>



        <div id="slideMenu">
            <ul id="navUl">
                <li class="navLi" id="about"><a class="aTag" href="<?php echo base_url('/about') ?>">Về chúng tôi</a></li>
                <li class="navLi" id="contact"><a class="aTag" href="<?php echo base_url('/contact') ?>">Liên hệ</a></li>



                <div class="header_account_container">
                    <a class="aTag" href="#" id="accountLink">
                        <div class="header_account">
                            <img src="<?= base_url('/public/img/header/account.svg') ?>" alt="Account">
                            <span><?= isset($_SESSION['username']) ? $_SESSION['username'] : 'Tài khoản'; ?></span>
                        </div>
                    </a>


                    <div id="accountDropdown" class="dropdown-content">
                        <?php if (AuthUtil::isLoggedIn()): ?>
                            <div class="dropdown-container">
l
                                <a href="<?= base_url('/users/profile') ?>">Trang cá nhân</a>
                                <a href="<?= base_url('/users/orders') ?>">Đơn hàng của tôi</a> <!-- New link -->
                                <a href="<?= base_url('/logout') ?>">Đăng xuất</a>
                            </div>
                        <?php else: ?>
                            <div class="signIn-dropdown">
                                <button class="open-modal-signIn">Đăng nhập</button>
                            </div>
                            <div class="signUp-dropdown">
                                <button class="open-modal-signUp">Đăng ký</button>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <li class="navLi" id="cart"><a class="aTag" href="<?= base_url('/cart') ?>"><img src="<?php echo base_url('/public/img/header/shopping-cart.svg') ?>" alt="Logo"></a></li>

                <span id="close" class="material-symbols-outlined">close</span>
            </ul>
        </div>

        <section class="mobile">
            <li class="navLi" id="cart"><a class="aTag" href="<?= base_url('/cart') ?>"><img src="<?php echo base_url('/public/img/header/shopping-cart.svg') ?>" alt="Logo"></a></li>

            <span id="hamMenu" class="material-symbols-outlined">menu</span>
        </section>
    </nav>

</header>