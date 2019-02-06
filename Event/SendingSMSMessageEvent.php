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

use WBW\Bundle\SMSModeBundle\Entity\SendingSMSMessageInterface;
use WBW\Library\SMSMode\Model\SendingSMSMessageRequest;
use WBW\Library\SMSMode\Model\SendingSMSMessageResponse;

/**
 * Sending SMS message event
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\SMSModeBundle\Event
 */
class SendingSMSMessageEvent extends AbstractSMSModeEvent {

    /**
     * Constructor.
     *
     * @param SendingSMSMessageInterface $sendingSMSMessage The sending SMS message.
     */
    public function __construct(SendingSMSMessageInterface $sendingSMSMessage) {
        parent::__construct(SMSModeEvents::SENDING_SMS_MESSAGE, $sendingSMSMessage);
    }

    /**
     * Get the sending SMS message request.
     *
     * @return SendingSMSMessageRequest Returns the sending SMS message request.
     */
    public function getRequest() {
        return parent::getRequest();
    }

    /**
     * Get the sending SMS message response.
     *
     * @return SendingSMSMessageResponse Returns the sending SMS message response.
     */
    public function getResponse() {
        return parent::getResponse();
    }

    /**
     * Get the sending SMS message.
     *
     * @return SendingSMSMessageInterface Returns the sending SMS message.
     */
    public function getSendingSMSMessage() {
        return $this->getEntity();
    }
}
