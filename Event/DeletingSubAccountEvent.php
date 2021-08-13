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

use WBW\Library\SMSMode\Entity\DeletingSubAccountInterface;
use WBW\Library\SMSMode\Request\DeletingSubAccountRequest;
use WBW\Library\SMSMode\Response\DeletingSubAccountResponse;

/**
 * Deleting sub-account event.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\SMSModeBundle\Event
 */
class DeletingSubAccountEvent extends AbstractEvent {

    /**
     * Event name.
     *
     * @var string
     */
    const EVENT_NAME = "wbw.smsmode.event.deleting_sub_account";

    /**
     * Constructor.
     *
     * @param DeletingSubAccountInterface $deletingSubAccount The deleting sub-account.
     */
    public function __construct(DeletingSubAccountInterface $deletingSubAccount) {
        parent::__construct(self::EVENT_NAME, $deletingSubAccount);
    }

    /**
     * Get the deleting sub-account.
     *
     * @return DeletingSubAccountInterface|null Returns the deleting sub-account.
     */
    public function getDeletingSubAccount(): ?DeletingSubAccountInterface {
        return $this->getEntity();
    }

    /**
     * Get the deleting sub-account request.
     *
     * @return DeletingSubAccountRequest|null Returns the deleting sub-account request.
     */
    public function getRequest(): ?DeletingSubAccountRequest {
        return parent::getRequest();
    }

    /**
     * Get the deleting sub-account response.
     *
     * @return DeletingSubAccountResponse|null Returns the deleting sub-account response.
     */
    public function getResponse(): ?DeletingSubAccountResponse {
        return parent::getResponse();
    }
}
