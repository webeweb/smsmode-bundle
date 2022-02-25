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

use WBW\Bundle\SMSModeBundle\Event\CheckingSMSMessageStatusEvent;
use WBW\Bundle\SMSModeBundle\Tests\AbstractTestCase;
use WBW\Library\SMSMode\Request\CheckingSMSMessageStatusRequest;
use WBW\Library\SMSMode\Response\CheckingSMSMessageStatusResponse;

/**
 * Checking SMS message status event test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\SMSModeBundle\Tests\Event
 */
class CheckingSMSMessageStatusEventTest extends AbstractTestCase {

    /**
     * Tests setRequest()
     *
     * @return void
     */
    public function testSetRequest(): void {

        // Set a Checking SMS message status request mock.
        $request = new CheckingSMSMessageStatusRequest();

        $obj = new CheckingSMSMessageStatusEvent($this->checkingSMSMessageStatus);

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
        $response = new CheckingSMSMessageStatusResponse();

        $obj = new CheckingSMSMessageStatusEvent($this->checkingSMSMessageStatus);

        $obj->setResponse($response);
        $this->assertSame($response, $obj->getResponse());
    }

    /**
     * Tests __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("wbw.smsmode.event.checking_sms_message_status", CheckingSMSMessageStatusEvent::EVENT_NAME);

        $obj = new CheckingSMSMessageStatusEvent($this->checkingSMSMessageStatus);

        $this->assertEquals(CheckingSMSMessageStatusEvent::EVENT_NAME, $obj->getEventName());

        $this->assertNull($obj->getRequest());
        $this->assertNull($obj->getResponse());

        $this->assertSame($this->checkingSMSMessageStatus, $obj->getCheckingSMSMessageStatus());
    }
}
