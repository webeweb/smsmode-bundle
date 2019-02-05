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
use WBW\Bundle\SMSModeBundle\Event\SMSModeEvents;
use WBW\Bundle\SMSModeBundle\Tests\AbstractTestCase;
use WBW\Library\SMSMode\Model\RetrievingSMSReplyRequest;
use WBW\Library\SMSMode\Model\RetrievingSMSReplyResponse;

/**
 * Retrieving SMS reply event test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\SMSModeBundle\Tests\Event
 */
class RetrievingSMSReplyEventTest extends AbstractTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new RetrievingSMSReplyEvent($this->retrievingSMSReply);

        $this->assertEquals(SMSModeEvents::RETRIEVING_SMS_REPLY, $obj->getEventName());

        $this->assertNull($obj->getRequest());
        $this->assertNull($obj->getResponse());

        $this->assertSame($this->retrievingSMSReply, $obj->getRetrievingSMSReply());
    }

    /**
     * Tests the setRequest() method.
     *
     * @return void
     */
    public function testSetRequest() {

        // Set a Retrieving SMS reply request mock.
        $request = new RetrievingSMSReplyRequest();

        $obj = new RetrievingSMSReplyEvent($this->retrievingSMSReply);

        $obj->setRequest($request);
        $this->assertSame($request, $obj->getRequest());
    }

    /**
     * Tests the setResponse() method.
     *
     * @return void
     */
    public function testSetResponse() {

        // Set a Retrieving SMS reply response mock.
        $response = new RetrievingSMSReplyResponse();

        $obj = new RetrievingSMSReplyEvent($this->retrievingSMSReply);

        $obj->setResponse($response);
        $this->assertSame($response, $obj->getResponse());
    }
}
