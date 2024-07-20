<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Store</title>
    <link rel="stylesheet" href="<?= asset('public/css/global/variables.css') ?>" type="text/css">
    <link rel="stylesheet" href="<?= asset('public/css/global/styles.css') ?>" type="text/css">
    <link rel="stylesheet" href="<?= asset('public/css/template/header.css')?>" type="text/css">

    <!-- Fonts -->
     <link rel="stylesheet" href="<?= asset('public/fonts/css/fontawesome.min.css')?>">
     <link rel="stylesheet" href="<?= asset('public/fonts/css/brands.min.css')?>">
     <link rel="stylesheet" href="<?= asset('public/fonts/css/solid.min.css')?>">
</head>

<body>
    <section class="header">
        <a href="#"><img src="<?= asset('public/img/logo.svg')?>" class="header__logo" alt="logo"></a>

        <div>
            <ul class="header__navbar">
                <li><a class="active" href="index.php">Home</a></li>
                <li><a href="#">Shop</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Contact</a></li>
                <li><a class="header__cart" href="#"><i class="fa-regular fa-cart-shopping"></i></a></li>
            </ul>
        </div>
    </section>
</body>
</html>