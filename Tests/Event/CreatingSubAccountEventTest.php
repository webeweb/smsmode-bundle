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
use WBW\Bundle\SMSModeBundle\Event\SMSModeEvents;
use WBW\Bundle\SMSModeBundle\Tests\AbstractTestCase;
use WBW\Library\SMSMode\Model\Request\CreatingSubAccountRequest;
use WBW\Library\SMSMode\Model\Response\CreatingSubAccountResponse;

/**
 * Creating sub-account event test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\SMSModeBundle\Tests\Event
 */
class CreatingSubAccountEventTest extends AbstractTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new CreatingSubAccountEvent($this->creatingSubAccount);

        $this->assertEquals(SMSModeEvents::CREATING_SUB_ACCOUNT, $obj->getEventName());

        $this->assertNull($obj->getRequest());
        $this->assertNull($obj->getResponse());

        $this->assertSame($this->creatingSubAccount, $obj->getCreatingSubAccount());
    }

    /**
     * Tests the setRequest() method.
     *
     * @return void
     */
    public function testSetRequest() {

        // Set a Creating sub-account request mock.
        $request = new CreatingSubAccountRequest();

        $obj = new CreatingSubAccountEvent($this->creatingSubAccount);

        $obj->setRequest($request);
        $this->assertSame($request, $obj->getRequest());
    }

    /**
     * Tests the setResponse() method.
     *
     * @return void
     */
    public function testSetResponse() {

        // Set a Creating sub-account response mock.
        $response = new CreatingSubAccountResponse();

        $obj = new CreatingSubAccountEvent($this->creatingSubAccount);

        $obj->setResponse($response);
        $this->assertSame($response, $obj->getResponse());
    }
}
