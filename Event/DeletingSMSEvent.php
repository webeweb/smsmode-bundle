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

use WBW\Library\SMSMode\Entity\DeletingSMSInterface;
use WBW\Library\SMSMode\Request\DeletingSMSRequest;
use WBW\Library\SMSMode\Response\DeletingSMSResponse;

/**
 * Deleting SMS event.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\SMSModeBundle\Event
 */
class DeletingSMSEvent extends AbstractEvent {

    /**
     * Event name.
     *
     * @var string
     */
    const EVENT_NAME = "wbw.smsmode.event.deleting_sms";

    /**
     * Constructor.
     *
     * @param DeletingSMSInterface $deletingSMS The deleting SMS.
     */
    public function __construct(DeletingSMSInterface $deletingSMS) {
        parent::__construct(self::EVENT_NAME, $deletingSMS);
    }

    /**
     * Get the deleting SMS.
     *
     * @return DeletingSMSInterface|null Returns the deleting SMS.
     */
    public function getDeletingSMS(): ?DeletingSMSInterface {
        return $this->getEntity();
    }

    /**
     * Get the deleting SMS request.
     *
     * @return DeletingSMSRequest|null Returns the deleting SMS request.
     */
    public function getRequest(): ?DeletingSMSRequest {
        return parent::getRequest();
    }

    /**
     * Get the deleting SMS response.
     *
     * @return DeletingSMSResponse|null Returns the deleting SMS response.
     */
    public function getResponse(): ?DeletingSMSResponse {
        return parent::getResponse();
    }
}
