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
use WBW\Bundle\SMSModeBundle\Tests\AbstractTestCase;
use WBW\Library\SMSMode\Request\SendingSMSBatchRequest;
use WBW\Library\SMSMode\Response\SendingSMSBatchResponse;

/**
 * Sending SMS batch event test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\SMSModeBundle\Tests\Event
 */
class SendingSMSBatchEventTest extends AbstractTestCase {

    /**
     * Tests setRequest()
     *
     * @return void
     */
    public function testSetRequest(): void {

        // Set a Sending SMS batch request mock.
        $request = new SendingSMSBatchRequest();

        $obj = new SendingSMSBatchEvent($this->sendingSMSBatch);

        $obj->setRequest($request);
        $this->assertSame($request, $obj->getRequest());
    }

    /**
     * Tests setResponse()
     *
     * @return void
     */
    public function testSetResponse(): void {

        // Set a Sending SMS batch response mock.
        $response = new SendingSMSBatchResponse();

        $obj = new SendingSMSBatchEvent($this->sendingSMSBatch);

        $obj->setResponse($response);
        $this->assertSame($response, $obj->getResponse());
    }

    /**
     * Tests __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("wbw.smsmode.event.sending_sms_batch", SendingSMSBatchEvent::EVENT_NAME);

        $obj = new SendingSMSBatchEvent($this->sendingSMSBatch);

        $this->assertEquals(SendingSMSBatchEvent::EVENT_NAME, $obj->getEventName());

        $this->assertNull($obj->getRequest());
        $this->assertNull($obj->getResponse());

        $this->assertSame($this->sendingSMSBatch, $obj->getSendingSMSBatch());
    }
}
