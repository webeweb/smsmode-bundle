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
use WBW\Library\SMSMode\Entity\CreatingSubAccountInterface;
use WBW\Library\SMSMode\Model\Request\CreatingSubAccountRequest;
use WBW\Library\SMSMode\Model\Response\CreatingSubAccountResponse;

/**
 * Creating sub-account event.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\SMSModeBundle\Event
 */
class CreatingSubAccountEvent extends AbstractEvent {

    /**
     * Constructor.
     *
     * @param CreatingSubAccountInterface $creatingSubAccount The creating sub-account.
     */
    public function __construct(CreatingSubAccountInterface $creatingSubAccount) {
        parent::__construct(WBWSMSModeEvents::CREATING_SUB_ACCOUNT, $creatingSubAccount);
    }

    /**
     * Get the creating sub-account.
     *
     * @return CreatingSubAccountInterface|null Returns the creating sub-account.
     */
    public function getCreatingSubAccount(): ?CreatingSubAccountInterface {
        return $this->getEntity();
    }

    /**
     * Get the creating sub-account request.
     *
     * @return CreatingSubAccountRequest|null Returns the creating sub-account request.
     */
    public function getRequest(): ?CreatingSubAccountRequest {
        return parent::getRequest();
    }

    /**
     * Get the creating sub-account response.
     *
     * @return CreatingSubAccountResponse Returns the creating sub-account response.
     */
    public function getResponse(): ?CreatingSubAccountResponse {
        return parent::getResponse();
    }
}
