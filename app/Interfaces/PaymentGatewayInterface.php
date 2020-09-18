<?php

namespace App\Interfaces;

interface PaymentGatewayInterface
{
    public function setDiscount($discount);

    public function charge($amount);
}