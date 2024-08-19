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
    <div class="container">

        <?php include 'navbarAdmin.php'; ?>

        <div class="container_body">


            <div class="header">
                <div class="right">
                    <div class="top">
                        <button id="menu-btn">
                            <span class="material-icons-sharp"> menu </span>
                        </button>
                        <div class="theme-toggler">
                            <span class="material-icons-sharp active"> light_mode </span>
                            <span class="material-icons-sharp"> dark_mode </span>
                        </div>
                        <div class="profile">
                            <div class="info">
                                <p>Hey, <b></b></p>
                                <small class="text-muted">Admin</small>
                            </div>
                            <div class="profile-photo">
                                <img src="/PHP_Book_ECommerce/public/admin/images/profile-1.svg" alt="Profile Picture" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php echo $content; ?>

           
        </div>
    </div>

    <script src="/PHP_Book_ECommerce/public/admin/constants/recent-order-data.js"></script>
    <script src="/PHP_Book_ECommerce/public/admin/constants/update-data.js"></script>
    <script src="/PHP_Book_ECommerce/public/admin/constants/sales-analytics-data.js"></script>
    <script src="/PHP_Book_ECommerce/public/admin/js/index.js"></script>
</body>

</html>