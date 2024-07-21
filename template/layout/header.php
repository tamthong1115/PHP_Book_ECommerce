<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Store</title>
    <link rel="stylesheet" href="<?= asset('public/css/global/variables.css') ?>" type="text/css">
    <link rel="stylesheet" href="<?= asset('public/css/global/styles.css') ?>" type="text/css">
    <link rel="stylesheet" href="<?= asset('public/css/template/header.css')?>" type="text/css">

</head>

<body>
    <section class="header">
        <a href="#"><img src="<?= asset('public/img/logo.svg')?>" class="header__logo" alt="logo"></a>

        <div>
            <ul class="header__navbar">
                <li><a class="active" href="index.php">Home</a></li>
                <li><a href="#">Shop</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Contact</a></li>
                <li><a class="header__cart" href="#"><img src="<?= asset('public/icons/shopping-cart.svg') ?>" alt="cart-logo"></a></li>            </ul>
        </div>
    </section>
</body>
</html>