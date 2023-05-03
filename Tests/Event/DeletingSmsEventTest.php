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

use WBW\Bundle\SmsModeBundle\Event\DeletingSmsEvent;
use WBW\Bundle\SmsModeBundle\Tests\AbstractTestCase;
use WBW\Library\SmsMode\Request\DeletingSmsRequest;
use WBW\Library\SmsMode\Response\DeletingSmsResponse;

/**
 * Deleting SMS event test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\SmsModeBundle\Tests\Event
 */
class DeletingSmsEventTest extends AbstractTestCase {

    /**
     * Test setRequest()
     *
     * @return void
     */
    public function testSetRequest(): void {

        // Set a Deleting SMS request mock.
        $request = new DeletingSmsRequest();

        $obj = new DeletingSmsEvent($this->deletingSms);

        $obj->setRequest($request);
        $this->assertSame($request, $obj->getRequest());
    }

    /**
     * Test setResponse()
     *
     * @return void
     */
    public function testSetResponse(): void {

        // Set a Deleting SMS response mock.
        $response = new DeletingSmsResponse();

        $obj = new DeletingSmsEvent($this->deletingSms);

        $obj->setResponse($response);
        $this->assertSame($response, $obj->getResponse());
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("wbw.smsmode.event.deleting_sms", DeletingSmsEvent::EVENT_NAME);

        $obj = new DeletingSmsEvent($this->deletingSms);

        $this->assertEquals(DeletingSmsEvent::EVENT_NAME, $obj->getEventName());

        $this->assertNull($obj->getRequest());
        $this->assertNull($obj->getResponse());

        $this->assertSame($this->deletingSms, $obj->getDeletingSms());
    }
}
