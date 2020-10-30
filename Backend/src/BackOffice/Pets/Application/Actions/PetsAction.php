<?php
namespace App\BackOffice\Pets\Application\Actions;

use App\BackOffice\Pets\Domain\Services\PetService;
use App\Shared\Action\Action;
use Psr\Log\LoggerInterface;

abstract class PetsAction extends Action
{
    public PetService $petService;

    public function __construct(LoggerInterface $logger, PetService $petService)
    {
        $this->petService = $petService;
        parent::__construct($logger);
    }
}

