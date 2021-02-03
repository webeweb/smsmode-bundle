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
use WBW\Library\SMSMode\Entity\CheckingSMSMessageStatusInterface;
use WBW\Library\SMSMode\Model\Request\CheckingSMSMessageStatusRequest;
use WBW\Library\SMSMode\Model\Response\CheckingSMSMessageStatusResponse;

/**
 * Checking SMS message status event.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\SMSModeBundle\Event
 */
class CheckingSMSMessageStatusEvent extends AbstractEvent {

    /**
     * Constructor.
     *
     * @param CheckingSMSMessageStatusInterface $checkingSMSMessageStatus The checking SMS message status.
     */
    public function __construct(CheckingSMSMessageStatusInterface $checkingSMSMessageStatus) {
        parent::__construct(WBWSMSModeEvents::CHECKING_SMS_MESSAGE_STATUS, $checkingSMSMessageStatus);
    }

    /**
     * Get the checking SMS message status.
     *
     * @return CheckingSMSMessageStatusInterface|null Returns the checking SMS message status.
     */
    public function getCheckingSMSMessageStatus(): ?CheckingSMSMessageStatusInterface {
        return $this->getEntity();
    }

    /**
     * Get the checking SMS message status request.
     *
     * @return CheckingSMSMessageStatusRequest|null Returns the checking SMS message status request.
     */
    public function getRequest(): ?CheckingSMSMessageStatusRequest {
        return parent::getRequest();
    }

    /**
     * Get the checking SMS message status response.
     *
     * @return CheckingSMSMessageStatusResponse|null Returns the checking SMS message status response.
     */
    public function getResponse(): ?CheckingSMSMessageStatusResponse {
        return parent::getResponse();
    }
}
