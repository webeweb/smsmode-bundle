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

use WBW\Bundle\SMSModeBundle\Event\SendingTextToSpeechSMSEvent;
use WBW\Bundle\SMSModeBundle\Tests\AbstractTestCase;
use WBW\Library\SMSMode\Model\Request\SendingTextToSpeechSMSRequest;
use WBW\Library\SMSMode\Model\Response\SendingTextToSpeechSMSResponse;

/**
 * Sending text-to-speech SMS event test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\SMSModeBundle\Tests\Event
 */
class SendingTextToSpeechSMSEventTest extends AbstractTestCase {

    /**
     * Tests the setRequest() method.
     *
     * @return void
     */
    public function testSetRequest(): void {

        // Set a Sending text-to-speech SMS request mock.
        $request = new SendingTextToSpeechSMSRequest();

        $obj = new SendingTextToSpeechSMSEvent($this->sendingTextToSpeechSMS);

        $obj->setRequest($request);
        $this->assertSame($request, $obj->getRequest());
    }

    /**
     * Tests the setResponse() method.
     *
     * @return void
     */
    public function testSetResponse(): void {

        // Set a Sending text-to-speech SMS response mock.
        $response = new SendingTextToSpeechSMSResponse();

        $obj = new SendingTextToSpeechSMSEvent($this->sendingTextToSpeechSMS);

        $obj->setResponse($response);
        $this->assertSame($response, $obj->getResponse());
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("wbw.smsmode.event.sending_text_to_speech_sms", SendingTextToSpeechSMSEvent::EVENT_NAME);

        $obj = new SendingTextToSpeechSMSEvent($this->sendingTextToSpeechSMS);

        $this->assertEquals(SendingTextToSpeechSMSEvent::EVENT_NAME, $obj->getEventName());

        $this->assertNull($obj->getRequest());
        $this->assertNull($obj->getResponse());

        $this->assertSame($this->sendingTextToSpeechSMS, $obj->getSendingTextToSpeechSMS());
    }
}
