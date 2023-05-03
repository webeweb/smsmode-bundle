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

use WBW\Bundle\SmsModeBundle\Tests\AbstractTestCase;
use WBW\Bundle\SmsModeBundle\Tests\Fixtures\Event\TestEvent;
use WBW\Library\SmsMode\Entity\SmsModeEntityInterface;
use WBW\Library\SmsMode\Request\AccountBalanceRequest;
use WBW\Library\SmsMode\Response\AccountBalanceResponse;

/**
 * Abstract event test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\SmsModeBundle\Tests\Event
 */
class AbstractEventTest extends AbstractTestCase {

    /**
     * Entity.
     *
     * @var SmsModeEntityInterface
     */
    private $entity;

    /**
     * {inheritdoc}
     */
    protected function setUp(): void {
        parent::setUp();

        // Set a sMsmode entity mock.
        $this->entity = $this->getMockBuilder(SmsModeEntityInterface::class)->getMock();
    }

    /**
     * Test setRequest()
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
     * Test setResponse()
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
     * Test __construct()
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
