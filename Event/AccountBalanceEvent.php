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
use WBW\Library\SMSMode\Model\Request\AccountBalanceRequest;
use WBW\Library\SMSMode\Model\Response\AccountBalanceResponse;

/**
 * Account balance event.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\SMSModeBundle\Event
 */
class AccountBalanceEvent extends AbstractEvent {

    /**
     * Constructor.
     */
    public function __construct() {
        parent::__construct(WBWSMSModeEvents::ACCOUNT_BALANCE, null);
    }

    /**
     * Get the account balance request.
     *
     * @return AccountBalanceRequest Returns the account balance request.
     */
    public function getRequest() {
        return parent::getRequest();
    }

    /**
     * Get the account balance response.
     *
     * @return AccountBalanceResponse Returns the account balance response.
     */
    public function getResponse() {
        return parent::getResponse();
    }
}
