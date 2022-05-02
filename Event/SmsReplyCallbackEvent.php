<?php

/*
 * This file is part of the smsmode-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\SmsModeBundle\Event;

use WBW\Bundle\CoreBundle\Event\AbstractEvent as BaseEvent;
use WBW\Library\SmsMode\Model\SmsReplyCallback;

/**
 * SMS reply callback event.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\SmsModeBundle\Event
 */
class SmsReplyCallbackEvent extends BaseEvent {

    /**
     * Event name.
     *
     * @var string
     */
    const EVENT_NAME = "wbw.smsmode.event.sms_reply_callback";

    /**
     * SMS reply callback.
     *
     * @var SmsReplyCallback
     */
    private $smsReplyCallback;

    /**
     * Constructor.
     *
     * @param SmsReplyCallback $smsReplyCallback The SMS reply callback.
     */
    public function __construct(SmsReplyCallback $smsReplyCallback) {
        parent::__construct(self::EVENT_NAME);

        $this->setSmsReplyCallback($smsReplyCallback);
    }

    /**
     * Get the SMS reply callback.
     *
     * @return SmsReplyCallback Returns the SMS reply callback.
     */
    public function getSmsReplyCallback(): SmsReplyCallback {
        return $this->smsReplyCallback;
    }

    /**
     * Set the SMS reply callback.
     *
     * @param SmsReplyCallback $smsReplyCallback The SMS reply callback.
     * @return SmsReplyCallbackEvent Returns this SMS reply callback event.
     */
    public function setSmsReplyCallback(SmsReplyCallback $smsReplyCallback): SmsReplyCallbackEvent {
        $this->smsReplyCallback = $smsReplyCallback;
        return $this;
    }
}
