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

use WBW\Bundle\SMSModeBundle\Event\CreatingSubAccountEvent;
use WBW\Bundle\SMSModeBundle\Tests\AbstractTestCase;
use WBW\Library\SMSMode\Request\CreatingSubAccountRequest;
use WBW\Library\SMSMode\Response\CreatingSubAccountResponse;

/**
 * Creating sub-account event test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\SMSModeBundle\Tests\Event
 */
class CreatingSubAccountEventTest extends AbstractTestCase {

    /**
     * Tests setRequest()
     *
     * @return void
     */
    public function testSetRequest(): void {

        // Set a Creating sub-account request mock.
        $request = new CreatingSubAccountRequest();

        $obj = new CreatingSubAccountEvent($this->creatingSubAccount);

        $obj->setRequest($request);
        $this->assertSame($request, $obj->getRequest());
    }

    /**
     * Tests setResponse()
     *
     * @return void
     */
    public function testSetResponse(): void {

        // Set a Creating sub-account response mock.
        $response = new CreatingSubAccountResponse();

        $obj = new CreatingSubAccountEvent($this->creatingSubAccount);

        $obj->setResponse($response);
        $this->assertSame($response, $obj->getResponse());
    }

    /**
     * Tests __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("wbw.smsmode.event.creating_sub_account", CreatingSubAccountEvent::EVENT_NAME);

        $obj = new CreatingSubAccountEvent($this->creatingSubAccount);

        $this->assertEquals(CreatingSubAccountEvent::EVENT_NAME, $obj->getEventName());

        $this->assertNull($obj->getRequest());
        $this->assertNull($obj->getResponse());

        $this->assertSame($this->creatingSubAccount, $obj->getCreatingSubAccount());
    }
}
