<?php

namespace Vespolina\Entity\Partner\PaymentProfileType;

use Vespolina\Entity\Partner\PaymentProfile;
use Vespolina\Entity\Partner\Partner;

class CreditCard extends PaymentProfile implements PaymentProfileTypeInterface
{
    protected $activeCardNumber;
    protected $cardType;
    protected $expiration;
    protected $persistedCardNumber;

    /**
     * @param string $cardNumber
     * @return \Vespolina\Entity\Partner\PaymentProfileType\CreditCard
     */
    public function setCardNumber($cardNumber)
    {
        if ($cardNumber !== null && substr($cardNumber, 12) != str_repeat('*', 12)) {
            $this->activeCardNumber = preg_replace('/\D/', '', $cardNumber);
            $this->persistedCardNumber = str_repeat('*', 12) . substr($this->activeCardNumber, -4);
        }

        return $this;
    }

    public function getCardLast4Digits()
    {
        if ($this->persistedCardNumber !== null && strlen($this->persistedCardNumber) == 16) {

            return substr($this->persistedCardNumber, -4);
        }

        throw new \Exception("The persisted card number is not valid");
    }

    /**
     * @param null $type
     * @return mixed
     */
    public function getCardNumber($type = null)
    {
        if ($type === 'active') {
            return $this->activeCardNumber;
        }
        return $this->persistedCardNumber;
    }

    /**
     * @param $cardType
     * @return \Vespolina\Entity\Partner\PaymentProfileType\CreditCard
     */
    public function setCardType($cardType)
    {
        $this->cardType = $cardType;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCardType()
    {
        return $this->cardType;
    }

    /**
     * @param \DateTime
     * @return \Vespolina\Entity\Partner\PaymentProfileType\CreditCard
     */
    public function setExpiration(\DateTime $expirationDate)
    {
        $this->expiration = $expirationDate;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getExpiration()
    {
        return $this->expiration;
    }

    public function getType()
    {
        return Partner::PAYMENT_PROFILE_TYPE_CREDIT_CARD;
    }
}
