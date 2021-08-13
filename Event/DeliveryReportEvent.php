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

use WBW\Library\SMSMode\Entity\DeliveryReportInterface;
use WBW\Library\SMSMode\Model\Request\DeliveryReportRequest;
use WBW\Library\SMSMode\Model\Response\DeliveryReportResponse;

/**
 * Delivery report event.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\SMSModeBundle\Event
 */
class DeliveryReportEvent extends AbstractEvent {

    /**
     * Event name.
     *
     * @var string
     */
    const EVENT_NAME = "wbw.smsmode.event.delivery_report";

    /**
     * Constructor.
     *
     * @param DeliveryReportInterface $deliveryReport The delivery report.
     */
    public function __construct(DeliveryReportInterface $deliveryReport) {
        parent::__construct(self::EVENT_NAME, $deliveryReport);
    }

    /**
     * Get the delivery report.
     *
     * @return DeliveryReportInterface|null Returns the delivery report.
     */
    public function getDeliveryReport(): ?DeliveryReportInterface {
        return $this->getEntity();
    }

    /**
     * Get the delivery report request.
     *
     * @return DeliveryReportRequest|null Returns the delivery report request.
     */
    public function getRequest(): ?DeliveryReportRequest {
        return parent::getRequest();
    }

    /**
     * Get the delivery report response.
     *
     * @return DeliveryReportResponse|null Returns the delivery report response.
     */
    public function getResponse(): ?DeliveryReportResponse {
        return parent::getResponse();
    }
}
