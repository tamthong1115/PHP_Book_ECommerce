<?php

namespace App\Controllers;

use Core\Controller;
use Models\Order;

class OrderController extends Controller
{

    public function userOrders()
    {
        $orderModel = new Order();
        $userId = $_SESSION['user_id']; // Assuming user ID is stored in session
        $orders = $orderModel->getOrdersByUserId($userId);
        foreach ($orders as &$order) {
            $order['items'] = $orderModel->getOrderItemsByOrderId($order['id']);
        }
        $this->render('order/allOrders', [
            'orders' => $orders
        ]);
    }

    public function orderSuccess($orderId)
    {
        $orderModel = new Order();
        $orderModel->updateOrderStatus($orderId, 'success');

        $this->render('order/orderSuccess', [
            'orderId' => $orderId
        ]);
    }

    public function orderFail($orderId)
    {
        $orderModel = new Order();
        $orderModel->updateOrderStatus($orderId, 'cancer');

        $this->render('order/orderFail', [
            'orderId' => $orderId
        ]);
    }

    public function searchOrder()
    {
        $orderId = $_GET['orderId'] ?? null;
        if ($orderId) {
            $this->redirect('/order/track?orderId=' . urlencode($orderId));
        } else {
            $this->render('order/searchTrackOrder', ['error' => 'Mã đơn hàng không hợp lệ']);
        }
    }

    public function trackOrder()
    {
        $orderId = $_GET['orderId'] ?? null;
        if ($orderId) {
            $orderModel = new Order();
            $order = $orderModel->getOrderById($orderId);
            $this->render('order/trackOrder', ['order' => $order]);
        } else {
            $this->render('order/trackOrder', ['error' => 'Mã đơn hàng không hợp lệ']);
        }
    }

    public function getRecentOrders()
    {
        $orderModel = new Order();
        $recentOrders = $orderModel->getRecentOrders(7);
        foreach ($recentOrders as &$order) {
            $order['books'] = $orderModel->getBookNamesByOrderId($order['id']);
        }
        echo json_encode($recentOrders);
    }

    public function getAllOrders($page = 1)
    {
        $orderModel = new Order();
        $ordersPerPage = 10;
        $offset = ($page - 1) * $ordersPerPage;
        $allOrders = $orderModel->getAllOrders($ordersPerPage, $offset);
        foreach ($allOrders as &$order) {
            $order['books'] = $orderModel->getBookNamesByOrderId($order['id']);
        }
        echo json_encode($allOrders);
    }
}
