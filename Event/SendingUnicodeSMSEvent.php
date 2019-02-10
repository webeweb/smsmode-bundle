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

use WBW\Bundle\SMSModeBundle\Entity\SendingUnicodeSMSInterface;
use WBW\Library\SMSMode\Model\Request\SendingUnicodeSMSRequest;
use WBW\Library\SMSMode\Model\Response\SendingUnicodeSMSResponse;

/**
 * Sending unicode SMS event
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\SMSModeBundle\Event
 */
class SendingUnicodeSMSEvent extends AbstractSMSModeEvent {

    /**
     * Constructor.
     *
     * @param SendingUnicodeSMSInterface $sendingUnicodeSMS The sending unicode SMS.
     */
    public function __construct(SendingUnicodeSMSInterface $sendingUnicodeSMS) {
        parent::__construct(SMSModeEvents::SENDING_UNICODE_SMS, $sendingUnicodeSMS);
    }

    /**
     * Get the sending unicode SMS request.
     *
     * @return SendingUnicodeSMSRequest Returns the sending unicode SMS request.
     */
    public function getRequest() {
        return parent::getRequest();
    }

    /**
     * Get the sending unicode SMS response.
     *
     * @return SendingUnicodeSMSResponse Returns the sending unicode SMS response.
     */
    public function getResponse() {
        return parent::getResponse();
    }

    /**
     * Get the sending unicode SMS.
     *
     * @return SendingUnicodeSMSInterface Returns the sending unicode SMS.
     */
    public function getSendingUnicodeSMS() {
        return $this->getEntity();
    }
}
