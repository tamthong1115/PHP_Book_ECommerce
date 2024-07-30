<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <base href="/PHP_Book_ECommerce/">
    <link rel="stylesheet" href="public/css/layout/header.css" type="text/css">
    <link rel="stylesheet" href="public/css/layout/footer.css" type="text/css">
    <link rel="stylesheet" href="public/css/global/styles.css" type="text/css">
    <link rel="icon" type="image/gif" href="public/icons/favicon.gif">
</head>
<body>
    <?php include 'header.php'; ?>
    <main>
        <?php echo $content; ?>
    </main>
    <?php include 'footer.php'; ?>
</body>
</html>