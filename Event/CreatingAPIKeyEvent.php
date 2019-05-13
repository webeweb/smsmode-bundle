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

use WBW\Library\SMSMode\Model\Request\CreatingAPIKeyRequest;
use WBW\Library\SMSMode\Model\Response\CreatingAPIKeyResponse;

/**
 * Creating API key event.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\SMSModeBundle\Event
 */
class CreatingAPIKeyEvent extends AbstractEvent {

    /**
     * Constructor.
     */
    public function __construct() {
        parent::__construct(SMSModeEvents::CREATING_API_KEY, null);
    }

    /**
     * Get the creating API key request.
     *
     * @return CreatingAPIKeyRequest Returns the creating API key request.
     */
    public function getRequest() {
        return parent::getRequest();
    }

    /**
     * Get the creating API key response.
     *
     * @return CreatingAPIKeyResponse Returns the creating API key response.
     */
    public function getResponse() {
        return parent::getResponse();
    }
}
