<?php

namespace App\Controllers;

use Core\Controller;
use GrahamCampbell\ResultType\Success;
use Models\Cart;
use Models\Order;
use Models\GuestOrder;
use Utils\Csrf;
use Utils\AuthUtil;

class CartController extends Controller
{
    public function index()
    {
        $cartModel = new Cart();
        $userId = $this->getUserId();
        $cartItems = $cartModel->getCartItems($userId);
        $totalBooks = count($cartItems);
        $csrfToken = Csrf::generateToken();

        $this->render('pages/cart', [
            'cartItems' => $cartItems,
            'totalBooks' => $totalBooks,
            'csrfToken' => $_SESSION['csrf_token'] ?? null
        ]);
    }

    public function guestCheckoutForm()
    {
        $this->render('form/guestCheckout');
    }

    public function checkout()
    {
        $rawData = file_get_contents('php://input');
        $formData = json_decode($rawData, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            http_response_code(400);
            echo json_encode(['success' => false, 'message' => 'Invalid JSON data']);
            return;
        }

        // Access the data
        $cartItems = $formData['cartItems'] ??  $_SESSION['cartItems'];
        $totalAmount = $formData['totalAmount'] ?? $_SESSION['totalAmount'];
        $csrfToken = $formData['csrfToken'] ?? $_SESSION['csrfToken'];

        $_SESSION['cartItems'] = $cartItems;
        $_SESSION['totalAmount'] = $totalAmount;
        $_SESSION['csrfToken'] = $csrfToken;

        if (AuthUtil::isLoggedIn()) {
            if (!Csrf::validateToken($csrfToken)) {
                die('Invalid CSRF token');
            }
            $userId = $this->getUserId();
        } else if (isset($formData['name']) == 0) {
            echo json_encode(['success' => 'success', 'returnUrl' => 'http://localhost' . base_url('/guest/checkout')]);
            return;
        }
        // if userId null meaning this cart from cookies
        $userId = $this->getUserId();


        \Stripe\Stripe::setApiKey($_ENV['STRIPE_SECRET_KEY']);

        try {
            $orderId = $this->createOrder($userId, $totalAmount, $cartItems, 'pending');

            // remove the cartItems 
            $cartModel = new Cart();
            foreach ($cartItems as $item) {
                $cartModel->removeFromCart($item['bookId'], $userId);
            }


            if (!AuthUtil::isLoggedIn()) {
                $guestOrderData = [
                    'name' => $formData['name'],
                    'email' => $formData['email'],
                    'phone_number' => $formData['phone'],
                    'order_id' => $orderId,
                    'address_line_1' => $formData['address1'],
                    'address_line_2' => $formData['address2'],
                    'province' => $formData['province'],
                    'district' => $formData['district'],
                    'ward' => $formData['ward'],
                    'note' => $formData['note'] ?? ''
                ];
                $guestOrderModel = new GuestOrder();
                $guestOrderModel->create($guestOrderData);
            }



            $checkoutSession = \Stripe\Checkout\Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [
                    [
                        'price_data' => [
                            'currency' => 'vnd',
                            'product_data' => [
                                'name' => 'Order #' . $orderId,
                            ],
                            'unit_amount' => $totalAmount * 100, // amount in cents
                        ],
                        'quantity' => 1,
                    ]
                ],
                'mode' => 'payment',
                'success_url' => 'http://localhost' . base_url('/payment/success/' . $orderId),
                'cancel_url' => 'http://localhost' . base_url('/payment/cancel/' . $orderId),
            ]);

            $this->updateOrderPaymentIntent($orderId, $checkoutSession->payment_intent);

            // header('Location: ' . $checkoutSession->url);
            // exit();
            echo json_encode(['success' => true, 'returnUrl' => $checkoutSession->url]);
        } catch (\Stripe\Exception\ApiErrorException $e) {
            http_response_code(500);
            echo json_encode(['success' => false, 'message' => 'Payment processing error: ' . $e->getMessage()]);
        } catch (\Exception $e) {
            http_response_code(500);
            echo json_encode(['success' => false, 'message' => 'An unexpected error occurred: ' . $e->getMessage()]);
        }
    }
    private function createOrder($userId, $totalAmount, $cartItems, $status)
    {
        $orderSubtotal = array_reduce($cartItems, function ($sum, $item) {
            return $sum + $item['price'] * $item['quantity'];
        }, 0);

        $orderModel = new Order();
        $orderId = $orderModel->insertOrder($userId, $totalAmount, $status, $orderSubtotal);

        foreach ($cartItems as $item) {
            $orderModel->insertOrderItem($orderId, $item['bookId'], $item['quantity'], $item['price']);
        }

        return $orderId;
    }

    private function updateOrderPaymentIntent($orderId, $paymentIntentId)
    {
        $orderModel = new Order();
        $orderModel->updatePaymentIntent($orderId, $paymentIntentId);
    }

    public function add($bookId)
    {
        $cartModel = new Cart();
        $userId = $this->getUserId();


        $cartModel->addToCart($bookId, 1, $userId);
    }



    public function updateQuantity($bookId, $quantity)
    {
        $cartModel = new Cart();
        $userId = $this->getUserId();
        $availableStock = $cartModel->getBookStock($bookId);

        if ($quantity <= $availableStock) {
            $cartModel->updateCartQuantity($bookId, $quantity, $userId);
            echo json_encode(['success' => true, 'message' => 'Quantity updated successfully']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Quantity exceeds available stock']);
        }
    }

    public function remove($bookId)
    {
        $cartModel = new Cart();
        $userId = $this->getUserId();
        try {
            $cartModel->removeFromCart($bookId, $userId);
            echo json_encode(['success' => true, 'message' => 'Item removed successfully']);
        } catch (\Exception $e) {
            echo json_encode(['success' => false, 'message' => 'Failed to remove item']);
        }
    }

    private function getUserId()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        return $_SESSION['user_id'] ?? null;
    }
}
