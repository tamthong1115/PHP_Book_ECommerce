<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <!-- favicon -->
    <link rel="icon" href="/PHP_Book_ECommerce/public/img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/PHP_Book_ECommerce/public/icons/favicon.gif" type="image/gif">
    <!-- css -->
    <link rel="stylesheet" href="/PHP_Book_ECommerce/public/css/layout/header.css" type="text/css">
    <link rel="stylesheet" href="/PHP_Book_ECommerce/public/css/layout/footer.css" type="text/css">
    <link rel="stylesheet" href="/PHP_Book_ECommerce/public/css/global/styles.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url('/public/css/pages/auth.css') ?>">
</head>

<body>

    <?php if (isset($error)) : ?>
        <div class="prompt prompt-error">
            <?php echo htmlspecialchars($error); ?>
        </div>
    <?php endif; ?>

    <?php if (isset($success)) : ?>
        <div class="prompt prompt-success">
            <?php echo htmlspecialchars($success); ?>
        </div>
    <?php endif; ?>
    <?php include 'header.php'; ?>


    <div class="container">

        <main>
            <?php echo $content; ?>
        </main>
        <?php include 'footer.php'; ?>

        <dialog id="modal-signIn" class="modal-signIn">
            <?php include __DIR__ . '/../auth/sign-in.php' ?>
        </dialog>
        <dialog id="modal-signUp" class="modal-signUp">
            <?php include __DIR__ . '/../auth/sign-up.php' ?>
        </dialog>

        <script src="<?= base_url('/public/js/pages/auth.js') ?>"></script>
        <script src="<?= base_url('/public/js/index.js') ?>"></script>
    </div>
</body>

</html>