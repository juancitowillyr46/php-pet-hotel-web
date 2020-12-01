<?php
namespace App\BackOffice\Contacts\Application\Actions;

use App\BackOffice\Contacts\Domain\Services\ContactService;
use App\Shared\Action\Action;
use Psr\Log\LoggerInterface;

abstract class ContactsAction extends Action
{
    public ContactService $contactService;
    public function __construct(LoggerInterface $logger, ContactService $contactService)
    {
        $this->contactService = $contactService;
        parent::__construct($logger);
    }
}

