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

use WBW\Bundle\SMSModeBundle\Event\AbstractEvent;
use WBW\Library\SMSMode\Entity\SMSModeEntityInterface;
use WBW\Library\SMSMode\Model\AbstractRequest;
use WBW\Library\SMSMode\Model\AbstractResponse;

/**
 * Test sMsmode event.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\SMSModeBundle\Tests\Fixtures\Event
 */
class TestEvent extends AbstractEvent {

    /**
     * {@inheritdoc}
     */
    public function __construct(string $eventName, ?SMSModeEntityInterface $entity) {
        parent::__construct($eventName, $entity);
    }

    /**
     * {@inheritdoc}
     */
    public function getEntity(): ?SMSModeEntityInterface {
        return parent::getEntity();
    }

    /**
     * {@inheritdoc}
     */
    public function getRequest(): ?AbstractRequest {
        return parent::getRequest();
    }

    /**
     * {@inheritdoc}
     */
    public function getResponse(): ?AbstractResponse {
        return parent::getResponse();
    }

    /**
     * {@inheritdoc}
     */
    public function setEntity(?SMSModeEntityInterface $entity): AbstractEvent {
        return parent::setEntity($entity);
    }

    /**
     * {@inheritdoc}
     */
    public function setRequest(?AbstractRequest $request): AbstractEvent {
        return parent::setRequest($request);
    }

    /**
     * {@inheritdoc}
     */
    public function setResponse(?AbstractResponse $response): AbstractEvent {
        return parent::setResponse($response);
    }
}
