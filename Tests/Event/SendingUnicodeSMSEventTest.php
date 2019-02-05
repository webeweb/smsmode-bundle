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

use WBW\Bundle\SMSModeBundle\Event\SendingUnicodeSMSEvent;
use WBW\Bundle\SMSModeBundle\Event\SMSModeEvents;
use WBW\Bundle\SMSModeBundle\Tests\AbstractTestCase;
use WBW\Library\SMSMode\Model\SendingUnicodeSMSRequest;
use WBW\Library\SMSMode\Model\SendingUnicodeSMSResponse;

/**
 * Sending unicode SMS event test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\SMSModeBundle\Tests\Event
 */
class SendingUnicodeSMSEventTest extends AbstractTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new SendingUnicodeSMSEvent($this->sendingUnicodeSMS);

        $this->assertEquals(SMSModeEvents::SENDING_UNICODE_SMS, $obj->getEventName());

        $this->assertNull($obj->getRequest());
        $this->assertNull($obj->getResponse());

        $this->assertSame($this->sendingUnicodeSMS, $obj->getSendingUnicodeSMS());
    }

    /**
     * Tests the setRequest() method.
     *
     * @return void
     */
    public function testSetRequest() {

        // Set a Sending unicode SMS request mock.
        $request = new SendingUnicodeSMSRequest();

        $obj = new SendingUnicodeSMSEvent($this->sendingUnicodeSMS);

        $obj->setRequest($request);
        $this->assertSame($request, $obj->getRequest());
    }

    /**
     * Tests the setResponse() method.
     *
     * @return void
     */
    public function testSetResponse() {

        // Set a Sending unicode SMS response mock.
        $response = new SendingUnicodeSMSResponse();

        $obj = new SendingUnicodeSMSEvent($this->sendingUnicodeSMS);

        $obj->setResponse($response);
        $this->assertSame($response, $obj->getResponse());
    }
}
