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

use WBW\Library\SMSMode\Request\CreatingAPIKeyRequest;
use WBW\Library\SMSMode\Response\CreatingAPIKeyResponse;

/**
 * Creating API key event.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\SMSModeBundle\Event
 */
class CreatingAPIKeyEvent extends AbstractEvent {

    /**
     * Event name.
     *
     * @var string
     */
    const EVENT_NAME = "wbw.smsmode.event.creating_api_key";

    /**
     * Constructor.
     */
    public function __construct() {
        parent::__construct(self::EVENT_NAME, null);
    }

    /**
     * Get the creating API key request.
     *
     * @return CreatingAPIKeyRequest|null Returns the creating API key request.
     */
    public function getRequest(): ?CreatingAPIKeyRequest {
        return parent::getRequest();
    }

    /**
     * Get the creating API key response.
     *
     * @return CreatingAPIKeyResponse|null Returns the creating API key response.
     */
    public function getResponse(): ?CreatingAPIKeyResponse {
        return parent::getResponse();
    }
}
