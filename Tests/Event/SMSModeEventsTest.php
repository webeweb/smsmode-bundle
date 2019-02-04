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

use WBW\Bundle\SMSModeBundle\Event\SMSModeEvents;
use WBW\Bundle\SMSModeBundle\Tests\AbstractTestCase;

/**
 * sMsmode events test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\SMSModeBundle\Tests\Event
 */
class SMSModeEventsTest extends AbstractTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $this->assertEquals("webeweb.smsmode.event.account_balance", SMSModeEvents::ACCOUNT_BALANCE);
        $this->assertEquals("webeweb.smsmode.event.adding_contact", SMSModeEvents::ADDING_CONTACT);
        $this->assertEquals("webeweb.smsmode.event.checking_sms_message_status", SMSModeEvents::CHECKING_SMS_MESSAGE_STATUS);
        $this->assertEquals("webeweb.smsmode.event.creating_api_key", SMSModeEvents::CREATING_API_KEY);
        $this->assertEquals("webeweb.smsmode.event.creating_sub_account", SMSModeEvents::CREATING_SUB_ACCOUNT);
        $this->assertEquals("webeweb.smsmode.event.deleting_sms", SMSModeEvents::DELETING_SMS);
        $this->assertEquals("webeweb.smsmode.event.deleting_sub_account", SMSModeEvents::DELETING_SUB_ACCOUNT);
        $this->assertEquals("webeweb.smsmode.event.delivery_report_callback", SMSModeEvents::DELIVERY_REPORT_CALLBACK);
        $this->assertEquals("webeweb.smsmode.event.delivery_report", SMSModeEvents::DELIVERY_REPORT);
        $this->assertEquals("webeweb.smsmode.event.retrieving_sms_reply", SMSModeEvents::RETRIEVING_SMS_REPLY);
        $this->assertEquals("webeweb.smsmode.event.sending_sms_batch", SMSModeEvents::SENDING_SMS_BATCH);
        $this->assertEquals("webeweb.smsmode.event.sending_sms_message", SMSModeEvents::SENDING_SMS_MESSAGE);
        $this->assertEquals("webeweb.smsmode.event.sending_text_to_speech_sms", SMSModeEvents::SENDING_TEXT_TO_SPEECH_SMS);
        $this->assertEquals("webeweb.smsmode.event.sending_unicode_sms", SMSModeEvents::SENDING_UNICODE_SMS);
        $this->assertEquals("webeweb.smsmode.event.sent_sms_message_list", SMSModeEvents::SENT_SMS_MESSAGE_LIST);
        $this->assertEquals("webeweb.smsmode.event.sms_reply_callback", SMSModeEvents::SMS_REPLY_CALLBACK);
        $this->assertEquals("webeweb.smsmode.event.transferring_credits", SMSModeEvents::TRANSFERRING_CREDITS);
    }
}
