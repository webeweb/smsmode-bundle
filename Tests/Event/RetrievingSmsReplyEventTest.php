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

use WBW\Bundle\SmsModeBundle\Event\RetrievingSmsReplyEvent;
use WBW\Bundle\SmsModeBundle\Tests\AbstractTestCase;
use WBW\Library\SmsMode\Request\RetrievingSmsReplyRequest;
use WBW\Library\SmsMode\Response\RetrievingSmsReplyResponse;

/**
 * Retrieving SMS reply event test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\SmsModeBundle\Tests\Event
 */
class RetrievingSmsReplyEventTest extends AbstractTestCase {

    /**
     * Test setRequest()
     *
     * @return void
     */
    public function testSetRequest(): void {

        // Set a Retrieving SMS reply request mock.
        $request = new RetrievingSmsReplyRequest();

        $obj = new RetrievingSmsReplyEvent($this->retrievingSmsReply);

        $obj->setRequest($request);
        $this->assertSame($request, $obj->getRequest());
    }

    /**
     * Test setResponse()
     *
     * @return void
     */
    public function testSetResponse(): void {

        // Set a Retrieving SMS reply response mock.
        $response = new RetrievingSmsReplyResponse();

        $obj = new RetrievingSmsReplyEvent($this->retrievingSmsReply);

        $obj->setResponse($response);
        $this->assertSame($response, $obj->getResponse());
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("wbw.smsmode.event.retrieving_sms_reply", RetrievingSmsReplyEvent::EVENT_NAME);

        $obj = new RetrievingSmsReplyEvent($this->retrievingSmsReply);

        $this->assertEquals(RetrievingSmsReplyEvent::EVENT_NAME, $obj->getEventName());

        $this->assertNull($obj->getRequest());
        $this->assertNull($obj->getResponse());

        $this->assertSame($this->retrievingSmsReply, $obj->getRetrievingSmsReply());
    }
}
