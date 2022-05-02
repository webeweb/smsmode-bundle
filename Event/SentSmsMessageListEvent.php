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

use WBW\Library\SmsMode\Entity\SentSmsMessageListInterface;
use WBW\Library\SmsMode\Request\SentSmsMessageListRequest;
use WBW\Library\SmsMode\Response\SentSmsMessageListResponse;

/**
 * Sent SMS message list event.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\SmsModeBundle\Event
 */
class SentSmsMessageListEvent extends AbstractEvent {

    /**
     * Event name.
     *
     * @var string
     */
    const EVENT_NAME = "wbw.smsmode.event.sent_sms_message_list";

    /**
     * Constructor.
     *
     * @param SentSmsMessageListInterface $sentSmsMessageList The sent SMS message list.
     */
    public function __construct(SentSmsMessageListInterface $sentSmsMessageList) {
        parent::__construct(self::EVENT_NAME, $sentSmsMessageList);
    }

    /**
     * Get the sent SMS message list request.
     *
     * @return SentSmsMessageListRequest|null Returns the sent SMS message list request.
     */
    public function getRequest(): ?SentSmsMessageListRequest {
        return parent::getRequest();
    }

    /**
     * Get the sent SMS message list response.
     *
     * @return SentSmsMessageListResponse|null Returns the sent SMS message list response.
     */
    public function getResponse(): ?SentSmsMessageListResponse {
        return parent::getResponse();
    }

    /**
     * Get the sent SMS message list.
     *
     * @return SentSmsMessageListInterface|null Returns the sent SMS message list.
     */
    public function getSentSmsMessageList(): ?SentSmsMessageListInterface {
        return $this->getEntity();
    }
}
