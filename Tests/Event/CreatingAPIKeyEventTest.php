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

use WBW\Bundle\SMSModeBundle\Event\CreatingAPIKeyEvent;
use WBW\Bundle\SMSModeBundle\Tests\AbstractTestCase;
use WBW\Bundle\SMSModeBundle\WBWSMSModeEvents;
use WBW\Library\SMSMode\Model\Request\CreatingAPIKeyRequest;
use WBW\Library\SMSMode\Model\Response\CreatingAPIKeyResponse;

/**
 * Creating API key event test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\SMSModeBundle\Tests\Event
 */
class CreatingAPIKeyEventTest extends AbstractTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function test__construct() {

        $obj = new CreatingAPIKeyEvent();

        $this->assertEquals(WBWSMSModeEvents::CREATING_API_KEY, $obj->getEventName());

        $this->assertNull($obj->getRequest());
        $this->assertNull($obj->getResponse());
    }

    /**
     * Tests the setRequest() method.
     *
     * @return void
     */
    public function testSetRequest() {

        // Set an Creating API key request mock.
        $request = new CreatingAPIKeyRequest();

        $obj = new CreatingAPIKeyEvent();

        $obj->setRequest($request);
        $this->assertSame($request, $obj->getRequest());
    }

    /**
     * Tests the setResponse() method.
     *
     * @return void
     */
    public function testSetResponse() {

        // Set an Creating API key response mock.
        $response = new CreatingAPIKeyResponse();

        $obj = new CreatingAPIKeyEvent();

        $obj->setResponse($response);
        $this->assertSame($response, $obj->getResponse());
    }
}
