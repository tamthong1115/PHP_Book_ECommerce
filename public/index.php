<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Store</title>
    <link rel="stylesheet" href="css/styles.css">

</head>

<body>
    <section id="header" class="header">
    <div class="mainHeader">
        <div class="logo">
            <a href="index.php">
            <img src="icon/LOGO-MAIN.png" alt></a>
        </div>
        <nav class="menu">
        <ul>
            <li><a href="#">Trang chủ</a></li>
            <li>
                <span class="searchBar">
                    <input type="text" id="searchInput" placeholder="Tìm kiếm sản phẩm" list="bookCategories">
                    <button type="submit" id="searchBtn">Tim kiem</button>
                    <datalist id="bookCategories">
                        <option value="Sách giáo khoa"></option>
                        <option value="Sách tham khảo"></option>
                        <option value="Sách văn học"></option>
                        <option value="Sách khác..."></option>
                    </datalist>
                </span>
            </li>
            <li>
                <a href="#">Liên hệ</a>
            </li>
            <li><a href="#">Giới thiệu</a></li>
            <li><a href="#">Đăng nhập</a></li>
            
        </ul></nav>
    </section>
    
       

</body>

</html>

<?php
    echo "i fuck u";
?>