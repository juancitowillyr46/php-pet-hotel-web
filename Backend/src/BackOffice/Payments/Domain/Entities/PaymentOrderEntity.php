<?php


namespace App\BackOffice\Payments\Domain\Entities;


use App\BackOffice\Payments\Domain\Exceptions\PaymentOrderActionRequestSchema;
use App\Shared\Domain\Entities\Audit;
use Exception;

class PaymentOrderEntity extends Audit
{
    public int $payment_id;
    public int $service_id;
    public float $price;
    public float $subtotal;
    public int $quantity;

    /**
     * @return int
     */
    public function getPaymentId(): int
    {
        return $this->payment_id;
    }

    /**
     * @param int $payment_id
     */
    public function setPaymentId(int $payment_id): void
    {
        $this->payment_id = $payment_id;
    }

    /**
     * @return int
     */
    public function getServiceId(): int
    {
        return $this->service_id;
    }

    /**
     * @param int $service_id
     */
    public function setServiceId(int $service_id): void
    {
        $this->service_id = $service_id;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    /**
     * @return float
     */
    public function getSubtotal(): float
    {
        return $this->subtotal;
    }

    /**
     * @param float $subtotal
     */
    public function setSubtotal(float $subtotal): void
    {
        $this->subtotal = $subtotal;
    }

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     */
    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }

    public function payload(object $formData): void {

        try {

            $validate = new PaymentOrderActionRequestSchema();
            $validate->getMessages((array)$formData);
            $this->identifiedResource($formData);
//            $this->setPaymentId($formData->paymentId);
//            $this->setServiceId($formData->serviceId);
            $this->setQuantity($formData->quantity);
            $this->setPrice($formData->price);
            $this->setSubtotal($formData->subtotal);
            $this->setActive($formData->active);

        } catch(Exception $ex) {
            throw new Exception($ex->getMessage(), $ex->getCode());
        }

    }
}