<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\BankPaymentGateway;
use App\Repositories\OrderDetails;
use App\Interfaces\PaymentGatewayInterface;

class PaymentController extends Controller
{
   public function store(OrderDetails $orderDetails, PaymentGatewayInterface $paymentGateway)
   {

        $order = $orderDetails->all();
        // $paymentGateway = new PaymentGateway('usd');  
        
        dd($paymentGateway->charge(5000));
   }
}
