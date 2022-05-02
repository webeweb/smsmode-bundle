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

use WBW\Library\SmsMode\Entity\SendingSmsMessageInterface;
use WBW\Library\SmsMode\Request\SendingSmsMessageRequest;
use WBW\Library\SmsMode\Response\SendingSmsMessageResponse;

/**
 * Sending SMS message event.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\SmsModeBundle\Event
 */
class SendingSmsMessageEvent extends AbstractEvent {

    /**
     * Event name.
     *
     * @var string
     */
    const EVENT_NAME = "wbw.smsmode.event.sending_sms_message";

    /**
     * Constructor.
     *
     * @param SendingSmsMessageInterface $sendingSmsMessage The sending SMS message.
     */
    public function __construct(SendingSmsMessageInterface $sendingSmsMessage) {
        parent::__construct(self::EVENT_NAME, $sendingSmsMessage);
    }

    /**
     * Get the sending SMS message request.
     *
     * @return SendingSmsMessageRequest|null Returns the sending SMS message request.
     */
    public function getRequest(): ?SendingSmsMessageRequest {
        return parent::getRequest();
    }

    /**
     * Get the sending SMS message response.
     *
     * @return SendingSmsMessageResponse|null Returns the sending SMS message response.
     */
    public function getResponse(): ?SendingSmsMessageResponse {
        return parent::getResponse();
    }

    /**
     * Get the sending SMS message.
     *
     * @return SendingSmsMessageInterface|null Returns the sending SMS message.
     */
    public function getSendingSmsMessage(): ?SendingSmsMessageInterface {
        return $this->getEntity();
    }
}
