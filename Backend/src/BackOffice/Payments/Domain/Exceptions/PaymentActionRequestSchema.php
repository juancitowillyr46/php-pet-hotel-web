<?php
namespace App\BackOffice\Payments\Domain\Exceptions;

use App\Shared\Exception\ValidateRequestException;
use App\Shared\Exception\BaseValidatorRequest;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Optional;
use Symfony\Component\Validator\Constraints\Required;
use Symfony\Component\Validator\Constraints\Type;

class PaymentActionRequestSchema extends BaseValidatorRequest
{
    public function getMessages(array $data): array {

        $messages = $this->createSchema([
            'id' => [
               new Optional(),
            ],
            'bankId' => [
                new Optional(),
            ],
            'paymentMethodId' => [
                new Required(),
            ],
            'screenVoucher' => [
                new Required(),
            ],
            'stateId' => [
                new Required(),
            ],
            'date' => [
                new Required(),
            ],
            'billingFirstName' => [
                new Required(),
            ],
            'billingLastName' => [
                new Required(),
            ],
            'billingDni' => [
                new Required(),
            ],
            'billingEmail' => [
                new Required(),
            ],
            'billingPhone' => [
                new Required(),
            ],
            'billingAddress' => [
                new Required(),
            ],
            'total' => [
                new Required(),
            ],
            'bookingId' => [
                new Required(),
            ],
            'customerId' => [
                new Required(),
            ],
            'order' => [
                new Type('array')
            ],
            'active' => [
                new Type('bool')
            ]
        ], $data);

        if(count($messages) > 0) {
            throw new ValidateRequestException(json_encode($messages, JSON_PRETTY_PRINT), 1500);
        }

        return $messages;
    }
}