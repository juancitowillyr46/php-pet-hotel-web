<?php
namespace App\BackOffice\Bookings\Domain\Exceptions;

use App\Shared\Exception\ValidateRequestException;
use App\Shared\Exception\BaseValidatorRequest;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Optional;
use Symfony\Component\Validator\Constraints\Required;
use Symfony\Component\Validator\Constraints\Type;

class BookingActionRequestSchema extends BaseValidatorRequest
{
    public function getMessages(array $data): array {

        $messages = $this->createSchema([
            'id' => [
               new Optional(),
            ],
            'kennelId' => [
                new Required(),
            ],
            'stateId' => [
                new Required(),
            ],
            'petId' => [
                new Required(),
            ],
            'customerId' => [
                new Required(),
            ],
            'dateTo' => [
                new Required(),
            ],
            'dateFrom' => [
                new Required(),
            ],
            'cancellationDate' => [
                new Optional()
            ],
            'cancellationNote' => [
                new Optional()
            ],
            'active' => [
                new Required(),
            ]
        ], $data);

        if(count($messages) > 0) {
            throw new ValidateRequestException(json_encode($messages, JSON_PRETTY_PRINT), 1500);
        }

        return $messages;
    }
}