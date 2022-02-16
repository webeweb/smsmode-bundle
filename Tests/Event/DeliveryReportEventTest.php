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

use WBW\Bundle\SMSModeBundle\Event\DeliveryReportEvent;
use WBW\Bundle\SMSModeBundle\Tests\AbstractTestCase;
use WBW\Library\SMSMode\Request\DeliveryReportRequest;
use WBW\Library\SMSMode\Response\DeliveryReportResponse;

/**
 * Delivery report event test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\SMSModeBundle\Tests\Event
 */
class DeliveryReportEventTest extends AbstractTestCase {

    /**
     * Tests setRequest()
     *
     * @return void
     */
    public function testSetRequest(): void {

        // Set a Delivery report request mock.
        $request = new DeliveryReportRequest();

        $obj = new DeliveryReportEvent($this->deliveryReport);

        $obj->setRequest($request);
        $this->assertSame($request, $obj->getRequest());
    }

    /**
     * Tests setResponse()
     *
     * @return void
     */
    public function testSetResponse(): void {

        // Set a Delivery report response mock.
        $response = new DeliveryReportResponse();

        $obj = new DeliveryReportEvent($this->deliveryReport);

        $obj->setResponse($response);
        $this->assertSame($response, $obj->getResponse());
    }

    /**
     * Tests __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("wbw.smsmode.event.delivery_report", DeliveryReportEvent::EVENT_NAME);

        $obj = new DeliveryReportEvent($this->deliveryReport);

        $this->assertEquals(DeliveryReportEvent::EVENT_NAME, $obj->getEventName());

        $this->assertNull($obj->getRequest());
        $this->assertNull($obj->getResponse());

        $this->assertSame($this->deliveryReport, $obj->getDeliveryReport());
    }
}
