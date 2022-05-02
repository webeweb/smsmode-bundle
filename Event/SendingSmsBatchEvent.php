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

use WBW\Library\SmsMode\Entity\SendingSmsBatchInterface;
use WBW\Library\SmsMode\Request\SendingSmsBatchRequest;
use WBW\Library\SmsMode\Response\SendingSmsBatchResponse;

/**
 * Sending SMS batch event.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\SmsModeBundle\Event
 */
class SendingSmsBatchEvent extends AbstractEvent {

    /**
     * Event name.
     *
     * @var string
     */
    const EVENT_NAME = "wbw.smsmode.event.sending_sms_batch";

    /**
     * Constructor.
     *
     * @param SendingSmsBatchInterface $sendingSmsBatch The sending SMS batch.
     */
    public function __construct(SendingSmsBatchInterface $sendingSmsBatch) {
        parent::__construct(self::EVENT_NAME, $sendingSmsBatch);
    }

    /**
     * Get the sending SMS batch request.
     *
     * @return SendingSmsBatchRequest|null Returns the sending SMS batch request.
     */
    public function getRequest(): ?SendingSmsBatchRequest {
        return parent::getRequest();
    }

    /**
     * Get the sending SMS batch response.
     *
     * @return SendingSmsBatchResponse|null Returns the sending SMS batch response.
     */
    public function getResponse(): ?SendingSmsBatchResponse {
        return parent::getResponse();
    }

    /**
     * Get the sending SMS batch.
     *
     * @return SendingSmsBatchInterface|null Returns the sending SMS batch.
     */
    public function getSendingSmsBatch(): ?SendingSmsBatchInterface {
        return $this->getEntity();
    }
}
