<?php

/*
 * This file is part of the smsmode-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\SmsModeBundle\Tests\Fixtures\Event;

use WBW\Bundle\SmsModeBundle\Event\AbstractEvent;
use WBW\Library\SmsMode\Entity\SmsModeEntityInterface;
use WBW\Library\SmsMode\Request\AbstractRequest;
use WBW\Library\SmsMode\Response\AbstractResponse;

/**
 * Test sMsmode event.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\SmsModeBundle\Tests\Fixtures\Event
 */
class TestEvent extends AbstractEvent {

    /**
     * {@inheritDoc}
     */
    public function __construct(string $eventName, ?SmsModeEntityInterface $entity) {
        parent::__construct($eventName, $entity);
    }

    /**
     * {@inheritDoc}
     */
    public function getEntity(): ?SmsModeEntityInterface {
        return parent::getEntity();
    }

    /**
     * {@inheritDoc}
     */
    public function getRequest(): ?AbstractRequest {
        return parent::getRequest();
    }

    /**
     * {@inheritDoc}
     */
    public function getResponse(): ?AbstractResponse {
        return parent::getResponse();
    }

    /**
     * {@inheritDoc}
     */
    public function setEntity(?SmsModeEntityInterface $entity): AbstractEvent {
        return parent::setEntity($entity);
    }

    /**
     * {@inheritDoc}
     */
    public function setRequest(?AbstractRequest $request): AbstractEvent {
        return parent::setRequest($request);
    }

    /**
     * {@inheritDoc}
     */
    public function setResponse(?AbstractResponse $response): AbstractEvent {
        return parent::setResponse($response);
    }
}
