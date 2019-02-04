<?php

/*
 * This file is part of the smsmode-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\SMSModeBundle\Tests\Event;

use WBW\Bundle\SMSModeBundle\Event\DeliveryReportCallbackEvent;
use WBW\Bundle\SMSModeBundle\Tests\AbstractTestCase;
use WBW\Library\SMSMode\Model\DeliveryReportCallback;

/**
 * Delivery report callback event test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\SMSModeBundle\Tests\Event
 */
class DeliveryReportCallbackEventTest extends AbstractTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        // Set a Delivery report callback mock.
        $deliveryReportCallback = new DeliveryReportCallback();

        $obj = new DeliveryReportCallbackEvent("eventName", $deliveryReportCallback);

        $this->assertEquals("eventName", $obj->getEventName());
        $this->assertSame($deliveryReportCallback, $obj->getDeliveryReportCallback());
    }
}
