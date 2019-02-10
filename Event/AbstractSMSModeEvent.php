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
use WBW\Bundle\SMSModeBundle\Entity\SMSModeEntityInterface;
use WBW\Library\SMSMode\Model\AbstractRequest;
use WBW\Library\SMSMode\Model\AbstractResponse;

/**
 * Abstract sMsmode event.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\SMSModeBundle\Event
 * @abstract
 */
abstract class AbstractSMSModeEvent extends AbstractEvent {

    /**
     * Entity.
     *
     * @var SMSModeEntityInterface
     */
    private $entity;

    /**
     * Request.
     *
     * @var AbstractRequest
     */
    private $request;

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
     * @param SMSModeEntityInterface|null $entity The entity.
     */
    protected function __construct($eventName, SMSModeEntityInterface $entity = null) {
        parent::__construct($eventName);
        $this->setEntity($entity);
    }

    /**
     * Get the entity.
     *
     * @return SMSModeEntityInterface Returns the entity.
     */
    protected function getEntity() {
        return $this->entity;
    }

    /**
     * Get the request.
     *
     * @return AbstractRequest Returns the request.
     */
    protected function getRequest() {
        return $this->request;
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
     * Set the entity.
     *
     * @param SMSModeEntityInterface|null $entity The entity.
     * @return AbstractSMSModeEvent Returns this sMsmode event.
     */
    protected function setEntity(SMSModeEntityInterface $entity = null) {
        $this->entity = $entity;
        return $this;
    }

    /**
     * Set the request.
     *
     * @param AbstractRequest $request The request.
     * @return AbstractSMSModeEvent Returns this sMsmode event.
     */
    public function setRequest(AbstractRequest $request) {
        $this->request = $request;
        return $this;
    }

    /**
     * Set the response.
     *
     * @param AbstractResponse $response The response.
     * @return AbstractSMSModeEvent Returns this sMsmode event.
     */
    public function setResponse(AbstractResponse $response) {
        $this->response = $response;
        return $this;
    }
}
