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

use WBW\Library\SmsMode\Entity\SendingUnicodeSmsInterface;
use WBW\Library\SmsMode\Request\SendingUnicodeSmsRequest;
use WBW\Library\SmsMode\Response\SendingUnicodeSmsResponse;

/**
 * Sending unicode SMS event.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\SmsModeBundle\Event
 */
class SendingUnicodeSmsEvent extends AbstractEvent {

    /**
     * Event name.
     *
     * @var string
     */
    const EVENT_NAME = "wbw.smsmode.event.sending_unicode_sms";

    /**
     * Constructor.
     *
     * @param SendingUnicodeSmsInterface $sendingUnicodeSms The sending unicode SMS.
     */
    public function __construct(SendingUnicodeSmsInterface $sendingUnicodeSms) {
        parent::__construct(self::EVENT_NAME, $sendingUnicodeSms);
    }

    /**
     * Get the sending unicode SMS request.
     *
     * @return SendingUnicodeSmsRequest|null Returns the sending unicode SMS request.
     */
    public function getRequest(): ?SendingUnicodeSmsRequest {
        return parent::getRequest();
    }

    /**
     * Get the sending unicode SMS response.
     *
     * @return SendingUnicodeSmsResponse|null Returns the sending unicode SMS response.
     */
    public function getResponse(): ?SendingUnicodeSmsResponse {
        return parent::getResponse();
    }

    /**
     * Get the sending unicode SMS.
     *
     * @return SendingUnicodeSmsInterface|null Returns the sending unicode SMS.
     */
    public function getSendingUnicodeSms(): ?SendingUnicodeSmsInterface {
        return $this->getEntity();
    }
}
