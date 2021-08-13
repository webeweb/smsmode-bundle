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

use WBW\Library\SMSMode\Entity\SentSMSMessageListInterface;
use WBW\Library\SMSMode\Model\Request\SentSMSMessageListRequest;
use WBW\Library\SMSMode\Model\Response\SentSMSMessageListResponse;

/**
 * Sent SMS message list event.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\SMSModeBundle\Event
 */
class SentSMSMessageListEvent extends AbstractEvent {

    /**
     * Event name.
     *
     * @var string
     */
    const EVENT_NAME = "wbw.smsmode.event.sent_sms_message_list";

    /**
     * Constructor.
     *
     * @param SentSMSMessageListInterface $sentSMSMessageList The sent SMS message list.
     */
    public function __construct(SentSMSMessageListInterface $sentSMSMessageList) {
        parent::__construct(self::EVENT_NAME, $sentSMSMessageList);
    }

    /**
     * Get the sent SMS message list request.
     *
     * @return SentSMSMessageListRequest|null Returns the sent SMS message list request.
     */
    public function getRequest(): ?SentSMSMessageListRequest {
        return parent::getRequest();
    }

    /**
     * Get the sent SMS message list response.
     *
     * @return SentSMSMessageListResponse|null Returns the sent SMS message list response.
     */
    public function getResponse(): ?SentSMSMessageListResponse {
        return parent::getResponse();
    }

    /**
     * Get the sent SMS message list.
     *
     * @return SentSMSMessageListInterface|null Returns the sent SMS message list.
     */
    public function getSentSMSMessageList(): ?SentSMSMessageListInterface {
        return $this->getEntity();
    }
}
