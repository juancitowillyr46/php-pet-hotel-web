<?php
namespace App\BackOffice\Customers\Domain\Entities;

use App\BackOffice\Customers\Domain\Exceptions\CustomerActionRequestSchema;
use App\Shared\Domain\Entities\Audit;
use App\Shared\Utility\SecurityPassword;
use Exception;
use Ramsey\Uuid\Uuid;

class CustomerEntity extends Audit
{
    public string $first_name;
    public string $last_name;
    public string $phone;
    public int $district_id;
    public string $address;
    public string $address_optional;
    public string $address_reference;
    public string $comments;
    public string $image;
    public string $user_id;
    public string $email;


    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->first_name;
    }

    /**
     * @param string $first_name
     */
    public function setFirstName(string $first_name): void
    {
        $this->first_name = $first_name;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->last_name;
    }

    /**
     * @param string $last_name
     */
    public function setLastName(string $last_name): void
    {
        $this->last_name = $last_name;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    /**
     * @return string
     */
    public function getAddressOptional(): string
    {
        return $this->address_optional;
    }

    /**
     * @param string $address_optional
     */
    public function setAddressOptional(string $address_optional): void
    {
        $this->address_optional = $address_optional;
    }

    /**
     * @return string
     */
    public function getComments(): string
    {
        return $this->comments;
    }

    /**
     * @param string $comments
     */
    public function setComments(string $comments): void
    {
        $this->comments = $comments;
    }

    /**
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage(string $image): void
    {
        $this->image = $image;
    }

    /**
     * @return string
     */
    public function getUserId(): string
    {
        return $this->user_id;
    }

    /**
     * @param string $user_id
     */
    public function setUserId(string $user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return int
     */
    public function getDistrictId(): int
    {
        return $this->district_id;
    }

    /**
     * @param int $district_id
     */
    public function setDistrictId(int $district_id): void
    {
        $this->district_id = $district_id;
    }

    /**
     * @return string
     */
    public function getAddressReference(): string
    {
        return $this->address_reference;
    }

    /**
     * @param string $address_reference
     */
    public function setAddressReference(string $address_reference): void
    {
        $this->address_reference = $address_reference;
    }

    public function payload(object $formData): void {

        try {

            $validate = new CustomerActionRequestSchema();
            $validate->getMessages((array)$formData);
            $this->identifiedResource($formData);
            $this->setFirstName($formData->firstName);
            $this->setLastName($formData->lastName);
            $this->setPhone($formData->phone);
            $this->setEmail($formData->email);
            //$this->setDistrictId($formData->districtId);
            $this->setAddress($formData->address);
            $this->setAddressOptional($formData->addressOptional);
            $this->setAddressReference($formData->addressReference);
            $this->setComments($formData->comments);
            $this->setImage($formData->image);
            $this->setActive($formData->active);


        } catch(Exception $ex) {
            throw new Exception($ex->getMessage(), $ex->getCode());
        }

    }
}