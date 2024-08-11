<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="/PHP_Book_ECommerce/public/admin/css/style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet" />
</head>

<body>
    <? echo base_url('/public/admin/css/style.css') ?>
    <div class="container">

        <?php include 'navbarAdmin.php'; ?>


        <?php echo $content; ?>


    </div>

    <script src="/PHP_Book_ECommerce/public/admin/constants/recent-order-data.js"></script>
    <script src="/PHP_Book_ECommerce/public/admin/constants/update-data.js"></script>
    <script src="/PHP_Book_ECommerce/public/admin/constants/sales-analytics-data.js"></script>
    <script src="/PHP_Book_ECommerce/public/admin/js/index.js"></script>
</body>

</html>