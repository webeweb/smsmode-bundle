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

use WBW\Bundle\SmsModeBundle\Event\SendingTextToSpeechSmsEvent;
use WBW\Bundle\SmsModeBundle\Tests\AbstractTestCase;
use WBW\Library\SmsMode\Request\SendingTextToSpeechSmsRequest;
use WBW\Library\SmsMode\Response\SendingTextToSpeechSmsResponse;

/**
 * Sending text-to-speech SMS event test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\SmsModeBundle\Tests\Event
 */
class SendingTextToSpeechSmsEventTest extends AbstractTestCase {

    /**
     * Tests setRequest()
     *
     * @return void
     */
    public function testSetRequest(): void {

        // Set a Sending text-to-speech SMS request mock.
        $request = new SendingTextToSpeechSmsRequest();

        $obj = new SendingTextToSpeechSmsEvent($this->sendingTextToSpeechSms);

        $obj->setRequest($request);
        $this->assertSame($request, $obj->getRequest());
    }

    /**
     * Tests setResponse()
     *
     * @return void
     */
    public function testSetResponse(): void {

        // Set a Sending text-to-speech SMS response mock.
        $response = new SendingTextToSpeechSmsResponse();

        $obj = new SendingTextToSpeechSmsEvent($this->sendingTextToSpeechSms);

        $obj->setResponse($response);
        $this->assertSame($response, $obj->getResponse());
    }

    /**
     * Tests __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("wbw.smsmode.event.sending_text_to_speech_sms", SendingTextToSpeechSmsEvent::EVENT_NAME);

        $obj = new SendingTextToSpeechSmsEvent($this->sendingTextToSpeechSms);

        $this->assertEquals(SendingTextToSpeechSmsEvent::EVENT_NAME, $obj->getEventName());

        $this->assertNull($obj->getRequest());
        $this->assertNull($obj->getResponse());

        $this->assertSame($this->sendingTextToSpeechSms, $obj->getSendingTextToSpeechSms());
    }
}
