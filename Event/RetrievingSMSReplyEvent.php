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

use WBW\Library\SMSMode\Entity\RetrievingSMSReplyInterface;
use WBW\Library\SMSMode\Request\RetrievingSMSReplyRequest;
use WBW\Library\SMSMode\Response\RetrievingSMSReplyResponse;

/**
 * Retrieving SMS reply event.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\SMSModeBundle\Event
 */
class RetrievingSMSReplyEvent extends AbstractEvent {

    /**
     * Event name.
     *
     * @var string
     */
    const EVENT_NAME = "wbw.smsmode.event.retrieving_sms_reply";

    /**
     * Constructor.
     *
     * @param RetrievingSMSReplyInterface $retrievingSMSReply The retrieving SMS reply.
     */
    public function __construct(RetrievingSMSReplyInterface $retrievingSMSReply) {
        parent::__construct(self::EVENT_NAME, $retrievingSMSReply);
    }

    /**
     * Get the retrieving SMS reply request.
     *
     * @return RetrievingSMSReplyRequest|null Returns the retrieving SMS reply request.
     */
    public function getRequest(): ?RetrievingSMSReplyRequest {
        return parent::getRequest();
    }

    /**
     * Get the retrieving SMS reply response.
     *
     * @return RetrievingSMSReplyResponse|null Returns the retrieving SMS reply response.
     */
    public function getResponse(): ?RetrievingSMSReplyResponse {
        return parent::getResponse();
    }

    /**
     * Get the retrieving SMS reply.
     *
     * @return RetrievingSMSReplyInterface|null Returns the retrieving SMS reply.
     */
    public function getRetrievingSMSReply(): ?RetrievingSMSReplyInterface {
        return $this->getEntity();
    }
}
