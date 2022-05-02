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

use WBW\Library\SmsMode\Entity\CheckingSmsMessageStatusInterface;
use WBW\Library\SmsMode\Request\CheckingSmsMessageStatusRequest;
use WBW\Library\SmsMode\Response\CheckingSmsMessageStatusResponse;

/**
 * Checking SMS message status event.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\SmsModeBundle\Event
 */
class CheckingSmsMessageStatusEvent extends AbstractEvent {

    /**
     * Event name.
     *
     * @var string
     */
    const EVENT_NAME = "wbw.smsmode.event.checking_sms_message_status";

    /**
     * Constructor.
     *
     * @param CheckingSmsMessageStatusInterface $checkingSmsMessageStatus The checking Sms message status.
     */
    public function __construct(CheckingSmsMessageStatusInterface $checkingSmsMessageStatus) {
        parent::__construct(self::EVENT_NAME, $checkingSmsMessageStatus);
    }

    /**
     * Get the checking SMS message status.
     *
     * @return CheckingSmsMessageStatusInterface|null Returns the checking SMS message status.
     */
    public function getCheckingSmsMessageStatus(): ?CheckingSmsMessageStatusInterface {
        return $this->getEntity();
    }

    /**
     * Get the checking SMS message status request.
     *
     * @return CheckingSmsMessageStatusRequest|null Returns the checking SMS message status request.
     */
    public function getRequest(): ?CheckingSmsMessageStatusRequest {
        return parent::getRequest();
    }

    /**
     * Get the checking SMS message status response.
     *
     * @return CheckingSmsMessageStatusResponse|null Returns the checking SMS message status response.
     */
    public function getResponse(): ?CheckingSmsMessageStatusResponse {
        return parent::getResponse();
    }
}
