<?php
$title = "Về chúng tôi";
ob_start();
?>
    <h1>Về trang web được xây dựng</h1>
    <div class="p1">
        <h2>Giới thiệu trang web</h2>
        <p>Trang web này được xây dựng nhằm mục đích giúp người dùng mua sắm sách online một cách dễ dàng và thuận tiện.</p>
        
        <p>Với nhân lực hai người chúng tôi trân trọng giới thiệu các cuốn sách tiêu biểu mà chúng tôi biết và được bày bán ở các nhà sách lớn.</p>
        
    </div>
    <div class="p2">
        <h2>Đối tượng hướng đến</h2>
        <p>Đọc giả mà trang web này hướng đến trong khoảng vị thành niên hoặc cao hơn với nhũng bộ sách chuyên sâu về tâm lý học đường cũng như trinh thám,hành động,...</p>
    </div>
    <div class="p3">
        <h2>Liên hệ</h2>
        <p>Để liên hệ với chúng tôi, vui lòng gửi email đến địa chỉ: <a href="mailto: a@fake.com">Không ai cả</a>

    </div>
    <div class="p4">
        <h2>Thành viên tham gia:</h2>
        <p>Trương Tam Thông</p>
        <p>MSSV: </p>
        <p>Hoàng Gia Bảo</p>
        <p>MSSV: 2251120334 </p>
    </div>
    
<?php
$content = ob_get_clean();
include __DIR__ . '/../layout/layout.php';
?>