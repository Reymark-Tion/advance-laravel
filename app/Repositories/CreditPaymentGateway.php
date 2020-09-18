<?php
namespace App\Repositories;

use App\Interfaces\PaymentGatewayInterface;

class CreditPaymentGateway implements PaymentGatewayInterface
{
    private $currency;
    private $discount;

    public function __construct($currency)
    {
        $this->currency = $currency;
    }

    public function setDiscount($discount)
    {
        $this->discount = $discount;
    }

    public function charge($amount)
    { 
        $fees = $amount * 0.03;
        return [
            'amount' => $amount - ($this->discount + $fees),
            'confirmation_number' => random_int(1000000, 9999999),
            'currency' => $this->currency,
            'discount'=> $this->discount,
            'fees'=> $fees
        ];
    }
}