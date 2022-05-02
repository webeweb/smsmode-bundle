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

use WBW\Bundle\SmsModeBundle\Event\SentSmsMessageListEvent;
use WBW\Bundle\SmsModeBundle\Tests\AbstractTestCase;
use WBW\Library\SmsMode\Request\SentSmsMessageListRequest;
use WBW\Library\SmsMode\Response\SentSmsMessageListResponse;

/**
 * Sent SMS message list event test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\SmsModeBundle\Tests\Event
 */
class SentSmsMessageListEventTest extends AbstractTestCase {

    /**
     * Tests setRequest()
     *
     * @return void
     */
    public function testSetRequest(): void {

        // Set a Sent SMS message list request mock.
        $request = new SentSmsMessageListRequest();

        $obj = new SentSmsMessageListEvent($this->sentSmsMessageList);

        $obj->setRequest($request);
        $this->assertSame($request, $obj->getRequest());
    }

    /**
     * Tests setResponse()
     *
     * @return void
     */
    public function testSetResponse(): void {

        // Set a Sent SMS message list response mock.
        $response = new SentSmsMessageListResponse();

        $obj = new SentSmsMessageListEvent($this->sentSmsMessageList);

        $obj->setResponse($response);
        $this->assertSame($response, $obj->getResponse());
    }

    /**
     * Tests __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("wbw.smsmode.event.sent_sms_message_list", SentSmsMessageListEvent::EVENT_NAME);

        $obj = new SentSmsMessageListEvent($this->sentSmsMessageList);

        $this->assertEquals(SentSmsMessageListEvent::EVENT_NAME, $obj->getEventName());

        $this->assertNull($obj->getRequest());
        $this->assertNull($obj->getResponse());

        $this->assertSame($this->sentSmsMessageList, $obj->getSentSmsMessageList());
    }
}
