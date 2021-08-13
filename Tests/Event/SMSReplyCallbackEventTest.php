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

use WBW\Bundle\SMSModeBundle\Event\SMSReplyCallbackEvent;
use WBW\Bundle\SMSModeBundle\Tests\AbstractTestCase;
use WBW\Library\SMSMode\Model\SMSReplyCallback;

/**
 * SMS reply callback event test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\SMSModeBundle\Tests\Event
 */
class SMSReplyCallbackEventTest extends AbstractTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("wbw.smsmode.event.sms_reply_callback", SMSReplyCallbackEvent::EVENT_NAME);

        // Set a SMS reply callback mock.
        $smsReplyCallback = new SMSReplyCallback();

        $obj = new SMSReplyCallbackEvent($smsReplyCallback);

        $this->assertEquals(SMSReplyCallbackEvent::EVENT_NAME, $obj->getEventName());

        $this->assertSame($smsReplyCallback, $obj->getSMSReplyCallback());
    }
}
