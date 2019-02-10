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

use WBW\Bundle\SMSModeBundle\Entity\SentSMSMessageListInterface;
use WBW\Library\SMSMode\Model\Request\SentSMSMessageListRequest;
use WBW\Library\SMSMode\Model\SentSMSMessageListResponse;

/**
 * Sent SMS message list event
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\SMSModeBundle\Event
 */
class SentSMSMessageListEvent extends AbstractSMSModeEvent {

    /**
     * Constructor.
     *
     * @param SentSMSMessageListInterface $sentSMSMessageList The sent SMS message list.
     */
    public function __construct(SentSMSMessageListInterface $sentSMSMessageList) {
        parent::__construct(SMSModeEvents::SENT_SMS_MESSAGE_LIST, $sentSMSMessageList);
    }

    /**
     * Get the sent SMS message list request.
     *
     * @return SentSMSMessageListRequest Returns the sent SMS message list request.
     */
    public function getRequest() {
        return parent::getRequest();
    }

    /**
     * Get the sent SMS message list response.
     *
     * @return SentSMSMessageListResponse Returns the sent SMS message list response.
     */
    public function getResponse() {
        return parent::getResponse();
    }

    /**
     * Get the sent SMS message list.
     *
     * @return SentSMSMessageListInterface Returns the sent SMS message list.
     */
    public function getSentSMSMessageList() {
        return $this->getEntity();
    }
}
