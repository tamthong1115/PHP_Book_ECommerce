<?php

use Utils\AuthUtil; ?>

<header>

    <nav id="nav">
        <a href="<?= base_url('/') ?>"><img id="logo" src="<?php echo base_url('/public/img/header/logo.svg') ?>" alt="Logo"></a>

        <div id="slideMenu">
            <ul id="navUl">
                <li class="navLi" id="contact"><a class="aTag" href="contact.html">Contact</a></li>
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
                                <a href="<?= base_url('/profile') ?>">Trang cá nhân</a>
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