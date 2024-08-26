<?php

namespace App\Controllers;

use Core\Controller;
use Models\Order;

class OrderController extends Controller
{
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

   
}
