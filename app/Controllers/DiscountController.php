<?php

namespace App\Controllers;

use Core\Controller;
use Models\GlobalDiscount;

class DiscountController extends Controller
{

    public function getGlobalDiscounts($limit)
    {
        $globalDiscountModel = new GlobalDiscount();
        $globalDiscounts = $globalDiscountModel->getLimitGlobalDiscountStillValid($limit);
        echo json_encode($globalDiscounts);
    }
}
