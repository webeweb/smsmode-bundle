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

use WBW\Bundle\SMSModeBundle\Tests\AbstractTestCase;
use WBW\Bundle\SMSModeBundle\Tests\Fixtures\Event\TestEvent;
use WBW\Library\SMSMode\Entity\SMSModeEntityInterface;
use WBW\Library\SMSMode\Request\AccountBalanceRequest;
use WBW\Library\SMSMode\Response\AccountBalanceResponse;

/**
 * Abstract event test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\SMSModeBundle\Tests\Event
 */
class AbstractEventTest extends AbstractTestCase {

    /**
     * Entity.
     *
     * @var SMSModeEntityInterface
     */
    private $entity;

    /**
     * {inheritdoc}
     */
    protected function setUp(): void {
        parent::setUp();

        // Set a sMsmode entity mock.
        $this->entity = $this->getMockBuilder(SMSModeEntityInterface::class)->getMock();
    }

    /**
     * Tests the setRequest() method.
     *
     * @return void
     */
    public function testSetRequest(): void {

        // Set a Request mock.
        $request = new AccountBalanceRequest();

        $obj = new TestEvent("eventName", $this->entity);

        $obj->setRequest($request);
        $this->assertSame($request, $obj->getRequest());
    }

    /**
     * Tests the setResponse() method.
     *
     * @return void
     */
    public function testSetResponse(): void {

        // Set a Response mock.
        $response = new AccountBalanceResponse();

        $obj = new TestEvent("eventName", $this->entity);

        $obj->setResponse($response);
        $this->assertSame($response, $obj->getResponse());
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new TestEvent("eventName", $this->entity);

        $this->assertEquals("eventName", $obj->getEventName());
        $this->assertSame($this->entity, $obj->getEntity());
        $this->assertNull($obj->getRequest());
        $this->assertNull($obj->getResponse());
    }
}
