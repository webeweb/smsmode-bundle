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

use WBW\Bundle\CoreBundle\Event\AbstractEvent;
use WBW\Library\SMSMode\Model\SMSReplyCallback;

/**
 * SMS reply callback event.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\SMSModeBundle\Event
 */
class SMSReplyCallbackEvent extends AbstractEvent {

    /**
     * SMS reply callback.
     *
     * @var SMSReplyCallback
     */
    private $smsReplyCallback;

    /**
     * Constructor.
     *
     * @param string $eventName The event name.
     * @param SMSReplyCallback $smsReplyCallback The SMS reply callback.
     */
    public function __construct($eventName, SMSReplyCallback $smsReplyCallback) {
        parent::__construct($eventName);
        $this->setSMSReplyCallback($smsReplyCallback);
    }

    /**
     * Get the SMS reply callback.
     *
     * @return SMSReplyCallback Returns the SMS reply callback.
     */
    public function getSMSReplyCallback() {
        return $this->smsReplyCallback;
    }

    /**
     * Set the SMS reply callback.
     *
     * @param SMSReplyCallback $smsReplyCallback The SMS reply callback.
     * @return SMSReplyCallbackEvent Returns this SMS reply callback event.
     */
    public function setSMSReplyCallback($smsReplyCallback) {
        $this->smsReplyCallback = $smsReplyCallback;
        return $this;
    }
}
