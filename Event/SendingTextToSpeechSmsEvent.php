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

use WBW\Library\SmsMode\Entity\SendingTextToSpeechSmsInterface;
use WBW\Library\SmsMode\Request\SendingTextToSpeechSmsRequest;
use WBW\Library\SmsMode\Response\SendingTextToSpeechSmsResponse;

/**
 * Sending text-to-speech event.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\SmsModeBundle\Event
 */
class SendingTextToSpeechSmsEvent extends AbstractEvent {

    /**
     * Event name.
     *
     * @var string
     */
    const EVENT_NAME = "wbw.smsmode.event.sending_text_to_speech_sms";

    /**
     * Constructor.
     *
     * @param SendingTextToSpeechSmsInterface $sendingTextToSpeechSms The sending text-to-speech SMS.
     */
    public function __construct(SendingTextToSpeechSmsInterface $sendingTextToSpeechSms) {
        parent::__construct(self::EVENT_NAME, $sendingTextToSpeechSms);
    }

    /**
     * Get the sending text-to-speech SMS request.
     *
     * @return SendingTextToSpeechSmsRequest|null Returns the sending text-to-speech SMS request.
     */
    public function getRequest(): ?SendingTextToSpeechSmsRequest {
        return parent::getRequest();
    }

    /**
     * Get the sending text-to-speech SMS response.
     *
     * @return SendingTextToSpeechSmsResponse|null Returns the sending text-to-speech SMS response.
     */
    public function getResponse(): ?SendingTextToSpeechSmsResponse {
        return parent::getResponse();
    }

    /**
     * Get the sending text-to-speech SMS.
     *
     * @return SendingTextToSpeechSmsInterface|null Returns the sending text-to-speech SMS.
     */
    public function getSendingTextToSpeechSms(): ?SendingTextToSpeechSmsInterface {
        return $this->getEntity();
    }
}
