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

use WBW\Bundle\SMSModeBundle\Entity\DeletingSubAccountInterface;
use WBW\Library\SMSMode\Model\DeletingSubAccountRequest;
use WBW\Library\SMSMode\Model\DeletingSubAccountResponse;

/**
 * Deleting sub-account event
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\SMSModeBundle\Event
 */
class DeletingSubAccountEvent extends AbstractResponseEvent {

    /**
     * Deleting sub-account.
     *
     * @var DeletingSubAccountInterface
     */
    private $deletingSubAccount;

    /**
     * Constructor.
     *
     * @param DeletingSubAccountInterface $deletingSubAccount The deleting sub-account.
     */
    public function __construct(DeletingSubAccountInterface $deletingSubAccount) {
        parent::__construct(SMSModeEvents::DELETING_SUB_ACCOUNT);
        $this->setDeletingSubAccount($deletingSubAccount);
    }

    /**
     * Get the deleting sub-account.
     *
     * @return DeletingSubAccountInterface Returns the deleting sub-account.
     */
    public function getDeletingSubAccount() {
        return $this->deletingSubAccount;
    }

    /**
     * Get the deleting sub-account request.
     *
     * @return DeletingSubAccountRequest Returns the deleting sub-account request.
     */
    public function getRequest() {
        return parent::getRequest();
    }

    /**
     * Get the deleting sub-account response.
     *
     * @return DeletingSubAccountResponse Returns the deleting sub-account response.
     */
    public function getResponse() {
        return parent::getResponse();
    }

    /**
     * Set the deleting sub-account.
     *
     * @param DeletingSubAccountInterface $deletingSubAccount The deleting sub-account.
     * @return DeletingSubAccountEvent Returns this deleting sub-account event.
     */
    protected function setDeletingSubAccount(DeletingSubAccountInterface $deletingSubAccount) {
        $this->deletingSubAccount = $deletingSubAccount;
        return $this;
    }
}
