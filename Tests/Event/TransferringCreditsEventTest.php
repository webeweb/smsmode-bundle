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

use WBW\Bundle\SmsModeBundle\Event\TransferringCreditsEvent;
use WBW\Bundle\SmsModeBundle\Tests\AbstractTestCase;
use WBW\Library\SmsMode\Request\TransferringCreditsRequest;
use WBW\Library\SmsMode\Response\TransferringCreditsResponse;

/**
 * Transferring credits event test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\SmsModeBundle\Tests\Event
 */
class TransferringCreditsEventTest extends AbstractTestCase {

    /**
     * Test setRequest()
     *
     * @return void
     */
    public function testSetRequest(): void {

        // Set a Transferring credits request mock.
        $request = new TransferringCreditsRequest();

        $obj = new TransferringCreditsEvent($this->transferringCredits);

        $obj->setRequest($request);
        $this->assertSame($request, $obj->getRequest());
    }

    /**
     * Test setResponse()
     *
     * @return void
     */
    public function testSetResponse(): void {

        // Set a Transferring credits response mock.
        $response = new TransferringCreditsResponse();

        $obj = new TransferringCreditsEvent($this->transferringCredits);

        $obj->setResponse($response);
        $this->assertSame($response, $obj->getResponse());
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("wbw.smsmode.event.transferring_credits", TransferringCreditsEvent::EVENT_NAME);

        $obj = new TransferringCreditsEvent($this->transferringCredits);

        $this->assertEquals(TransferringCreditsEvent::EVENT_NAME, $obj->getEventName());

        $this->assertNull($obj->getRequest());
        $this->assertNull($obj->getResponse());

        $this->assertSame($this->transferringCredits, $obj->getTransferringCredits());
    }
}
