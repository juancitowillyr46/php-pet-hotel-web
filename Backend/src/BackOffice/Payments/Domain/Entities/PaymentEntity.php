<?php
namespace App\BackOffice\Payments\Domain\Entities;

use App\BackOffice\Payments\Domain\Exceptions\PaymentActionRequestSchema;
use App\BackOffice\Payments\Domain\Exceptions\PaymentStateRequestSchema;
use App\Shared\Domain\Entities\Audit;
use App\Shared\Utility\SecurityPassword;
use Exception;
use Ramsey\Uuid\Uuid;

class PaymentEntity extends Audit
{
    public int $bank_id;
    public string $ticket;
    public int $payment_method_id;
    public string $screen_voucher;
    public int $state_id;
    public string $date;
    public string $billing_first_name;
    public string $billing_last_name;
    public string $billing_dni;
    public string $billing_email;
    public string $billing_phone;
    public string $billing_address;
    public float $total;
    public int $booking_id;
    public int $customer_id;

    /**
     * @return int
     */
    public function getBankId(): int
    {
        return $this->bank_id;
    }

    /**
     * @param int $bank_id
     */
    public function setBankId(int $bank_id): void
    {
        $this->bank_id = $bank_id;
    }

    /**
     * @return string
     */
    public function getTicket(): string
    {
        return $this->ticket;
    }

    /**
     * @param string $ticket
     */
    public function setTicket(string $ticket): void
    {
        $this->ticket = $ticket;
    }

    /**
     * @return int
     */
    public function getPaymentMethodId(): int
    {
        return $this->payment_method_id;
    }

    /**
     * @param int $payment_method_id
     */
    public function setPaymentMethodId(int $payment_method_id): void
    {
        $this->payment_method_id = $payment_method_id;
    }

    /**
     * @return string
     */
    public function getScreenVoucher(): string
    {
        return $this->screen_voucher;
    }

    /**
     * @param string $screen_voucher
     */
    public function setScreenVoucher(string $screen_voucher): void
    {
        $this->screen_voucher = $screen_voucher;
    }

    /**
     * @return int
     */
    public function getStateId(): int
    {
        return $this->state_id;
    }

    /**
     * @param int $state_id
     */
    public function setStateId(int $state_id): void
    {
        $this->state_id = $state_id;
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * @param string $date
     */
    public function setDate(string $date): void
    {
        $this->date = $date;
    }

    /**
     * @return string
     */
    public function getBillingFirstName(): string
    {
        return $this->billing_first_name;
    }

    /**
     * @param string $billing_first_name
     */
    public function setBillingFirstName(string $billing_first_name): void
    {
        $this->billing_first_name = $billing_first_name;
    }

    /**
     * @return string
     */
    public function getBillingLastName(): string
    {
        return $this->billing_last_name;
    }

    /**
     * @param string $billing_last_name
     */
    public function setBillingLastName(string $billing_last_name): void
    {
        $this->billing_last_name = $billing_last_name;
    }

    /**
     * @return string
     */
    public function getBillingDni(): string
    {
        return $this->billing_dni;
    }

    /**
     * @param string $billing_dni
     */
    public function setBillingDni(string $billing_dni): void
    {
        $this->billing_dni = $billing_dni;
    }

    /**
     * @return string
     */
    public function getBillingEmail(): string
    {
        return $this->billing_email;
    }

    /**
     * @param string $billing_email
     */
    public function setBillingEmail(string $billing_email): void
    {
        $this->billing_email = $billing_email;
    }

    /**
     * @return string
     */
    public function getBillingAddress(): string
    {
        return $this->billing_address;
    }

    /**
     * @param string $billing_address
     */
    public function setBillingAddress(string $billing_address): void
    {
        $this->billing_address = $billing_address;
    }

    /**
     * @return int
     */
    public function getBookingId(): int
    {
        return $this->booking_id;
    }

    /**
     * @param int $booking_id
     */
    public function setBookingId(int $booking_id): void
    {
        $this->booking_id = $booking_id;
    }

    /**
     * @return int
     */
    public function getCustomerId(): int
    {
        return $this->customer_id;
    }

    /**
     * @param int $customer_id
     */
    public function setCustomerId(int $customer_id): void
    {
        $this->customer_id = $customer_id;
    }

    /**
     * @return string
     */
    public function getBillingPhone(): string
    {
        return $this->billing_phone;
    }

    /**
     * @param string $billing_phone
     */
    public function setBillingPhone(string $billing_phone): void
    {
        $this->billing_phone = $billing_phone;
    }

    /**
     * @return float
     */
    public function getTotal(): float
    {
        return $this->total;
    }

    /**
     * @param float $total
     */
    public function setTotal(float $total): void
    {
        $this->total = $total;
    }

    public function payload(object $formData): void {

        try {

            $validate = new PaymentActionRequestSchema();
            $validate->getMessages((array)$formData);
            $this->identifiedResource($formData);


            $this->setScreenVoucher($formData->screenVoucher);
            $this->setDate($formData->date);
            $this->setBillingFirstName($formData->billingFirstName);
            $this->setBillingLastName($formData->billingLastName);
            $this->setBillingDni($formData->billingDni);
            $this->setBillingEmail($formData->billingEmail);
            $this->setBillingPhone($formData->billingPhone);
            $this->setBillingAddress($formData->billingAddress);
            $this->setTotal($formData->total);
            $this->setActive($formData->active);

        } catch(Exception $ex) {
            throw new Exception($ex->getMessage(), $ex->getCode());
        }

    }

    public function payloadState(object $formData): void {
        try {

            $validate = new PaymentStateRequestSchema();
            $validate->getMessages((array)$formData);
            $this->identifiedResource($formData);
//            $this->setStateId($formData->stateId);

        } catch(Exception $ex) {
            throw new Exception($ex->getMessage(), $ex->getCode());
        }

    }

}