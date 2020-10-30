<?php


namespace App\BackOffice\Payments\Domain\Entities;


class PaymentOrderDto
{
    public string $serviceId;
    public string $serviceName;
    public int $quantity;
    public float $price;
    public float $subtotal;
    public string $id;
}