<?php

/*
 * This file is part of the smsmode-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\SMSModeBundle;

/**
 * sMsmode events.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\SMSModeBundle
 */
class WBWSMSModeEvents {

    /**
     * Account balance.
     *
     * @var string
     */
    const ACCOUNT_BALANCE = "wbw.smsmode.event.account_balance";

    /**
     * Adding contact.
     *
     * @var string
     */
    const ADDING_CONTACT = "wbw.smsmode.event.adding_contact";

    /**
     * Checking SMS message status.
     *
     * @var string
     */
    const CHECKING_SMS_MESSAGE_STATUS = "wbw.smsmode.event.checking_sms_message_status";

    /**
     * Creating API key.
     *
     * @var string
     */
    const CREATING_API_KEY = "wbw.smsmode.event.creating_api_key";

    /**
     * Creating sub-account.
     *
     * @var string
     */
    const CREATING_SUB_ACCOUNT = "wbw.smsmode.event.creating_sub_account";

    /**
     * Deleting SMS.
     *
     * @var string
     */
    const DELETING_SMS = "wbw.smsmode.event.deleting_sms";

    /**
     * Deleting sub-account.
     *
     * @var string
     */
    const DELETING_SUB_ACCOUNT = "wbw.smsmode.event.deleting_sub_account";

    /**
     * Delivery report.
     *
     * @var string
     */
    const DELIVERY_REPORT = "wbw.smsmode.event.delivery_report";

    /**
     * Delivery report callback.
     *
     * @var string
     */
    const DELIVERY_REPORT_CALLBACK = "wbw.smsmode.event.delivery_report_callback";

    /**
     * Retrieving SMS reply.
     *
     * @var string
     */
    const RETRIEVING_SMS_REPLY = "wbw.smsmode.event.retrieving_sms_reply";

    /**
     * Sending SMS batch.
     *
     * @var string
     */
    const SENDING_SMS_BATCH = "wbw.smsmode.event.sending_sms_batch";

    /**
     * Sending SMS message.
     *
     * @var string
     */
    const SENDING_SMS_MESSAGE = "wbw.smsmode.event.sending_sms_message";

    /**
     * Sending text-to-speech SMS.
     *
     * @var string
     */
    const SENDING_TEXT_TO_SPEECH_SMS = "wbw.smsmode.event.sending_text_to_speech_sms";

    /**
     * Sending unicode SMS.
     *
     * @var string
     */
    const SENDING_UNICODE_SMS = "wbw.smsmode.event.sending_unicode_sms";

    /**
     * Sent SMS message list.
     *
     * @var string
     */
    const SENT_SMS_MESSAGE_LIST = "wbw.smsmode.event.sent_sms_message_list";

    /**
     * SMS reply callback.
     *
     * @var string
     */
    const SMS_REPLY_CALLBACK = "wbw.smsmode.event.sms_reply_callback";

    /**
     * Transferring credits.
     *
     * @var string
     */
    const TRANSFERRING_CREDITS = "wbw.smsmode.event.transferring_credits";
}
