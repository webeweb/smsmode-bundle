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

use WBW\Bundle\SMSModeBundle\Event\TransferringCreditsEvent;
use WBW\Bundle\SMSModeBundle\Tests\AbstractTestCase;
use WBW\Bundle\SMSModeBundle\WBWSMSModeEvents;
use WBW\Library\SMSMode\Model\Request\TransferringCreditsRequest;
use WBW\Library\SMSMode\Model\Response\TransferringCreditsResponse;

/**
 * Transferring credits event test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\SMSModeBundle\Tests\Event
 */
class TransferringCreditsEventTest extends AbstractTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new TransferringCreditsEvent($this->transferringCredits);

        $this->assertEquals(WBWSMSModeEvents::TRANSFERRING_CREDITS, $obj->getEventName());

        $this->assertNull($obj->getRequest());
        $this->assertNull($obj->getResponse());

        $this->assertSame($this->transferringCredits, $obj->getTransferringCredits());
    }

    /**
     * Tests the setRequest() method.
     *
     * @return void
     */
    public function testSetRequest() {

        // Set a Transferring credits request mock.
        $request = new TransferringCreditsRequest();

        $obj = new TransferringCreditsEvent($this->transferringCredits);

        $obj->setRequest($request);
        $this->assertSame($request, $obj->getRequest());
    }

    /**
     * Tests the setResponse() method.
     *
     * @return void
     */
    public function testSetResponse() {

        // Set a Transferring credits response mock.
        $response = new TransferringCreditsResponse();

        $obj = new TransferringCreditsEvent($this->transferringCredits);

        $obj->setResponse($response);
        $this->assertSame($response, $obj->getResponse());
    }
}
