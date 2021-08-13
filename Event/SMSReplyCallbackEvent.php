<?php

/*
 * This file is part of the smsmode-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\SMSModeBundle\Event;

use WBW\Bundle\CoreBundle\Event\AbstractEvent as BaseEvent;
use WBW\Library\SMSMode\Model\SMSReplyCallback;

/**
 * SMS reply callback event.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\SMSModeBundle\Event
 */
class SMSReplyCallbackEvent extends BaseEvent {

    /**
     * Event name.
     *
     * @var string
     */
    const EVENT_NAME = "wbw.smsmode.event.sms_reply_callback";

    /**
     * SMS reply callback.
     *
     * @var SMSReplyCallback
     */
    private $smsReplyCallback;

    /**
     * Constructor.
     *
     * @param SMSReplyCallback $smsReplyCallback The SMS reply callback.
     */
    public function __construct(SMSReplyCallback $smsReplyCallback) {
        parent::__construct(self::EVENT_NAME);
        $this->setSMSReplyCallback($smsReplyCallback);
    }

    /**
     * Get the SMS reply callback.
     *
     * @return SMSReplyCallback Returns the SMS reply callback.
     */
    public function getSMSReplyCallback(): SMSReplyCallback {
        return $this->smsReplyCallback;
    }

    /**
     * Set the SMS reply callback.
     *
     * @param SMSReplyCallback $smsReplyCallback The SMS reply callback.
     * @return SMSReplyCallbackEvent Returns this SMS reply callback event.
     */
    public function setSMSReplyCallback(SMSReplyCallback $smsReplyCallback): SMSReplyCallbackEvent {
        $this->smsReplyCallback = $smsReplyCallback;
        return $this;
    }
}
