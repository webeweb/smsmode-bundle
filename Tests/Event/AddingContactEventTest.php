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

use WBW\Bundle\SmsModeBundle\Event\AddingContactEvent;
use WBW\Bundle\SmsModeBundle\Tests\AbstractTestCase;
use WBW\Library\SmsMode\Request\AddingContactRequest;
use WBW\Library\SmsMode\Response\AddingContactResponse;

/**
 * Adding contact event test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\SmsModeBundle\Tests\Event
 */
class AddingContactEventTest extends AbstractTestCase {

    /**
     * Test setRequest()
     *
     * @return void
     */
    public function testSetRequest(): void {

        // Set an Adding contact request mock.
        $request = new AddingContactRequest();

        $obj = new AddingContactEvent($this->addingContact);

        $obj->setRequest($request);
        $this->assertSame($request, $obj->getRequest());
    }

    /**
     * Test setResponse()
     *
     * @return void
     */
    public function testSetResponse(): void {

        // Set an Adding contact response mock.
        $response = new AddingContactResponse();

        $obj = new AddingContactEvent($this->addingContact);

        $obj->setResponse($response);
        $this->assertSame($response, $obj->getResponse());
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("wbw.smsmode.event.adding_contact", AddingContactEvent::EVENT_NAME);

        $obj = new AddingContactEvent($this->addingContact);

        $this->assertEquals(AddingContactEvent::EVENT_NAME, $obj->getEventName());

        $this->assertNull($obj->getRequest());
        $this->assertNull($obj->getResponse());

        $this->assertSame($this->addingContact, $obj->getAddingContact());
    }
}
