<?php
/**
 * (c) 2012 Vespolina Project http://www.vespolina-project.org
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

use Vespolina\Entity\Order\Order;

class OrderTest extends \PHPUnit_Framework_TestCase
{
    public function testOrderDate()
    {
        $order = new Order();
        $now = new \DateTime();
        $order->setOrderDate($now);
        $this->assertEquals($now, $order->getOrderDate());
    }

}
