<?php

/*
 * This file is part of the smsmode-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\SmsModeBundle\Event;

use WBW\Library\SmsMode\Request\CreatingApiKeyRequest;
use WBW\Library\SmsMode\Response\CreatingApiKeyResponse;

/**
 * Creating API key event.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\SmsModeBundle\Event
 */
class CreatingApiKeyEvent extends AbstractEvent {

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
     * @return CreatingApiKeyRequest|null Returns the creating API key request.
     */
    public function getRequest(): ?CreatingApiKeyRequest {
        return parent::getRequest();
    }

    /**
     * Get the creating API key response.
     *
     * @return CreatingApiKeyResponse|null Returns the creating API key response.
     */
    public function getResponse(): ?CreatingApiKeyResponse {
        return parent::getResponse();
    }
}
