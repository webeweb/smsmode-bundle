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

use WBW\Bundle\SMSModeBundle\WBWSMSModeEvents;
use WBW\Library\SMSMode\Entity\SendingSMSMessageInterface;
use WBW\Library\SMSMode\Model\Request\SendingSMSMessageRequest;
use WBW\Library\SMSMode\Model\Response\SendingSMSMessageResponse;

/**
 * Sending SMS message event.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\SMSModeBundle\Event
 */
class SendingSMSMessageEvent extends AbstractEvent {

    /**
     * Constructor.
     *
     * @param SendingSMSMessageInterface $sendingSMSMessage The sending SMS message.
     */
    public function __construct(SendingSMSMessageInterface $sendingSMSMessage) {
        parent::__construct(WBWSMSModeEvents::SENDING_SMS_MESSAGE, $sendingSMSMessage);
    }

    /**
     * Get the sending SMS message request.
     *
     * @return SendingSMSMessageRequest|null Returns the sending SMS message request.
     */
    public function getRequest(): ?SendingSMSMessageRequest {
        return parent::getRequest();
    }

    /**
     * Get the sending SMS message response.
     *
     * @return SendingSMSMessageResponse|null Returns the sending SMS message response.
     */
    public function getResponse(): ?SendingSMSMessageResponse {
        return parent::getResponse();
    }

    /**
     * Get the sending SMS message.
     *
     * @return SendingSMSMessageInterface|null Returns the sending SMS message.
     */
    public function getSendingSMSMessage(): ?SendingSMSMessageInterface {
        return $this->getEntity();
    }
}
