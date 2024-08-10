<?php
$title = "Về chúng tôi";
ob_start();
?>

    <h1 id="about-title">Về trang web được xây dựng</h1>
    <div id="p1">
        <h2>Giới thiệu trang web</h2>
        <p>Trang web này được xây dựng nhằm mục đích giúp người dùng mua sắm sách online một cách dễ dàng và thuận tiện.</p>
        
        <p>Với nhân lực hai người chúng tôi trân trọng giới thiệu các cuốn sách tiêu biểu mà chúng tôi biết và được bày bán ở các nhà sách lớn.
            <img id="about-img" src="<?= base_url('/public/icons/about-img.png') ?>">
        </p>
        
    </div>
    <div id="p2">
        <h2>Đối tượng hướng đến</h2>
        <p>Đọc giả mà trang web này hướng đến trong khoảng vị thành niên hoặc cao hơn với những bộ sách chuyên sâu về tâm lý học đường cũng như trinh thám,hành động,...</p>
    </div>
    <div id="p3">
        <h2>Liên hệ</h2>
        <p>Để liên hệ với chúng tôi, vui lòng gửi email đến địa chỉ: <a href="mailto: a@fake.com">abc@gmail.com</a></p>
        <p>Hoặc gọi đến số: <a href="tel:123-456-7890p123">123-456-7890p123</a></p>

    </div>
    <div id="p4">
        <h2>Thành viên tham gia</h2>
        <marquee bgcolor="grey" loop="infinite" width="100%" scrollamount="10">Trương Tam Thông MSSV: 2251120387 Hoàng Gia Bảo MSSV: 2251120334</marquee>
    </div>
    
<?php
$content = ob_get_clean();
include __DIR__ . '/../layout/layout.php';
?>