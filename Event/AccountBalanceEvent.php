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

use WBW\Library\SMSMode\Request\AccountBalanceRequest;
use WBW\Library\SMSMode\Response\AccountBalanceResponse;

/**
 * Account balance event.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\SMSModeBundle\Event
 */
class AccountBalanceEvent extends AbstractEvent {

    /**
     * Event name.
     *
     * @var string
     */
    const EVENT_NAME = "wbw.smsmode.event.account_balance";

    /**
     * Constructor.
     */
    public function __construct() {
        parent::__construct(self::EVENT_NAME, null);
    }

    /**
     * Get the account balance request.
     *
     * @return AccountBalanceRequest|null Returns the account balance request.
     */
    public function getRequest(): ?AccountBalanceRequest {
        return parent::getRequest();
    }

    /**
     * Get the account balance response.
     *
     * @return AccountBalanceResponse|null Returns the account balance response.
     */
    public function getResponse(): ?AccountBalanceResponse {
        return parent::getResponse();
    }
}
