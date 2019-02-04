<?php

/*
 * This file is part of the smsmode-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\SMSModeBundle\Tests\Fixtures\Event;

use WBW\Bundle\SMSModeBundle\Event\AbstractResponseEvent;
use WBW\Library\SMSMode\Model\AbstractResponse;

/**
 * Test response event.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\SMSModeBundle\Tests\Fixtures\Event
 */
class TestResponseEvent extends AbstractResponseEvent {

    /**
     * Constructor.
     *
     * @param string $eventName The event name.
     */
    public function __construct($eventName) {
        parent::__construct($eventName);
    }

    /**
     * {@inheritdoc}
     */
    public function getResponse() {
        return parent::getResponse();
    }

    /**
     * {@inheritdoc}
     */
    public function setResponse(AbstractResponse $response) {
        return parent::setResponse($response);
    }
}
