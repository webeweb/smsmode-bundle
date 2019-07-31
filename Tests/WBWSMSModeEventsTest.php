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
use WBW\Bundle\SMSModeBundle\WBWSMSModeEvents;

/**
 * sMsmode events test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\SMSModeBundle\Tests\Event
 */
class WBWSMSModeEventsTest extends AbstractTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $this->assertEquals("wbw.smsmode.event.account_balance", WBWSMSModeEvents::ACCOUNT_BALANCE);
        $this->assertEquals("wbw.smsmode.event.adding_contact", WBWSMSModeEvents::ADDING_CONTACT);
        $this->assertEquals("wbw.smsmode.event.checking_sms_message_status", WBWSMSModeEvents::CHECKING_SMS_MESSAGE_STATUS);
        $this->assertEquals("wbw.smsmode.event.creating_api_key", WBWSMSModeEvents::CREATING_API_KEY);
        $this->assertEquals("wbw.smsmode.event.creating_sub_account", WBWSMSModeEvents::CREATING_SUB_ACCOUNT);
        $this->assertEquals("wbw.smsmode.event.deleting_sms", WBWSMSModeEvents::DELETING_SMS);
        $this->assertEquals("wbw.smsmode.event.deleting_sub_account", WBWSMSModeEvents::DELETING_SUB_ACCOUNT);
        $this->assertEquals("wbw.smsmode.event.delivery_report_callback", WBWSMSModeEvents::DELIVERY_REPORT_CALLBACK);
        $this->assertEquals("wbw.smsmode.event.delivery_report", WBWSMSModeEvents::DELIVERY_REPORT);
        $this->assertEquals("wbw.smsmode.event.retrieving_sms_reply", WBWSMSModeEvents::RETRIEVING_SMS_REPLY);
        $this->assertEquals("wbw.smsmode.event.sending_sms_batch", WBWSMSModeEvents::SENDING_SMS_BATCH);
        $this->assertEquals("wbw.smsmode.event.sending_sms_message", WBWSMSModeEvents::SENDING_SMS_MESSAGE);
        $this->assertEquals("wbw.smsmode.event.sending_text_to_speech_sms", WBWSMSModeEvents::SENDING_TEXT_TO_SPEECH_SMS);
        $this->assertEquals("wbw.smsmode.event.sending_unicode_sms", WBWSMSModeEvents::SENDING_UNICODE_SMS);
        $this->assertEquals("wbw.smsmode.event.sent_sms_message_list", WBWSMSModeEvents::SENT_SMS_MESSAGE_LIST);
        $this->assertEquals("wbw.smsmode.event.sms_reply_callback", WBWSMSModeEvents::SMS_REPLY_CALLBACK);
        $this->assertEquals("wbw.smsmode.event.transferring_credits", WBWSMSModeEvents::TRANSFERRING_CREDITS);
    }
}
