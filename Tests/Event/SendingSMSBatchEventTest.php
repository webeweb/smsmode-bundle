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

use WBW\Bundle\SMSModeBundle\Event\SendingSMSBatchEvent;
use WBW\Bundle\SMSModeBundle\Event\SMSModeEvents;
use WBW\Bundle\SMSModeBundle\Tests\AbstractTestCase;
use WBW\Library\SMSMode\Model\SendingSMSBatchRequest;
use WBW\Library\SMSMode\Model\SendingSMSBatchResponse;

/**
 * Sending SMS batch event test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\SMSModeBundle\Tests\Event
 */
class SendingSMSBatchEventTest extends AbstractTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new SendingSMSBatchEvent($this->sendingSMSBatch);

        $this->assertEquals(SMSModeEvents::SENDING_SMS_BATCH, $obj->getEventName());

        $this->assertNull($obj->getRequest());
        $this->assertNull($obj->getResponse());

        $this->assertSame($this->sendingSMSBatch, $obj->getSendingSMSBatch());
    }

    /**
     * Tests the setRequest() method.
     *
     * @return void
     */
    public function testSetRequest() {

        // Set a Sending SMS batch request mock.
        $request = new SendingSMSBatchRequest();

        $obj = new SendingSMSBatchEvent($this->sendingSMSBatch);

        $obj->setRequest($request);
        $this->assertSame($request, $obj->getRequest());
    }

    /**
     * Tests the setResponse() method.
     *
     * @return void
     */
    public function testSetResponse() {

        // Set a Sending SMS batch response mock.
        $response = new SendingSMSBatchResponse();

        $obj = new SendingSMSBatchEvent($this->sendingSMSBatch);

        $obj->setResponse($response);
        $this->assertSame($response, $obj->getResponse());
    }
}
