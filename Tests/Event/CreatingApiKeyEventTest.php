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

use WBW\Bundle\SmsModeBundle\Event\CreatingApiKeyEvent;
use WBW\Bundle\SmsModeBundle\Tests\AbstractTestCase;
use WBW\Library\SmsMode\Request\CreatingApiKeyRequest;
use WBW\Library\SmsMode\Response\CreatingApiKeyResponse;

/**
 * Creating API key event test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\SmsModeBundle\Tests\Event
 */
class CreatingApiKeyEventTest extends AbstractTestCase {

    /**
     * Test setRequest()
     *
     * @return void
     */
    public function testSetRequest(): void {

        // Set an Creating API key request mock.
        $request = new CreatingApiKeyRequest();

        $obj = new CreatingApiKeyEvent();

        $obj->setRequest($request);
        $this->assertSame($request, $obj->getRequest());
    }

    /**
     * Test setResponse()
     *
     * @return void
     */
    public function testSetResponse(): void {

        // Set an Creating API key response mock.
        $response = new CreatingApiKeyResponse();

        $obj = new CreatingApiKeyEvent();

        $obj->setResponse($response);
        $this->assertSame($response, $obj->getResponse());
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("wbw.smsmode.event.creating_api_key", CreatingApiKeyEvent::EVENT_NAME);

        $obj = new CreatingApiKeyEvent();

        $this->assertEquals(CreatingApiKeyEvent::EVENT_NAME, $obj->getEventName());

        $this->assertNull($obj->getRequest());
        $this->assertNull($obj->getResponse());
    }
}
