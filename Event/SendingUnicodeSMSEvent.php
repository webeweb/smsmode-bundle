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

use WBW\Library\SMSMode\Entity\SendingUnicodeSMSInterface;
use WBW\Library\SMSMode\Request\SendingUnicodeSMSRequest;
use WBW\Library\SMSMode\Response\SendingUnicodeSMSResponse;

/**
 * Sending unicode SMS event.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\SMSModeBundle\Event
 */
class SendingUnicodeSMSEvent extends AbstractEvent {

    /**
     * Event name.
     *
     * @var string
     */
    const EVENT_NAME = "wbw.smsmode.event.sending_unicode_sms";

    /**
     * Constructor.
     *
     * @param SendingUnicodeSMSInterface $sendingUnicodeSMS The sending unicode SMS.
     */
    public function __construct(SendingUnicodeSMSInterface $sendingUnicodeSMS) {
        parent::__construct(self::EVENT_NAME, $sendingUnicodeSMS);
    }

    /**
     * Get the sending unicode SMS request.
     *
     * @return SendingUnicodeSMSRequest|null Returns the sending unicode SMS request.
     */
    public function getRequest(): ?SendingUnicodeSMSRequest {
        return parent::getRequest();
    }

    /**
     * Get the sending unicode SMS response.
     *
     * @return SendingUnicodeSMSResponse|null Returns the sending unicode SMS response.
     */
    public function getResponse(): ?SendingUnicodeSMSResponse {
        return parent::getResponse();
    }

    /**
     * Get the sending unicode SMS.
     *
     * @return SendingUnicodeSMSInterface|null Returns the sending unicode SMS.
     */
    public function getSendingUnicodeSMS(): ?SendingUnicodeSMSInterface {
        return $this->getEntity();
    }
}
