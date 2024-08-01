<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <!-- favicon -->
    <link rel="icon" href="/PHP_Book_ECommerce/public/icons/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="/PHP_Book_ECommerce/public/css/layout/header.css" type="text/css">
    <link rel="stylesheet" href="/PHP_Book_ECommerce/public/css/layout/footer.css" type="text/css">
    <link rel="stylesheet" href="/PHP_Book_ECommerce/public/css/global/styles.css" type="text/css">
    <link rel="icon" href="/PHP_Book_ECommerce/public/icons/favicon.gif" type="image/gif">

</head>
<body>
    <?php include 'header.php'; ?>
    <main>
        <?php echo $content; ?>
    </main>
    <?php include 'footer.php'; ?>
</body>
</html>