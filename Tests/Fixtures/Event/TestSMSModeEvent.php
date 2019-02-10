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

use WBW\Bundle\SMSModeBundle\Entity\SMSModeEntityInterface;
use WBW\Bundle\SMSModeBundle\Event\AbstractSMSModeEvent;
use WBW\Library\SMSMode\Model\AbstractRequest;
use WBW\Library\SMSMode\Model\AbstractResponse;

/**
 * Test sMsmode event.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\SMSModeBundle\Tests\Fixtures\Event
 */
class TestSMSModeEvent extends AbstractSMSModeEvent {

    /**
     * {@inheritdoc}
     */
    public function __construct($eventName, SMSModeEntityInterface $entity = null) {
        parent::__construct($eventName, $entity);
    }

    /**
     * {@inheritdoc}
     */
    public function getEntity() {
        return parent::getEntity();
    }

    /**
     * {@inheritdoc}
     */
    public function getRequest() {
        return parent::getRequest();
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
    public function setEntity(SMSModeEntityInterface $entity = null) {
        return parent::setEntity($entity);
    }

    /**
     * {@inheritdoc}
     */
    public function setRequest(AbstractRequest $request) {
        return parent::setRequest($request);
    }

    /**
     * {@inheritdoc}
     */
    public function setResponse(AbstractResponse $response) {
        return parent::setResponse($response);
    }
}
