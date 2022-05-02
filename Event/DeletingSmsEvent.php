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

use WBW\Library\SmsMode\Entity\DeletingSmsInterface;
use WBW\Library\SmsMode\Request\DeletingSmsRequest;
use WBW\Library\SmsMode\Response\DeletingSmsResponse;

/**
 * Deleting SMS event.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\SmsModeBundle\Event
 */
class DeletingSmsEvent extends AbstractEvent {

    /**
     * Event name.
     *
     * @var string
     */
    const EVENT_NAME = "wbw.smsmode.event.deleting_sms";

    /**
     * Constructor.
     *
     * @param DeletingSmsInterface $deletingSms The deleting SMS.
     */
    public function __construct(DeletingSmsInterface $deletingSms) {
        parent::__construct(self::EVENT_NAME, $deletingSms);
    }

    /**
     * Get the deleting SMS.
     *
     * @return DeletingSmsInterface|null Returns the deleting SMS.
     */
    public function getDeletingSms(): ?DeletingSmsInterface {
        return $this->getEntity();
    }

    /**
     * Get the deleting SMS request.
     *
     * @return DeletingSmsRequest|null Returns the deleting SMS request.
     */
    public function getRequest(): ?DeletingSmsRequest {
        return parent::getRequest();
    }

    /**
     * Get the deleting SMS response.
     *
     * @return DeletingSmsResponse|null Returns the deleting SMS response.
     */
    public function getResponse(): ?DeletingSmsResponse {
        return parent::getResponse();
    }
}
