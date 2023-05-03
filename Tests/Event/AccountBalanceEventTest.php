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

use WBW\Bundle\SmsModeBundle\Event\AccountBalanceEvent;
use WBW\Bundle\SmsModeBundle\Tests\AbstractTestCase;
use WBW\Library\SmsMode\Request\AccountBalanceRequest;
use WBW\Library\SmsMode\Response\AccountBalanceResponse;

/**
 * Account balance event test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\SmsModeBundle\Tests\Event
 */
class AccountBalanceEventTest extends AbstractTestCase {

    /**
     * Test setRequest()
     *
     * @return void
     */
    public function testSetRequest(): void {

        // Set an Account balance request mock.
        $request = new AccountBalanceRequest();

        $obj = new AccountBalanceEvent();

        $obj->setRequest($request);
        $this->assertSame($request, $obj->getRequest());
    }

    /**
     * Test setResponse()
     *
     * @return void
     */
    public function testSetResponse(): void {

        // Set an Account balance response mock.
        $response = new AccountBalanceResponse();

        $obj = new AccountBalanceEvent();

        $obj->setResponse($response);
        $this->assertSame($response, $obj->getResponse());
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("wbw.smsmode.event.account_balance", AccountBalanceEvent::EVENT_NAME);

        $obj = new AccountBalanceEvent();

        $this->assertEquals(AccountBalanceEvent::EVENT_NAME, $obj->getEventName());

        $this->assertNull($obj->getRequest());
        $this->assertNull($obj->getResponse());
    }
}
