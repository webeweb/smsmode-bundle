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
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\SMSModeBundle\Tests\Event
 */
class DeliveryReportCallbackEventTest extends AbstractTestCase {

    /**
     * Tests __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        // Set a Delivery report callback mock.
        $deliveryReportCallback = new DeliveryReportCallback();

        $this->assertEquals("wbw.smsmode.event.delivery_report_callback", DeliveryReportCallbackEvent::EVENT_NAME);

        $obj = new DeliveryReportCallbackEvent($deliveryReportCallback);

        $this->assertEquals(DeliveryReportCallbackEvent::EVENT_NAME, $obj->getEventName());

        $this->assertSame($deliveryReportCallback, $obj->getDeliveryReportCallback());
    }
}
