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

use WBW\Bundle\SmsModeBundle\Event\SendingSmsBatchEvent;
use WBW\Bundle\SmsModeBundle\Tests\AbstractTestCase;
use WBW\Library\SmsMode\Request\SendingSmsBatchRequest;
use WBW\Library\SmsMode\Response\SendingSmsBatchResponse;

/**
 * Sending SMS batch event test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\SmsModeBundle\Tests\Event
 */
class SendingSmsBatchEventTest extends AbstractTestCase {

    /**
     * Test setRequest()
     *
     * @return void
     */
    public function testSetRequest(): void {

        // Set a Sending SMS batch request mock.
        $request = new SendingSmsBatchRequest();

        $obj = new SendingSmsBatchEvent($this->sendingSmsBatch);

        $obj->setRequest($request);
        $this->assertSame($request, $obj->getRequest());
    }

    /**
     * Test setResponse()
     *
     * @return void
     */
    public function testSetResponse(): void {

        // Set a Sending SMS batch response mock.
        $response = new SendingSmsBatchResponse();

        $obj = new SendingSmsBatchEvent($this->sendingSmsBatch);

        $obj->setResponse($response);
        $this->assertSame($response, $obj->getResponse());
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("wbw.smsmode.event.sending_sms_batch", SendingSmsBatchEvent::EVENT_NAME);

        $obj = new SendingSmsBatchEvent($this->sendingSmsBatch);

        $this->assertEquals(SendingSmsBatchEvent::EVENT_NAME, $obj->getEventName());

        $this->assertNull($obj->getRequest());
        $this->assertNull($obj->getResponse());

        $this->assertSame($this->sendingSmsBatch, $obj->getSendingSmsBatch());
    }
}
