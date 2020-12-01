<?php
namespace App\BackOffice\Pets\Domain\Entities;

use App\BackOffice\Pets\Domain\Exceptions\PetActionRequestSchema;
use App\Shared\Domain\Entities\Audit;
use App\Shared\Utility\SecurityPassword;
use Exception;
use Ramsey\Uuid\Uuid;

class PetEntity extends Audit
{
    public string $name;
    public string $age;
    public string $age_type;
    public string $gender;
    public string $race;
    public string $image;
    public string $customer_id;
    public string $weight;
    public string $size;
    public string $diseases;
    public string $veterinary;
    public string $veterinary_phone;
    public string $treatments;
    public string $last_vaccine;
    public int $is_agressive;
    public string $observation;
    public string $init_zeal;
    public string $last_zeal;
    public string $other;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getAge(): string
    {
        return $this->age;
    }

    /**
     * @param string $age
     */
    public function setAge(string $age): void
    {
        $this->age = $age;
    }

    /**
     * @return string
     */
    public function getGender(): string
    {
        return $this->gender;
    }

    /**
     * @param string $gender
     */
    public function setGender(string $gender): void
    {
        $this->gender = $gender;
    }

    /**
     * @return string
     */
    public function getRace(): string
    {
        return $this->race;
    }

    /**
     * @param string $race
     */
    public function setRace(string $race): void
    {
        $this->race = $race;
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
    public function getCustomerId(): string
    {
        return $this->customer_id;
    }

    /**
     * @param string $customer_id
     */
    public function setCustomerId(string $customer_id): void
    {
        $this->customer_id = $customer_id;
    }

    /**
     * @return string
     */
    public function getWeight(): string
    {
        return $this->weight;
    }

    /**
     * @param string $weight
     */
    public function setWeight(string $weight): void
    {
        $this->weight = $weight;
    }

    /**
     * @return string
     */
    public function getSize(): string
    {
        return $this->size;
    }

    /**
     * @param string $size
     */
    public function setSize(string $size): void
    {
        $this->size = $size;
    }

    /**
     * @return string
     */
    public function getDiseases(): string
    {
        return $this->diseases;
    }

    /**
     * @param string $diseases
     */
    public function setDiseases(string $diseases): void
    {
        $this->diseases = $diseases;
    }

    /**
     * @return string
     */
    public function getVeterinary(): string
    {
        return $this->veterinary;
    }

    /**
     * @param string $veterinary
     */
    public function setVeterinary(string $veterinary): void
    {
        $this->veterinary = $veterinary;
    }

    /**
     * @return string
     */
    public function getVeterinaryPhone(): string
    {
        return $this->veterinary_phone;
    }

    /**
     * @param string $veterinary_phone
     */
    public function setVeterinaryPhone(string $veterinary_phone): void
    {
        $this->veterinary_phone = $veterinary_phone;
    }

    /**
     * @return string
     */
    public function getTreatments(): string
    {
        return $this->treatments;
    }

    /**
     * @param string $treatments
     */
    public function setTreatments(string $treatments): void
    {
        $this->treatments = $treatments;
    }

    /**
     * @return string
     */
    public function getLastVaccine(): string
    {
        return $this->last_vaccine;
    }

    /**
     * @param string $last_vaccine
     */
    public function setLastVaccine(string $last_vaccine): void
    {
        $this->last_vaccine = $last_vaccine;
    }

    /**
     * @return int
     */
    public function getIsAgressive(): int
    {
        return $this->is_agressive;
    }

    /**
     * @param int $is_agressive
     */
    public function setIsAgressive(int $is_agressive): void
    {
        $this->is_agressive = $is_agressive;
    }

    /**
     * @return string
     */
    public function getAgeType(): string
    {
        return $this->age_type;
    }

    /**
     * @param string $age_type
     */
    public function setAgeType(string $age_type): void
    {
        $this->age_type = $age_type;
    }


//    /**
//     * @return bool
//     */
//    public function isIsAgressive(): bool
//    {
//        return $this->is_agressive;
//    }
//
//    /**
//     * @param bool $is_agressive
//     */
//    public function setIsAgressive(bool $is_agressive): void
//    {
//        $this->is_agressive = $is_agressive;
//    }



    /**
     * @return string
     */
    public function getObservation(): string
    {
        return $this->observation;
    }

    /**
     * @param string $observation
     */
    public function setObservation(string $observation): void
    {
        $this->observation = $observation;
    }

    /**
     * @return string
     */
    public function getInitZeal(): string
    {
        return $this->init_zeal;
    }

    /**
     * @param string $init_zeal
     */
    public function setInitZeal(string $init_zeal): void
    {
        $this->init_zeal = $init_zeal;
    }

    /**
     * @return string
     */
    public function getLastZeal(): string
    {
        return $this->last_zeal;
    }

    /**
     * @param string $last_zeal
     */
    public function setLastZeal(string $last_zeal): void
    {
        $this->last_zeal = $last_zeal;
    }

    /**
     * @return string
     */
    public function getOther(): string
    {
        return $this->other;
    }

    /**
     * @param string $other
     */
    public function setOther(string $other): void
    {
        $this->other = $other;
    }



    public function payload(object $formData): void {

        try {

            $validate = new PetActionRequestSchema();
            $validate->getMessages((array)$formData);
            $this->identifiedResource($formData);
            $this->setName($formData->name);
            $this->setAge($formData->age);
            $this->setAgeType($formData->ageType);
            $this->setGender($formData->gender);
            $this->setRace($formData->race);
            $this->setImage($formData->image);
            $this->setWeight($formData->weight);
            $this->setSize($formData->size);
            $this->setDiseases($formData->diseases);
            $this->setVeterinary($formData->veterinary);
            $this->setVeterinaryPhone($formData->veterinaryPhone);
            $this->setTreatments($formData->treatments);
            $this->setLastVaccine($formData->lastVaccine);
            $this->setObservation($formData->observation);
            $this->setInitZeal($formData->initZeal);
            $this->setLastZeal($formData->lastZeal);
            $this->setOther($formData->other);
            $this->setActive($formData->active);

        } catch(Exception $ex) {
            throw new Exception($ex->getMessage(), $ex->getCode());
        }

    }
}