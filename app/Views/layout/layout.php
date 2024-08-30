<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <!-- favicon -->
    <link rel="icon" href="<?= base_url('/public/img/favicon.ico') ?>" type="image/x-icon">

    <!-- fontawesome -->
    <link rel="stylesheet" href="<?= base_url('/public/fontawesome/css/all.css') ?>">

    <!-- css -->
    <link rel="stylesheet" href="<?= base_url('/public/css/pages/auth.css') ?>">
    <link rel="stylesheet" href="<?= base_url('/public/css/pages/contact.css') ?>">
    <link rel="stylesheet" href="<?= base_url('/public/css/pages/about.css') ?>">
    <link rel="stylesheet" href="<?= base_url('/public/css/layout/header.css') ?>" type="text/css">
    <link rel="stylesheet" href="<?= base_url('/public/css/layout/footer.css') ?>" type="text/css">
    <link rel="stylesheet" href="<?= base_url('/public/css/global/styles.css') ?>" type="text/css">
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

        <main class="main-container">
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