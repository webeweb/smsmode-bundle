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

use WBW\Bundle\SMSModeBundle\Entity\SMSModeEntityInterface;
use WBW\Bundle\SMSModeBundle\Tests\AbstractTestCase;
use WBW\Bundle\SMSModeBundle\Tests\Fixtures\Event\TestSMSModeEvent;
use WBW\Library\SMSMode\Model\AbstractRequest;
use WBW\Library\SMSMode\Model\AbstractResponse;

/**
 * Abstract response event test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\SMSModeBundle\Tests\Event
 */
class AbstractSMSModeEventTest extends AbstractTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        // Set a sMsmode entity mock.
        $entity = $this->getMockBuilder(SMSModeEntityInterface::class)->getMock();

        $obj = new TestSMSModeEvent("eventName", $entity);

        $this->assertEquals("eventName", $obj->getEventName());
        $this->assertSame($entity, $obj->getEntity());
        $this->assertNull($obj->getRequest());
        $this->assertNull($obj->getResponse());
    }

    /**
     * Tests the setRequest() method.
     *
     * @return void
     */
    public function testSetRequest() {

        // Set a sMsmode entity mock.
        $entity = $this->getMockBuilder(SMSModeEntityInterface::class)->getMock();

        // Set a Request mock.
        $request = $this->getMockBuilder(AbstractRequest::class)->getMock();

        $obj = new TestSMSModeEvent("eventName", $entity);

        $obj->setRequest($request);
        $this->assertSame($request, $obj->getRequest());
    }

    /**
     * Tests the setResponse() method.
     *
     * @return void
     */
    public function testSetResponse() {

        // Set a sMsmode entity mock.
        $entity = $this->getMockBuilder(SMSModeEntityInterface::class)->getMock();

        // Set a Response mock.
        $response = $this->getMockBuilder(AbstractResponse::class)->getMock();

        $obj = new TestSMSModeEvent("eventName", $entity);

        $obj->setResponse($response);
        $this->assertSame($response, $obj->getResponse());
    }
}
