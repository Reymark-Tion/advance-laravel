<?php
namespace App\Repositories;

use App\Interfaces\PaymentGatewayInterface;

class BankPaymentGateway implements PaymentGatewayInterface
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
        return [
            'amount' => $amount - $this->discount,
            'confirmation_number' => random_int(1000000, 9999999),
            'currency' => $this->currency,
            'discount'=> $this->discount
        ];
    }
}