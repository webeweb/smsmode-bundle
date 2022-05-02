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

use WBW\Bundle\SmsModeBundle\Event\SmsReplyCallbackEvent;
use WBW\Bundle\SmsModeBundle\Tests\AbstractTestCase;
use WBW\Library\SmsMode\Model\SmsReplyCallback;

/**
 * SMS reply callback event test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\SmsModeBundle\Tests\Event
 */
class SmsReplyCallbackEventTest extends AbstractTestCase {

    /**
     * Tests __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("wbw.smsmode.event.sms_reply_callback", SmsReplyCallbackEvent::EVENT_NAME);

        // Set a SMS reply callback mock.
        $smsReplyCallback = new SmsReplyCallback();

        $obj = new SmsReplyCallbackEvent($smsReplyCallback);

        $this->assertEquals(SmsReplyCallbackEvent::EVENT_NAME, $obj->getEventName());

        $this->assertSame($smsReplyCallback, $obj->getSmsReplyCallback());
    }
}
