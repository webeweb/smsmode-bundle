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

use WBW\Bundle\SMSModeBundle\Entity\DeliveryReportInterface;
use WBW\Library\SMSMode\Model\DeliveryReportRequest;
use WBW\Library\SMSMode\Model\DeliveryReportResponse;

/**
 * Delivery report event
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\SMSModeBundle\Event
 */
class DeliveryReportEvent extends AbstractResponseEvent {

    /**
     * Delivery report.
     *
     * @var DeliveryReportInterface
     */
    private $deliveryReport;

    /**
     * Constructor.
     *
     * @param DeliveryReportInterface $deliveryReport The delivery report.
     */
    public function __construct(DeliveryReportInterface $deliveryReport) {
        parent::__construct(SMSModeEvents::DELIVERY_REPORT);
        $this->setDeliveryReport($deliveryReport);
    }

    /**
     * Get the delivery report.
     *
     * @return DeliveryReportInterface Returns the delivery report.
     */
    public function getDeliveryReport() {
        return $this->deliveryReport;
    }

    /**
     * Get the delivery report request.
     *
     * @return DeliveryReportRequest Returns the delivery report request.
     */
    public function getRequest() {
        return parent::getRequest();
    }

    /**
     * Get the delivery report response.
     *
     * @return DeliveryReportResponse Returns the delivery report response.
     */
    public function getResponse() {
        return parent::getResponse();
    }

    /**
     * Set the delivery report.
     *
     * @param DeliveryReportInterface $deliveryReport The delivery report.
     * @return DeliveryReportEvent Returns this delivery report event.
     */
    protected function setDeliveryReport(DeliveryReportInterface $deliveryReport) {
        $this->deliveryReport = $deliveryReport;
        return $this;
    }
}
