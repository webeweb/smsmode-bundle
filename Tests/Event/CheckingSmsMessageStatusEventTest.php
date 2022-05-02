<?php

/*
 * This file is part of the smsmode-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\SmsModeBundle\Tests\Event;

use WBW\Bundle\SmsModeBundle\Event\CheckingSmsMessageStatusEvent;
use WBW\Bundle\SmsModeBundle\Tests\AbstractTestCase;
use WBW\Library\SmsMode\Request\CheckingSmsMessageStatusRequest;
use WBW\Library\SmsMode\Response\CheckingSmsMessageStatusResponse;

/**
 * Checking SMS message status event test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\SmsModeBundle\Tests\Event
 */
class CheckingSmsMessageStatusEventTest extends AbstractTestCase {

    /**
     * Tests setRequest()
     *
     * @return void
     */
    public function testSetRequest(): void {

        // Set a Checking SMS message status request mock.
        $request = new CheckingSmsMessageStatusRequest();

        $obj = new CheckingSmsMessageStatusEvent($this->checkingSmsMessageStatus);

        $obj->setRequest($request);
        $this->assertSame($request, $obj->getRequest());
    }

    /**
     * Tests setResponse()
     *
     * @return void
     */
    public function testSetResponse(): void {

        // Set a CHecking SMS message status response mock.
        $response = new CheckingSmsMessageStatusResponse();

        $obj = new CheckingSmsMessageStatusEvent($this->checkingSmsMessageStatus);

        $obj->setResponse($response);
        $this->assertSame($response, $obj->getResponse());
    }

    /**
     * Tests __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("wbw.smsmode.event.checking_sms_message_status", CheckingSmsMessageStatusEvent::EVENT_NAME);

        $obj = new CheckingSmsMessageStatusEvent($this->checkingSmsMessageStatus);

        $this->assertEquals(CheckingSmsMessageStatusEvent::EVENT_NAME, $obj->getEventName());

        $this->assertNull($obj->getRequest());
        $this->assertNull($obj->getResponse());

        $this->assertSame($this->checkingSmsMessageStatus, $obj->getCheckingSmsMessageStatus());
    }
}
