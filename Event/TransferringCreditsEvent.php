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

use WBW\Bundle\SMSModeBundle\Entity\TransferringCreditsInterface;
use WBW\Library\SMSMode\Model\Request\TransferringCreditsRequest;
use WBW\Library\SMSMode\Model\Response\TransferringCreditsResponse;

/**
 * Transferring credits event.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\SMSModeBundle\Event
 */
class TransferringCreditsEvent extends AbstractSMSModeEvent {

    /**
     * Constructor.
     *
     * @param TransferringCreditsInterface $transferringCredits The transferring credits.
     */
    public function __construct(TransferringCreditsInterface $transferringCredits) {
        parent::__construct(SMSModeEvents::TRANSFERRING_CREDITS, $transferringCredits);
    }

    /**
     * Get the transferring credits request.
     *
     * @return TransferringCreditsRequest Returns the transferring credits request.
     */
    public function getRequest() {
        return parent::getRequest();
    }

    /**
     * Get the transferring credits response.
     *
     * @return TransferringCreditsResponse Returns the transferring credits response.
     */
    public function getResponse() {
        return parent::getResponse();
    }

    /**
     * Get the transferring credits.
     *
     * @return TransferringCreditsInterface Returns the transferring credits.
     */
    public function getTransferringCredits() {
        return $this->getEntity();
    }
}
