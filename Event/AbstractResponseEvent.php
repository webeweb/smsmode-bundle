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

use WBW\Bundle\CoreBundle\Event\AbstractEvent;
use WBW\Library\SMSMode\Model\AbstractResponse;

/**
 * Abstract response event.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\SMSModeBundle\Event
 * @abstract
 */
abstract class AbstractResponseEvent extends AbstractEvent {

    /**
     * Response.
     *
     * @var AbstractResponse
     */
    private $response;

    /**
     * Constructor.
     *
     * @param string $eventName The event name.
     */
    protected function __construct($eventName) {
        parent::__construct($eventName);
    }

    /**
     * Get the response.
     *
     * @return AbstractResponse Returns the response.
     */
    protected function getResponse() {
        return $this->response;
    }

    /**
     * Set the response.
     *
     * @param AbstractResponse $response The response.
     * @return AbstractResponseEvent Returns this response event.
     */
    protected function setResponse(AbstractResponse $response) {
        $this->response = $response;
        return $this;
    }

}
