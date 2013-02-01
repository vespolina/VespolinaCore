<?php

namespace Vespolina\Entity\Partner;

use Pimple;
use Vespolina\Entity\Partner\PartnerInterface;

class PaymentProfile extends Pimple implements PaymentProfileInterface
{
    const PAYMENT_PROFILE_TYPE_CREDIT_CARD = 'Credit Card';
    const PAYMENT_PROFILE_TYPE_INVOICE = 'Invoice';

    public static $validTypes = array(
        self::PAYMENT_PROFILE_TYPE_CREDIT_CARD,
        self::PAYMENT_PROFILE_TYPE_INVOICE,
    );

    protected $id;
    protected $reference;
    protected $partner;
    protected $billingCity;
    protected $billingCountry;
    protected $billingState;
    protected $billingAddress;
    protected $billingZipCode;
    protected $billingPhone;

    /**
     * @inheritdoc
     */
    public function setPartner(PartnerInterface $partner)
    {
        $this->partner = $partner;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getPartner()
    {
        return $this->partner;
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * @inheritdoc
     */
    public function setBillingAddress($billingAddress)
    {
        $this->billingAddress = $billingAddress;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getBillingAddress()
    {
        return $this->billingAddress;
    }

    /**
     * @inheritdoc
     */
    public function setBillingZipCode($billingZipCode)
    {
        $this->billingZipCode = $billingZipCode;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getBillingZipCode()
    {
        return $this->billingZipCode;
    }

    /**
     * @inheritdoc
     */
    public function setBillingCity($billingCity)
    {
        $this->billingCity = $billingCity;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getBillingCity()
    {
        return $this->billingCity;
    }

    /**
     * @inheritdoc
     */
    public function setBillingCountry($billingCountry)
    {
        $this->billingCountry = $billingCountry;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getBillingCountry()
    {
        return $this->billingCountry;
    }

    /**
     * @inheritdoc
     */
    public function setBillingPhone($billingPhone)
    {
        $this->billingPhone = $billingPhone;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getBillingPhone()
    {
        return $this->billingPhone;
    }

    /**
     * @inheritdoc
     */
    public function setBillingState($billingState)
    {
        $this->billingState = $billingState;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getBillingState()
    {
        return $this->billingState;
    }
}
