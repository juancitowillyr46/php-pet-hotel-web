<?php
namespace App\BackOffice\Payments\Domain\Entities;

class PaymentDto
{
    public string $id;
    public string $ticket;
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
    public string $billingEmail;
    public string $billingDni;
    public string $paymentMethodId;
    public string $paymentMethodName;
    public string $bankId;
    public string $stateName;
    public string $stateId;
    public string $bankName;
}