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
                        <input id="checkbox-all-product" class="checkbox-add-cart" type="checkbox" />
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
                                    <input id="<?= 'checkbox-product-' . $cartItem['book_id'] ?>" class="checkbox-add-cart"
                                        type="checkbox" name="cartItems[]" value="<?= $cartItem['book_id'] ?>">
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
                                            <div class="product-view-quantity-box-block" data-book-id="<?= $cartItem['book_id'] ?>"">
                                                <a href=" #" class="btn-subtract-qty">
                                                <img src="<?= base_url('/public/img/cart/minus.svg') ?>" alt="">
                                                </a>
                                                <input class="qty-carts" type="text" value="<?= $cartItem['quantity'] ?>" maxlength="12" align="middle">
                                                <a href="#" class="btn-add-qty">
                                                    <img src="<?= base_url('/public/img/cart/plus.svg') ?>" alt="">
                                                </a>
                                            </div>
                                        </div>
                                        <span class="cartItem-price-total">
                                            <?= htmlspecialchars($cartItem['quantity'] * $cartItem['price']) ?>đ
                                        </span>

                                    </div>
                                </div>

                                <div class="btn-remove-cart">
                                    <a href="#" id="remove-cart-item-<?= $cartItem['book_id'] ?>" data-id="<?= $cartItem['book_id'] ?>">
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

            <div class="cart-right col-sm-4">

                <div class="cart-promo">
                    <div class="event-promo-title">
                        <div class="event-promo-title-left">
                            <span><img src="<?= base_url('/public/img/cart/discount.svg') ?>" alt=""></span>
                            <span>Khuyến mãi</span>
                        </div>

                        <div class="event-promo-title-right" id="viewMoreDiscounts">
                            <span>Xem thêm</span>
                        </div>
                    </div>

                    <div class="event-promo-item">
                        <div class="promo-item">
                            <div>
                                <div class="promo-name">Name</div>
                                <div class="modal-promo-detail">Chi tiết</div>
                            </div>

                            <div class="promo-description"></div>

                        </div>
                    </div>
                </div>


                <div class="total-cart-right">
                    <div class="cart-summary">
                        <div class="total-cart-page">
                            <div class="title-cart-page-left">Thành tiền</div>
                            <div class="number-cart-page-right">
                                <span id="total-price">0</span>
                            </div>
                        </div>
                        <hr>


                        <div class="total-cart-page title-final-total">
                            <div class="title-cart-page-left">Tổng số tiền (gồm VAT)</div>
                            <input type="hidden" name="totalPrice" id="hidden-total-price" value="0">
                            <div class="number-cart-page-right">
                                <span id="total-price-final" class="total-price-final">0</span>
                            </div>
                        </div>


                        <div class="method-button-cart">
                            <button type="submit" class="checkout-button">THANH TOÁN</button>
                        </div>

                    </div>
                </div>
            </div>
    </form>
</div>




<script src="<?= base_url('/public/js/pages/cart.js') ?>"></script>
<?php
$content = ob_get_clean();
include __DIR__ . '/../layout/layout.php';
?>