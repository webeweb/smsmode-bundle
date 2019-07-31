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
use WBW\Bundle\SMSModeBundle\WBWSMSModeEvents;
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
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new SendingTextToSpeechSMSEvent($this->sendingTextToSpeechSMS);

        $this->assertEquals(WBWSMSModeEvents::SENDING_TEXT_TO_SPEECH_SMS, $obj->getEventName());

        $this->assertNull($obj->getRequest());
        $this->assertNull($obj->getResponse());

        $this->assertSame($this->sendingTextToSpeechSMS, $obj->getSendingTextToSpeechSMS());
    }

    /**
     * Tests the setRequest() method.
     *
     * @return void
     */
    public function testSetRequest() {

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
    public function testSetResponse() {

        // Set a Sending text-to-speech SMS response mock.
        $response = new SendingTextToSpeechSMSResponse();

        $obj = new SendingTextToSpeechSMSEvent($this->sendingTextToSpeechSMS);

        $obj->setResponse($response);
        $this->assertSame($response, $obj->getResponse());
    }
}
