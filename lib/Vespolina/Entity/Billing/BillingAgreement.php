<?php
namespace Vespolina\Entity\Billing;

use Vespolina\Entity\Order\ItemInterface;
use Vespolina\Entity\Order\OrderInterface;
use Vespolina\Entity\Partner\PartnerInterface;

class BillingAgreement implements BillingAgreementInterface
{
    protected $active;
    protected $billingAmount;
    protected $billingCycles;
    protected $billingInterval;
    protected $createdAt;
    protected $id;
    protected $initialBillingDate;
    protected $nextBillingDate;
    protected $order;
    protected $orderItem;
    protected $partner;
    protected $paymentGateway;
    protected $numberCyclesBilled;
    protected $updatedAt;

    public function __construct()
    {
        $this->active = true;
        $this->numberCyclesBilled = 0;
    }

    public function getId()
    {
        return $this->id;
    }

    public function autoSetCreatedAt()
    {
        if (null === $this->createdAt) {
            $this->createdAt = new \DateTime();
        }
        $this->autoSetUpdatedAt();

        return $this;
    }

    public function autoSetUpdatedAt()
    {
        $this->updatedAt = new \DateTime();

        return $this;
    }

    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    public function getActive()
    {
        return $this->active;
    }

    public function setBillingAmount($billingAmount)
    {
        $this->billingAmount = $billingAmount;

        return $this;
    }

    public function getBillingAmount()
    {
        return $this->billingAmount;
    }

    public function setBillingCycles($billingCycles)
    {
        $this->billingCycles = $billingCycles;

        return $this;
    }

    public function getBillingCycles()
    {
        return $this->billingCycles;
    }

    public function setBillingInterval($billingInterval)
    {
        $this->billingInterval = $billingInterval;

        return $this;
    }

    public function getBillingInterval()
    {
        return $this->billingInterval;
    }

    /**
     * @inheritdoc
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @inheritdoc
     */
    public function setCreatedAt(\DateTime $createdAt)
    {
        $this->createdAt = $createdAt;
    }

    public function setInitialBillingDate(\DateTime $initialBillingDate)
    {
        $this->initialBillingDate = $initialBillingDate;

        return $this;
    }

    public function getInitialBillingDate()
    {
        return $this->initialBillingDate;
    }

    public function setNextBillingDate(\DateTime $nextBillingDate)
    {
        $this->nextBillingDate = $nextBillingDate;

        return $this;
    }

    public function getNextBillingDate()
    {
        return $this->nextBillingDate;
    }

    public function setOrder(OrderInterface $order)
    {
        $this->order = $order;

        return $this;
    }

    public function getOrder()
    {
        return $this->order;
    }

    public function setOrderItem(ItemInterface $item)
    {
        $this->orderItem = $item;

        return $this;
    }

    public function getOrderItem()
    {
        return $this->orderItem;
    }

    public function setPartner(PartnerInterface $partner)
    {
        $this->partner = $partner;

        return $this;
    }

    public function getPartner()
    {
        return $this->partner;
    }

    public function setPaymentGateway($paymentGateway)
    {
        $this->paymentGateway = $paymentGateway;

        return $this;
    }

    public function getPaymentGateway()
    {
        return $this->paymentGateway;
    }

    public function setNumberCyclesBilled($numberCyclesBilled)
    {
        $this->numberCyclesBilled = $numberCyclesBilled;

        return $this;
    }

    public function getNumberCyclesBilled()
    {
        return $this->numberCyclesBilled;
    }

    public function increaseNumberCyclesBilled()
    {
        $this->numberCyclesBilled++;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function setUpdatedAt(\DateTime $updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * @inheritdoc
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
}
