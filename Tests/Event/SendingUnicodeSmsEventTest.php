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

use WBW\Bundle\SmsModeBundle\Event\SendingUnicodeSmsEvent;
use WBW\Bundle\SmsModeBundle\Tests\AbstractTestCase;
use WBW\Library\SmsMode\Request\SendingUnicodeSmsRequest;
use WBW\Library\SmsMode\Response\SendingUnicodeSmsResponse;

/**
 * Sending unicode SMS event test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\SmsModeBundle\Tests\Event
 */
class SendingUnicodeSmsEventTest extends AbstractTestCase {

    /**
     * Test setRequest()
     *
     * @return void
     */
    public function testSetRequest(): void {

        // Set a Sending unicode SMS request mock.
        $request = new SendingUnicodeSmsRequest();

        $obj = new SendingUnicodeSmsEvent($this->sendingUnicodeSms);

        $obj->setRequest($request);
        $this->assertSame($request, $obj->getRequest());
    }

    /**
     * Test setResponse()
     *
     * @return void
     */
    public function testSetResponse(): void {

        // Set a Sending unicode SMS response mock.
        $response = new SendingUnicodeSmsResponse();

        $obj = new SendingUnicodeSmsEvent($this->sendingUnicodeSms);

        $obj->setResponse($response);
        $this->assertSame($response, $obj->getResponse());
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("wbw.smsmode.event.sending_unicode_sms", SendingUnicodeSmsEvent::EVENT_NAME);

        $obj = new SendingUnicodeSmsEvent($this->sendingUnicodeSms);

        $this->assertEquals(SendingUnicodeSmsEvent::EVENT_NAME, $obj->getEventName());

        $this->assertNull($obj->getRequest());
        $this->assertNull($obj->getResponse());

        $this->assertSame($this->sendingUnicodeSms, $obj->getSendingUnicodeSms());
    }
}
