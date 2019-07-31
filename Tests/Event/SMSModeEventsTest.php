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
use WBW\Bundle\SMSModeBundle\WBWSMSModeEvents;

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

        $this->assertEquals(WBWSMSModeEvents::ACCOUNT_BALANCE, SMSModeEvents::ACCOUNT_BALANCE);
        $this->assertEquals(WBWSMSModeEvents::ADDING_CONTACT, SMSModeEvents::ADDING_CONTACT);
        $this->assertEquals(WBWSMSModeEvents::CHECKING_SMS_MESSAGE_STATUS, SMSModeEvents::CHECKING_SMS_MESSAGE_STATUS);
        $this->assertEquals(WBWSMSModeEvents::CREATING_API_KEY, SMSModeEvents::CREATING_API_KEY);
        $this->assertEquals(WBWSMSModeEvents::CREATING_SUB_ACCOUNT, SMSModeEvents::CREATING_SUB_ACCOUNT);
        $this->assertEquals(WBWSMSModeEvents::DELETING_SMS, SMSModeEvents::DELETING_SMS);
        $this->assertEquals(WBWSMSModeEvents::DELETING_SUB_ACCOUNT, SMSModeEvents::DELETING_SUB_ACCOUNT);
        $this->assertEquals(WBWSMSModeEvents::DELIVERY_REPORT_CALLBACK, SMSModeEvents::DELIVERY_REPORT_CALLBACK);
        $this->assertEquals(WBWSMSModeEvents::DELIVERY_REPORT, SMSModeEvents::DELIVERY_REPORT);
        $this->assertEquals(WBWSMSModeEvents::RETRIEVING_SMS_REPLY, SMSModeEvents::RETRIEVING_SMS_REPLY);
        $this->assertEquals(WBWSMSModeEvents::SENDING_SMS_BATCH, SMSModeEvents::SENDING_SMS_BATCH);
        $this->assertEquals(WBWSMSModeEvents::SENDING_SMS_MESSAGE, SMSModeEvents::SENDING_SMS_MESSAGE);
        $this->assertEquals(WBWSMSModeEvents::SENDING_TEXT_TO_SPEECH_SMS, SMSModeEvents::SENDING_TEXT_TO_SPEECH_SMS);
        $this->assertEquals(WBWSMSModeEvents::SENDING_UNICODE_SMS, SMSModeEvents::SENDING_UNICODE_SMS);
        $this->assertEquals(WBWSMSModeEvents::SENT_SMS_MESSAGE_LIST, SMSModeEvents::SENT_SMS_MESSAGE_LIST);
        $this->assertEquals(WBWSMSModeEvents::SMS_REPLY_CALLBACK, SMSModeEvents::SMS_REPLY_CALLBACK);
        $this->assertEquals(WBWSMSModeEvents::TRANSFERRING_CREDITS, SMSModeEvents::TRANSFERRING_CREDITS);
    }
}
