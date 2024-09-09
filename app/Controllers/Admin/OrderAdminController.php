<?php


namespace App\Controllers\Admin;

use Core\Controller;
use Models\Order;


class OrderAdminController extends Controller
{

    public function getRecentOrders()
    {
        $orderModel = new Order();
        $recentOrders = $orderModel->getRecentOrders(7);
        foreach ($recentOrders as &$order) {
            $order['books'] = $orderModel->getBookNamesByOrderId($order['id']);
        }
        echo json_encode($recentOrders);
    }


    public function renderAllOrders()
    {
        $orders = $this->getAllOrders();
        $this->render('admin/orders/allOrdersAdmin', ['orders' => $orders]);
    }

    public function getAllOrders(int $page = 1)
    {

        $orderModel = new Order();
        $ordersPerPage = 10;
        $offset = ($page - 1) * $ordersPerPage;
        $allOrders = $orderModel->getAllOrders($ordersPerPage, $offset);
        foreach ($allOrders as &$order) {
            $order['books'] = $orderModel->getBookNamesByOrderId($order['id']);
        }

        return $allOrders;
    }


    public function getOrderDetails()
    {
        $orderId = $_GET['orderId'] ?? null;
        if ($orderId) {
            $orderModel = new Order();
            $order = $orderModel->getAdminOrderItemsByOrderId($orderId);
            $this->render('admin/orders/orderDetailAdmin', ['order' => $order]);
        } else {
            // Handle the case where orderId is not provided
            $this->render('admin/orders/orderDetailAdmin', ['error' => 'Order ID is required']);
        }
    }
}
