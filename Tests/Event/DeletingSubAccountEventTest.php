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

use WBW\Bundle\SMSModeBundle\Event\DeletingSubAccountEvent;
use WBW\Bundle\SMSModeBundle\Tests\AbstractTestCase;
use WBW\Bundle\SMSModeBundle\WBWSMSModeEvents;
use WBW\Library\SMSMode\Model\Request\DeletingSubAccountRequest;
use WBW\Library\SMSMode\Model\Response\DeletingSubAccountResponse;

/**
 * Deleting sub-account event test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\SMSModeBundle\Tests\Event
 */
class DeletingSubAccountEventTest extends AbstractTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new DeletingSubAccountEvent($this->deletingSubAccount);

        $this->assertEquals(WBWSMSModeEvents::DELETING_SUB_ACCOUNT, $obj->getEventName());

        $this->assertNull($obj->getRequest());
        $this->assertNull($obj->getResponse());

        $this->assertSame($this->deletingSubAccount, $obj->getDeletingSubAccount());
    }

    /**
     * Tests the setRequest() method.
     *
     * @return void
     */
    public function testSetRequest() {

        // Set a Deleting sub-account request mock.
        $request = new DeletingSubAccountRequest();

        $obj = new DeletingSubAccountEvent($this->deletingSubAccount);

        $obj->setRequest($request);
        $this->assertSame($request, $obj->getRequest());
    }

    /**
     * Tests the setResponse() method.
     *
     * @return void
     */
    public function testSetResponse() {

        // Set a Deleting sub-account response mock.
        $response = new DeletingSubAccountResponse();

        $obj = new DeletingSubAccountEvent($this->deletingSubAccount);

        $obj->setResponse($response);
        $this->assertSame($response, $obj->getResponse());
    }
}
