<?php
$title = "Trang chủ Admin";
ob_start();
?>
<div class="content">
    <main>
        <h1><?= $title ?></h1>


        <div class="insights">
            <!-- SALES -->
            <div class="sales">
                <span class="material-icons-sharp"> analytics </span>
                <div class="middle">
                    <div class="left">
                        <h3>Tổng doanh thu</h3>
                        <h1>$25,024</h1>
                    </div>
                    <div class="progress">
                        <svg>
                            <circle cx="38" cy="38" r="36"></circle>
                        </svg>
                        <div class="number">
                            <p>81%</p>
                        </div>
                    </div>
                </div>
                <small class="text-muted"> 24 giờ qua </small>
            </div>

            <!-- EXPENSES -->
            <div class="expenses">
                <span class="material-icons-sharp"> bar_chart </span>
                <div class="middle">
                    <div class="left">
                        <h3>Total Expenses</h3>
                        <h1>$14,160</h1>
                    </div>
                    <div class="progress">
                        <svg>
                            <circle cx="38" cy="38" r="36"></circle>
                        </svg>
                        <div class="number">
                            <p>62%</p>
                        </div>
                    </div>
                </div>
                <small class="text-muted"> 24 giờ qua </small>
            </div>

            <!-- INCOME -->
            <div class="income">
                <span class="material-icons-sharp"> stacked_line_chart </span>
                <div class="middle">
                    <div class="left">
                        <h3>Tổng lợi nhuận</h3>
                        <h1>$10,864</h1>
                    </div>
                    <div class="progress">
                        <svg>
                            <circle cx="38" cy="38" r="36"></circle>
                        </svg>
                        <div class="number">
                            <p>44%</p>
                        </div>
                    </div>
                </div>
                <small class="text-muted"> 24 giờ qua </small>
            </div>
        </div>

        <div class="recent-orders">
            <h2>Đơn đặt hàng gần đây</h2>
            <table id="recent-orders--table">
                <thead>
                    <tr>
                        <th>Tên khách hàng</th>
                        <th>Tên sách</th>
                        <th>Trạng thái</th>
                        <th></th>
                    </tr>
                </thead>
                <!-- Add tbody here | JS insertion -->
            </table>
            <a href="<?= base_url('/admin/orders/allOrders') ?>">Hiện tất cả</a>
        </div>

    </main>
    <div class="right">
        <div class="recent-updates">
            <h2>Đơn hàng gần đây</h2>
        </div>

        <div class="sales-analytics">
            <h2>Phân tích doanh số</h2>
            <div id="analytics">
                <!-- Add items div here | JS insertion -->
            </div>
            <a href="<?php echo base_url('/admin/books/add-book') ?>">
                <div class="item add-product">
                    <span class="material-icons-sharp"> add </span>
                    <h3>Thêm sách</h3>
                </div>
            </a>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const recentOrdersTable = document.getElementById('recent-orders--table');
        const recentUpdates = document.getElementsByClassName("recent-updates")[0]

        function renderOrders(orders) {
            console.log(orders);
            const tbody = document.createElement('tbody');
            orders.forEach(order => {
                const tr = document.createElement('tr');
                const bookNames = order.books.join(', ');
                tr.innerHTML = `
                <td>${order.username  || "Khách vãng lai"}</td>
                <td>${bookNames}</td>
                <td>${order.status}</td>
                <td class="primary" data-order-id="${order.id}">Chi tiết</td>
            `;
                tbody.appendChild(tr);
            });
            recentOrdersTable.appendChild(tbody);
        }

        const buildUpdatesList = async (orders) => {


            const statusMessages = {
                cancel: 'đã hủy đơn hàng.',
                pending: 'đang chờ xử lý đơn hàng.',
                success: 'đã nhận đơn hàng.'
            };

            function timeDifference(previous) {
                const current = new Date();
                const msPerMinute = 60 * 1000;
                const msPerHour = msPerMinute * 60;
                const msPerDay = msPerHour * 24;
                const msPerMonth = msPerDay * 30;
                const msPerYear = msPerDay * 365;

                const elapsed = current - previous;

                if (elapsed < msPerMinute) {
                    return Math.round(elapsed / 1000) + ' giây trước';
                } else if (elapsed < msPerHour) {
                    return Math.round(elapsed / msPerMinute) + ' phút trước';
                } else if (elapsed < msPerDay) {
                    return Math.round(elapsed / msPerHour) + ' giờ trước';
                } else if (elapsed < msPerMonth) {
                    return Math.round(elapsed / msPerDay) + ' ngày trước';
                } else if (elapsed < msPerYear) {
                    return Math.round(elapsed / msPerMonth) + ' tháng trước';
                } else {
                    return Math.round(elapsed / msPerYear) + ' năm trước';
                }
            }

            const div = document.createElement("div");
            div.classList.add("updates");

            let updateContent = "";
            for (const update of orders) {
                const createdAt = new Date(update.created_at);
                updateContent += `
                <div class="update">
                    <div class="profile-photo">
                    <i class="fa-solid fa-user"></i>
                    </div>
                    <div class="message">
                    <p><b>${update.username  || "Khách vãng lai"}</b> ${statusMessages[update.status] || update.status} </p>
                    <small class="text-muted">${timeDifference(createdAt)}</small>
                    </div>
                </div>
                `;
            }

            div.innerHTML = updateContent;

            recentUpdates.appendChild(div);
        };

        function fetchRecentOrders() {
            fetch('<?= base_url('/admin/orders/recent') ?>')
                .then(response => response.json())
                .then(data => {
                    renderOrders(data)
                    buildUpdatesList(data)
                });
        }

        fetchRecentOrders();
    });

    document.addEventListener('DOMContentLoaded', function() {
        const recentOrdersTable = document.getElementById('recent-orders--table');
        recentOrdersTable.addEventListener('click', function(event) {
            if (event.target.classList.contains('primary')) {
                const orderId = event.target.getAttribute('data-order-id');
                window.location.href = `<?= base_url('/admin/orders?orderId='); ?>${orderId}`;
            }
        });
    });
</script>
<?php
$content = ob_get_clean();
include __DIR__ . '/../layout/layoutAdmin.php';
?>