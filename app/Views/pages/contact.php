<?php
$title = "Liên hệ";
ob_start();

?>
<section id="contact-header">
    <h2>Cùng nói chuyện nào!</h2>
    <p>Hãy để lại lời nhắn, chúng tôi mong nhận được phản hồi của bạn!</p>
</section><br>
<section id="contact-details" >
    <div class="details">
        <span></span>
        <h2>Liên hệ</h2>
        <h3>Trụ sở chính:</h3>
        <div id="address">
            <ul>
            <li>
                <h4>Địa chỉ:</h4>
                <p>123 Đường ABC, Phường XYZ, Quận 123, TP. Hồ Chí Minh</p>
            </li>
            <li>
                <h4>Điện thoại:</h4>
                <a href="tel:123456789">0123 456 789</a>
            </li>
            <li>
                <h4>Email:</h4>
                <a href="mailto: 2251120334@gmail.com">2251120334@gmail.com</a>
            </li>
            <li>
                <h4>Thời gian hoạt động:</h4>
                <p>Thứ 2 - Chủ nhật: 8:00 - 20:00</p>
            </li>
            </ul>
        </div>    
    </div>
    <div class="ggmap">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.287216345691!2d106.61554297452693!3d10.865745489288496!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752b2a11844fb9%3A0xbed3d5f0a6d6e0fe!2zVHLGsOG7nW5nIMSQ4bqhaSBI4buNYyBHaWFvIFRow7RuZyBW4bqtbiBU4bqjaSBUaMOgbmggUGjhu5EgSOG7kyBDaMOtIE1pbmggKFVUSCkgLSBDxqEgc-G7nyAz!5e0!3m2!1svi!2s!4v1723393127465!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</section>


<?php
$content = ob_get_clean();
include __DIR__ . '/../layout/layout.php';
?>