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
use WBW\Library\SMSMode\Entity\SendingSMSBatchInterface;
use WBW\Library\SMSMode\Model\Request\SendingSMSBatchRequest;
use WBW\Library\SMSMode\Model\Response\SendingSMSBatchResponse;

/**
 * Sending SMS batch event.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\SMSModeBundle\Event
 */
class SendingSMSBatchEvent extends AbstractEvent {

    /**
     * Constructor.
     *
     * @param SendingSMSBatchInterface $sendingSMSBatch The sending SMS batch.
     */
    public function __construct(SendingSMSBatchInterface $sendingSMSBatch) {
        parent::__construct(WBWSMSModeEvents::SENDING_SMS_BATCH, $sendingSMSBatch);
    }

    /**
     * Get the sending SMS batch request.
     *
     * @return SendingSMSBatchRequest|null Returns the sending SMS batch request.
     */
    public function getRequest(): ?SendingSMSBatchRequest {
        return parent::getRequest();
    }

    /**
     * Get the sending SMS batch response.
     *
     * @return SendingSMSBatchResponse|null Returns the sending SMS batch response.
     */
    public function getResponse(): ?SendingSMSBatchResponse {
        return parent::getResponse();
    }

    /**
     * Get the sending SMS batch.
     *
     * @return SendingSMSBatchInterface|null Returns the sending SMS batch.
     */
    public function getSendingSMSBatch(): ?SendingSMSBatchInterface {
        return $this->getEntity();
    }
}
