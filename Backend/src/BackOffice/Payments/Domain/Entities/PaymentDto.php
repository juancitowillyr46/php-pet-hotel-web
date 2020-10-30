<?php
namespace App\BackOffice\Payments\Domain\Entities;

class PaymentDto
{
    public string $id;
    public string $name;
    public string $description;
    public bool $active;
    public string $activeName;
    public string $createdAt;
    public float $total;
    public string $billingFirstName;
    public string $billingLastName;
    public string $billingAddress;
    public string $billingPhone;
    public string $paymentMethodName;
    public string $stateName;
    public string $bankName;
}