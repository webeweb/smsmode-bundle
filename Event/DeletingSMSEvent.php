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

use WBW\Bundle\SMSModeBundle\Entity\DeletingSMSInterface;
use WBW\Library\SMSMode\Model\DeletingSMSRequest;
use WBW\Library\SMSMode\Model\DeletingSMSResponse;

/**
 * Deleting SMS event
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\SMSModeBundle\Event
 */
class DeletingSMSEvent extends AbstractResponseEvent {

    /**
     * Deleting SMS.
     *
     * @var DeletingSMSInterface
     */
    private $deletingSMS;

    /**
     * Constructor.
     *
     * @param DeletingSMSInterface $deletingSMS The deleting SMS.
     */
    public function __construct(DeletingSMSInterface $deletingSMS) {
        parent::__construct(SMSModeEvents::DELETING_SMS);
        $this->setDeletingSMS($deletingSMS);
    }

    /**
     * Get the deleting SMS.
     *
     * @return DeletingSMSInterface Returns the deleting SMS.
     */
    public function getDeletingSMS() {
        return $this->deletingSMS;
    }

    /**
     * Get the deleting SMS request.
     *
     * @return DeletingSMSRequest Returns the deleting SMS request.
     */
    public function getRequest() {
        return parent::getRequest();
    }

    /**
     * Get the deleting SMS response.
     *
     * @return DeletingSMSResponse Returns the deleting SMS response.
     */
    public function getResponse() {
        return parent::getResponse();
    }

    /**
     * Set the deleting SMS.
     *
     * @param DeletingSMSInterface $deletingSMS The deleting SMS.
     * @return DeletingSMSEvent Returns this deleting SMS event.
     */
    protected function setDeletingSMS(DeletingSMSInterface $deletingSMS) {
        $this->deletingSMS = $deletingSMS;
        return $this;
    }
}