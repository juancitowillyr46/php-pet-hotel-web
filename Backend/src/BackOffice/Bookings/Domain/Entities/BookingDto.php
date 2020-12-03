<?php
namespace App\BackOffice\Bookings\Domain\Entities;

class BookingDto
{
    public string $id;
    public string $kennelId;
    public string $kennelName;
    public string $petId;
    public string $petName;
    public string $stateId;
    public string $stateName;

    public string $customerId;
    public string $customerName;
    public string $dateTo;
    public string $dateFrom;
    public string $cancellationDate;
    public string $cancellationNote;
    public bool $active;
    public string $activeName;
    public string $createdAt;
    public bool $isDoggySchool;
}