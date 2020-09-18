<?php

namespace App\Repositories;
use App\Interfaces\PaymentGatewayInterface;

class OrderDetails
{
    private $paymentGateway;

    public function __construct(PaymentGatewayInterface $paymentGateway){
        $this->paymentGateway = $paymentGateway;
    }

    public function all()
    {
        $this->paymentGateway->setDiscount(500);

        return [
            'name' => 'Jifford',
            'address' => 'Pulang bato'
        ];
    }
}