<?php
namespace App\BackOffice\Services\Domain\Exceptions;

use App\Shared\Exception\ValidateRequestException;
use App\Shared\Exception\BaseValidatorRequest;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Optional;
use Symfony\Component\Validator\Constraints\Required;
use Symfony\Component\Validator\Constraints\Type;

class ServiceActionRequestSchema extends BaseValidatorRequest
{
    public function getMessages(array $data): array {

        $messages = $this->createSchema([
            'id' => [
               new Optional(),
            ],
            'serviceTypeId' => [
                new Required(),
            ],
            'name' => [
                new Required(),
            ],
            'description' => [
                new Required(),
            ],
            'image' => [
                new Required(),
            ],
            'main' => [
                new Type('bool')
            ],
            'active' => [
                new Type('bool')
            ],
            'price' => [
                new Required(),
            ],
            'visibleId' => [
                new Required(),
            ],
            'planId' => [
                new Required(),
            ]
        ], $data);

        if(count($messages) > 0) {
            throw new ValidateRequestException(json_encode($messages, JSON_PRETTY_PRINT), 1500);
        }

        return $messages;
    }
}