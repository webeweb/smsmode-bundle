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

use WBW\Bundle\SMSModeBundle\Entity\CreatingSubAccountInterface;
use WBW\Library\SMSMode\Model\CreatingSubAccountRequest;
use WBW\Library\SMSMode\Model\CreatingSubAccountResponse;

/**
 * Creating sub-account event
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\SMSModeBundle\Event
 */
class CreatingSubAccountEvent extends AbstractSMSModeEvent {

    /**
     * Constructor.
     *
     * @param CreatingSubAccountInterface $creatingSubAccount The creating sub-account.
     */
    public function __construct(CreatingSubAccountInterface $creatingSubAccount) {
        parent::__construct(SMSModeEvents::CREATING_SUB_ACCOUNT, $creatingSubAccount);
    }

    /**
     * Get the creating sub-account.
     *
     * @return CreatingSubAccountInterface Returns the creating sub-account.
     */
    public function getCreatingSubAccount() {
        return $this->getEntity();
    }

    /**
     * Get the creating sub-account request.
     *
     * @return CreatingSubAccountRequest Returns the creating sub-account request.
     */
    public function getRequest() {
        return parent::getRequest();
    }

    /**
     * Get the creating sub-account response.
     *
     * @return CreatingSubAccountResponse Returns the creating sub-account response.
     */
    public function getResponse() {
        return parent::getResponse();
    }
}
