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

use WBW\Library\SMSMode\Entity\SendingTextToSpeechSMSInterface;
use WBW\Library\SMSMode\Model\Request\SendingTextToSpeechSMSRequest;
use WBW\Library\SMSMode\Model\Response\SendingTextToSpeechSMSResponse;

/**
 * Sending text-to-speech event.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\SMSModeBundle\Event
 */
class SendingTextToSpeechSMSEvent extends AbstractEvent {

    /**
     * Event name.
     *
     * @var string
     */
    const EVENT_NAME = "wbw.smsmode.event.sending_text_to_speech_sms";

    /**
     * Constructor.
     *
     * @param SendingTextToSpeechSMSInterface $sendingTextToSpeechSMS The sending text-to-speech SMS.
     */
    public function __construct(SendingTextToSpeechSMSInterface $sendingTextToSpeechSMS) {
        parent::__construct(self::EVENT_NAME, $sendingTextToSpeechSMS);
    }

    /**
     * Get the sending text-to-speech SMS request.
     *
     * @return SendingTextToSpeechSMSRequest|null Returns the sending text-to-speech SMS request.
     */
    public function getRequest(): ?SendingTextToSpeechSMSRequest {
        return parent::getRequest();
    }

    /**
     * Get the sending text-to-speech SMS response.
     *
     * @return SendingTextToSpeechSMSResponse|null Returns the sending text-to-speech SMS response.
     */
    public function getResponse(): ?SendingTextToSpeechSMSResponse {
        return parent::getResponse();
    }

    /**
     * Get the sending text-to-speech SMS.
     *
     * @return SendingTextToSpeechSMSInterface|null Returns the sending text-to-speech SMS.
     */
    public function getSendingTextToSpeechSMS(): ?SendingTextToSpeechSMSInterface {
        return $this->getEntity();
    }
}
