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

use WBW\Bundle\CoreBundle\Event\AbstractEvent as BaseEvent;
use WBW\Library\SmsMode\Entity\SmsModeEntityInterface;
use WBW\Library\SmsMode\Request\AbstractRequest;
use WBW\Library\SmsMode\Response\AbstractResponse;

/**
 * Abstract event.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\SmsModeBundle\Event
 * @abstract
 */
abstract class AbstractEvent extends BaseEvent {

    /**
     * Entity.
     *
     * @var SmsModeEntityInterface|null
     */
    private $entity;

    /**
     * Request.
     *
     * @var AbstractRequest|null
     */
    private $request;

    /**
     * Response.
     *
     * @var AbstractResponse|null
     */
    private $response;

    /**
     * Constructor.
     *
     * @param string|null $eventName The event name.
     * @param SmsModeEntityInterface|null $entity The entity.
     */
    protected function __construct(string $eventName, ?SmsModeEntityInterface $entity) {
        parent::__construct($eventName);

        $this->setEntity($entity);
    }

    /**
     * Get the entity.
     *
     * @return SmsModeEntityInterface|null Returns the entity.
     */
    protected function getEntity(): ?SmsModeEntityInterface {
        return $this->entity;
    }

    /**
     * Get the request.
     *
     * @return AbstractRequest|null Returns the request.
     */
    protected function getRequest() {
        return $this->request;
    }

    /**
     * Get the response.
     *
     * @return AbstractResponse|null Returns the response.
     */
    protected function getResponse() {
        return $this->response;
    }

    /**
     * Set the entity.
     *
     * @param SmsModeEntityInterface|null $entity The entity.
     * @return AbstractEvent Returns this sMsmode event.
     */
    protected function setEntity(?SmsModeEntityInterface $entity): AbstractEvent {
        $this->entity = $entity;
        return $this;
    }

    /**
     * Set the request.
     *
     * @param AbstractRequest|null $request The request.
     * @return AbstractEvent Returns this sMsmode event.
     */
    public function setRequest(?AbstractRequest $request): AbstractEvent {
        $this->request = $request;
        return $this;
    }

    /**
     * Set the response.
     *
     * @param AbstractResponse|null $response The response.
     * @return AbstractEvent Returns this sMsmode event.
     */
    public function setResponse(?AbstractResponse $response): AbstractEvent {
        $this->response = $response;
        return $this;
    }
}
