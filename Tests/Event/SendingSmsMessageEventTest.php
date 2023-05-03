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

use WBW\Bundle\SmsModeBundle\Event\SendingSmsMessageEvent;
use WBW\Bundle\SmsModeBundle\Tests\AbstractTestCase;
use WBW\Library\SmsMode\Request\SendingSmsMessageRequest;
use WBW\Library\SmsMode\Response\SendingSmsMessageResponse;

/**
 * Sending SMS message event test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\SmsModeBundle\Tests\Event
 */
class SendingSmsMessageEventTest extends AbstractTestCase {

    /**
     * Test setRequest()
     *
     * @return void
     */
    public function testSetRequest(): void {

        // Set a Sending SMS message request mock.
        $request = new SendingSmsMessageRequest();

        $obj = new SendingSmsMessageEvent($this->sendingSmsMessage);

        $obj->setRequest($request);
        $this->assertSame($request, $obj->getRequest());
    }

    /**
     * Test setResponse()
     *
     * @return void
     */
    public function testSetResponse(): void {

        // Set a Sending SMS message response mock.
        $response = new SendingSmsMessageResponse();

        $obj = new SendingSmsMessageEvent($this->sendingSmsMessage);

        $obj->setResponse($response);
        $this->assertSame($response, $obj->getResponse());
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("wbw.smsmode.event.sending_sms_message", SendingSmsMessageEvent::EVENT_NAME);

        $obj = new SendingSmsMessageEvent($this->sendingSmsMessage);

        $this->assertEquals(SendingSmsMessageEvent::EVENT_NAME, $obj->getEventName());

        $this->assertNull($obj->getRequest());
        $this->assertNull($obj->getResponse());

        $this->assertSame($this->sendingSmsMessage, $obj->getSendingSmsMessage());
    }
}
