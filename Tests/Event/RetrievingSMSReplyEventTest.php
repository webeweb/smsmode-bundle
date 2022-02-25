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

use WBW\Bundle\SMSModeBundle\Event\RetrievingSMSReplyEvent;
use WBW\Bundle\SMSModeBundle\Tests\AbstractTestCase;
use WBW\Library\SMSMode\Request\RetrievingSMSReplyRequest;
use WBW\Library\SMSMode\Response\RetrievingSMSReplyResponse;

/**
 * Retrieving SMS reply event test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\SMSModeBundle\Tests\Event
 */
class RetrievingSMSReplyEventTest extends AbstractTestCase {

    /**
     * Tests setRequest()
     *
     * @return void
     */
    public function testSetRequest(): void {

        // Set a Retrieving SMS reply request mock.
        $request = new RetrievingSMSReplyRequest();

        $obj = new RetrievingSMSReplyEvent($this->retrievingSMSReply);

        $obj->setRequest($request);
        $this->assertSame($request, $obj->getRequest());
    }

    /**
     * Tests setResponse()
     *
     * @return void
     */
    public function testSetResponse(): void {

        // Set a Retrieving SMS reply response mock.
        $response = new RetrievingSMSReplyResponse();

        $obj = new RetrievingSMSReplyEvent($this->retrievingSMSReply);

        $obj->setResponse($response);
        $this->assertSame($response, $obj->getResponse());
    }

    /**
     * Tests __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("wbw.smsmode.event.retrieving_sms_reply", RetrievingSMSReplyEvent::EVENT_NAME);

        $obj = new RetrievingSMSReplyEvent($this->retrievingSMSReply);

        $this->assertEquals(RetrievingSMSReplyEvent::EVENT_NAME, $obj->getEventName());

        $this->assertNull($obj->getRequest());
        $this->assertNull($obj->getResponse());

        $this->assertSame($this->retrievingSMSReply, $obj->getRetrievingSMSReply());
    }
}
