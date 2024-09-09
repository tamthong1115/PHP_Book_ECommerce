<aside>
    <div class="top">
        <div class="logo">
            <img src="/PHP_Book_ECommerce/public/admin/images/logo.svg" alt="Logo" />
        </div>
        <div class="close" id="close-btn">
            <span class="material-icons-sharp"> close </span>
        </div>
    </div>

    <div class="sidebar">
        <a href="/PHP_Book_ECommerce/admin" class="active">
            <span class="material-icons-sharp"> dashboard </span>
            <h3>Bảng điều khiển</h3>
        </a>
        <a href="#">
            <span class="material-icons-sharp"> person_outline </span>
            <h3>Khách hàng</h3>
        </a>
        <a href="<?= base_url('/admin/orders/allOrders') ?>">
            <span class="material-icons-sharp"> receipt_long </span>
            <h3>Đơn hàng</h3>
        </a>
        <a href="#">
            <span class="material-icons-sharp"> insights </span>
            <h3>Phân tích</h3>
        </a>
        <a href="#">
            <span class="material-icons-sharp"> mail_outline </span>
            <h3>Tin nhắn</h3>
            <span class="message-count">26</span>
        </a>
        <a href="#">
            <span class="material-icons-sharp"> inventory </span>
            <h3>Sản phẩm</h3>
        </a>
        <a href="#">
            <span class="material-icons-sharp"> report_gmailerrorred </span>
            <h3>Báo cáo</h3>
        </a>
        <a href="#">
            <span class="material-icons-sharp"> settings </span>
            <h3>Cài đặt</h3>
        </a>
        <a href="<?php echo base_url('/admin/books/add-book') ?>">
            <span class="material-icons-sharp"> add </span>
            <h3>Thêm sản phẩm</h3>
        </a>
    </div>
</aside>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const sidebarLinks = document.querySelectorAll('.sidebar a');

        // Function to set the active class
        function setActiveLink(link) {
            // Remove 'active' class from all links
            sidebarLinks.forEach(link => link.classList.remove('active'));

            // Add 'active' class to the clicked link
            link.classList.add('active');

            // Store the href of the active link in localStorage
            localStorage.setItem('activeSidebarLink', link.getAttribute('href'));
        }

        // Initialize active link based on localStorage
        const storedLink = localStorage.getItem('activeSidebarLink');
        if (storedLink) {
            const activeLink = [...sidebarLinks].find(link => link.getAttribute('href') === storedLink);
            if (activeLink) {
                setActiveLink(activeLink);
            }
        }

        sidebarLinks.forEach(link => {
            link.addEventListener('click', function(event) {
                setActiveLink(this);
                // If the link navigates to a different page, no need to prevent default
                // If you need to handle SPA (Single Page Application), you can prevent default behavior here
            });
        });
    });
</script>

</body>