<?php
$title = 'Giỏ hàng';
ob_start();
?>
<link rel="stylesheet" href="<?= base_url('/public/css/pages/cart.css') ?>">
<div class="cart">
    <h1>Giỏ hàng</h1>
    <form action="" class="form-cart">
        <div class="cart-ui-content">
            <div class="cart-books">
                <div class="header-cart-item">
                    <div class="checkbox-all-product">
                        <input id="checkbox-all-product" class="checkbox-add-cart" type="checkbox"
                            onclick="cart.checkAllProducts()" />
                    </div>
                    <div>
                        <span>Chọn tất cả(<?= htmlspecialchars($totalBooks) ?> sản phẩm)</span>
                    </div>
                    <div>Số lượng</div>
                    <div>Thành tiền</div>
                    <div></div>
                </div>

                <div class="product-cart-left">
                    <?php if (isset($cartItems) && is_iterable($cartItems)) : ?>
                        <?php foreach (
                            $cartItems as $cartItem
                        ): ?>
                            <div class="item-product-cart">
                                <div class="checked-product-cart">
                                    <input id="<?= 'checkbox-product-' . $cartItem['id'] ?>" class="checkbox-add-cart"
                                        type="checkbox">
                                </div>

                                <div class="img-product-cart">
                                    <a href="<?= base_url("/book/{$cartItem['book_id']}") ?>">
                                        <img src="<?= base_url('/uploads/' . $cartItem['book_id'] . '/' . $cartItem['image_url']) ?>"
                                            alt="<?= $cartItem['name'] ?>">
                                    </a>
                                </div>

                                <div class="group-product-info">
                                    <div class="info-product-cart">
                                        <div>
                                            <a href="<?= base_url("/book/{$cartItem['book_id']}") ?>"><?= $cartItem['name'] ?></a>
                                        </div>
                                        <div class="cart-price">
                                            <div>
                                                <span class="price"><?= htmlspecialchars($cartItem['price']) ?> đ</span>
                                            </div>
                                            <div>
                                                <span class="original-price"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="number-product-cart">
                                        <div class="product-view-quantity-box">
                                            <div class="product-view-quantity-box-block">
                                                <a href="#" class="btn-subtract-qty">
                                                    <img src="<?= base_url('/public/img/cart/minus.svg') ?>" alt="">
                                                </a>
                                                <input class="qty-carts" type="text" maxlength="12" align="middle">
                                                <a href="#" class="btn-add-qty">
                                                    <img src="<?= base_url('/public/img/cart/plus.svg') ?>" alt="">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="cart-price-total">
                                            <span class="cart-price">44.100đ</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="btn-remove-cart">
                                    <a href="<?= base_url("/cart/remove/{$cartItem['id']}") ?>">
                                        <img src="<?= base_url('/public/img/cart/bin.svg') ?>" alt="">
                                    </a>
                                </div>
                            </div>

                        <?php endforeach; ?>
                    <?php else : ?>
                        <p>Không có sản phẩm nào trong giỏ hàng</p>
                    <?php endif; ?>
                </div>
            </div>
    </form>

    <div class="product-cart-right">

        <div class="cart-summary">
            <h2>Tổng cộng</h2>
            <p><?= isset($totalPrice) ?>đ</p>
            <button type="submit">Thanh toán</button>
        </div>
    </div>
</div>



<script src="<?= base_url('/public/js/pages/cart.js') ?>"></script>
<?php
$content = ob_get_clean();
include __DIR__ . '/../layout/layout.php';
?>