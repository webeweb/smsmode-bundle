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
use WBW\Library\SMSMode\Entity\TransferringCreditsInterface;
use WBW\Library\SMSMode\Model\Request\TransferringCreditsRequest;
use WBW\Library\SMSMode\Model\Response\TransferringCreditsResponse;

/**
 * Transferring credits event.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\SMSModeBundle\Event
 */
class TransferringCreditsEvent extends AbstractEvent {

    /**
     * Constructor.
     *
     * @param TransferringCreditsInterface $transferringCredits The transferring credits.
     */
    public function __construct(TransferringCreditsInterface $transferringCredits) {
        parent::__construct(WBWSMSModeEvents::TRANSFERRING_CREDITS, $transferringCredits);
    }

    /**
     * Get the transferring credits request.
     *
     * @return TransferringCreditsRequest|null Returns the transferring credits request.
     */
    public function getRequest(): ?TransferringCreditsRequest {
        return parent::getRequest();
    }

    /**
     * Get the transferring credits response.
     *
     * @return TransferringCreditsResponse|null Returns the transferring credits response.
     */
    public function getResponse(): ?TransferringCreditsResponse {
        return parent::getResponse();
    }

    /**
     * Get the transferring credits.
     *
     * @return TransferringCreditsInterface|null Returns the transferring credits.
     */
    public function getTransferringCredits(): ?TransferringCreditsInterface {
        return $this->getEntity();
    }
}
