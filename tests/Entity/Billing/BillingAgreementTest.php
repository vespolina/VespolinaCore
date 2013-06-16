<?php
/**
 * (c) 2013 Vespolina Project http://www.vespolina-project.org
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

use Vespolina\Entity\Billing\BillingAgreement;

class BillingAgreementTest extends \PHPUnit_Framework_TestCase
{
    public function testConstruct()
    {
        $billingAgreement = new BillingAgreement();
        $this->assertTrue($billingAgreement->getActive());
        $this->assertEquals(0, $billingAgreement->getNumberCyclesBilled());


    }

    public function testSetCurrentCycleComplete()
    {
        $billingAgreement = new BillingAgreement();
        $billingAgreement->setInitialBillingDate(new \DateTime('2012-10-10'));
        $billingAgreement->setBillingInterval('+1 month');
        $billingAgreement->setNumberCyclesBilled(1);

        $this->assertEquals(1, $billingAgreement->getNumberCyclesBilled());

        $billingAgreement = new BillingAgreement();
        $billingAgreement->setInitialBillingDate(new \DateTime('2011-10-10'));
        $billingAgreement->setBillingInterval('+1 year');
        $billingAgreement->setNumberCyclesBilled(2);

        $this->assertEquals(2, $billingAgreement->getNumberCyclesBilled());

        $billingAgreement = new BillingAgreement();
        $billingAgreement->setInitialBillingDate(new \DateTime('2012-12-29'));
        $billingAgreement->setBillingInterval('+1 month');
        $billingAgreement->setNumberCyclesBilled(1);
    }

    /**
     * cycles, interval, billedTo,
     */
    public function nextCycleData()
    {

    }

    /**
     * @dataProvider datesAndOffsets
     */
    public function testDateFromOffset($start, $offset, $expected)
    {
        $billingAgreement = new BillingAgreement();

        $newDate = $billingAgreement->dateFromOffset($start, $offset);
        $this->assertEquals($expected, $newDate);
        $this->assertNotSame($newDate, $start);
    }

    public function datesAndOffsets()
    {
        return array(
            array(new \DateTime('2012-03-07'), '-1 week', new \DateTime('2012-02-29')),
            array(new \DateTime('2012-02-29'), '+1 year', new \DateTime('2013-02-28')),
            array(new \DateTime('2013-03-29'), '-1 month', new \DateTime('2013-02-28')),
            array(new \DateTime('2013-03-31'), '+1 month', new \DateTime('2013-04-30')),
            array(new \DateTime('2012-03-31'), '-4 weeks', new \DateTime('2012-03-03')),
        );
    }
}
