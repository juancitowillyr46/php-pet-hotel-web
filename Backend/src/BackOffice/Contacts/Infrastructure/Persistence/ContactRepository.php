<?php
namespace App\BackOffice\Contacts\Infrastructure\Persistence;

use App\BackOffice\Contacts\Domain\Entities\ContactModel;
use App\Shared\Infrastructure\Persistence\BaseRepository;
use Exception;

class ContactRepository extends BaseRepository
{
    public function __construct()
    {
        $this->setModel(new ContactModel());
    }
}