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

use WBW\Bundle\SmsModeBundle\Event\DeletingSubAccountEvent;
use WBW\Bundle\SmsModeBundle\Tests\AbstractTestCase;
use WBW\Library\SmsMode\Request\DeletingSubAccountRequest;
use WBW\Library\SmsMode\Response\DeletingSubAccountResponse;

/**
 * Deleting sub-account event test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\SmsModeBundle\Tests\Event
 */
class DeletingSubAccountEventTest extends AbstractTestCase {

    /**
     * Test setRequest()
     *
     * @return void
     */
    public function testSetRequest(): void {

        // Set a Deleting sub-account request mock.
        $request = new DeletingSubAccountRequest();

        $obj = new DeletingSubAccountEvent($this->deletingSubAccount);

        $obj->setRequest($request);
        $this->assertSame($request, $obj->getRequest());
    }

    /**
     * Test setResponse()
     *
     * @return void
     */
    public function testSetResponse(): void {

        // Set a Deleting sub-account response mock.
        $response = new DeletingSubAccountResponse();

        $obj = new DeletingSubAccountEvent($this->deletingSubAccount);

        $obj->setResponse($response);
        $this->assertSame($response, $obj->getResponse());
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("wbw.smsmode.event.deleting_sub_account", DeletingSubAccountEvent::EVENT_NAME);

        $obj = new DeletingSubAccountEvent($this->deletingSubAccount);

        $this->assertEquals(DeletingSubAccountEvent::EVENT_NAME, $obj->getEventName());

        $this->assertNull($obj->getRequest());
        $this->assertNull($obj->getResponse());

        $this->assertSame($this->deletingSubAccount, $obj->getDeletingSubAccount());
    }
}
