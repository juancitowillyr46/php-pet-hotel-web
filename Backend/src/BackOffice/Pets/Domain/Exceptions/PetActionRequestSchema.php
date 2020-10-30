<?php
namespace App\BackOffice\Pets\Domain\Exceptions;

use App\Shared\Exception\ValidateRequestException;
use App\Shared\Exception\BaseValidatorRequest;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Optional;
use Symfony\Component\Validator\Constraints\Required;
use Symfony\Component\Validator\Constraints\Type;

class PetActionRequestSchema extends BaseValidatorRequest
{
    public function getMessages(array $data): array {

        $messages = $this->createSchema([
            'id' => [
               new Optional(),
            ],
            'customerId' => [
                new Required(),
            ],
            'name' => [
                new Required(),
            ],
            'age' => [
                new Required(),
            ],
            'gender' => [
                new Required(),
            ],
            'race' => [
                new Required(),
            ],
            'image' => [
                new Required(),
            ],
            'weight' => [
                new Required(),
            ],
            'size' => [
                new Required(),
            ],
            'diseases' => [
                new Required(),
            ],
            'veterinary' => [
                new Required(),
            ],
            'veterinaryPhone' => [
                new Required(),
            ],
            'treatments' => [
                new Required(),
            ],
            'lastVaccine' => [
                new Required(),
            ],
            'isAgressive' => [
                new Required(),
            ],
            'observation' => [
                new Required(),
            ],
            'lastZeal' => [
                new Required(),
            ],
            'other' => [
                new Required(),
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