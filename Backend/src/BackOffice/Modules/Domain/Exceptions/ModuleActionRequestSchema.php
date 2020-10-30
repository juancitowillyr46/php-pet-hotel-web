<?php
namespace App\BackOffice\Modules\Domain\Exceptions;

use App\Shared\Exception\ValidateRequestException;
use App\Shared\Exception\BaseValidatorRequest;
use Symfony\Component\Validator\Constraints\Optional;
use Symfony\Component\Validator\Constraints\Required;
use Symfony\Component\Validator\Constraints\Type;

class ModuleActionRequestSchema extends BaseValidatorRequest
{
    public function getMessages(array $data): array {

        $messages = $this->createSchema([
            'id' => [
               new Optional(),
            ],
            'name' => [
                new Required(),
            ],
            'slug' => [
                new Required(),
            ],
            'icon' => [
                new Required(),
            ],
            'parentId' => [
                new Required(),
            ],
            'isParent' => [
                new Required(),
            ],
            'isChildren' => [
                new Required(),
            ],
            'order' => [
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