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

use WBW\Library\SmsMode\Entity\RetrievingSmsReplyInterface;
use WBW\Library\SmsMode\Request\RetrievingSmsReplyRequest;
use WBW\Library\SmsMode\Response\RetrievingSmsReplyResponse;

/**
 * Retrieving SMS reply event.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\SmsModeBundle\Event
 */
class RetrievingSmsReplyEvent extends AbstractEvent {

    /**
     * Event name.
     *
     * @var string
     */
    const EVENT_NAME = "wbw.smsmode.event.retrieving_sms_reply";

    /**
     * Constructor.
     *
     * @param RetrievingSmsReplyInterface $retrievingSmsReply The retrieving SMS reply.
     */
    public function __construct(RetrievingSmsReplyInterface $retrievingSmsReply) {
        parent::__construct(self::EVENT_NAME, $retrievingSmsReply);
    }

    /**
     * Get the retrieving SMS reply request.
     *
     * @return RetrievingSmsReplyRequest|null Returns the retrieving SMS reply request.
     */
    public function getRequest(): ?RetrievingSmsReplyRequest {
        return parent::getRequest();
    }

    /**
     * Get the retrieving SMS reply response.
     *
     * @return RetrievingSmsReplyResponse|null Returns the retrieving SMS reply response.
     */
    public function getResponse(): ?RetrievingSmsReplyResponse {
        return parent::getResponse();
    }

    /**
     * Get the retrieving SMS reply.
     *
     * @return RetrievingSmsReplyInterface|null Returns the retrieving SMS reply.
     */
    public function getRetrievingSmsReply(): ?RetrievingSmsReplyInterface {
        return $this->getEntity();
    }
}
