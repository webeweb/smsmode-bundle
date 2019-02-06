<?php

/*
 * This file is part of the smsmode-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\SMSModeBundle\EventListener;

use Symfony\Component\EventDispatcher\Event;
use WBW\Bundle\SMSModeBundle\Event\AddingContactEvent;
use WBW\Bundle\SMSModeBundle\Event\CheckingSMSMessageStatusEvent;
use WBW\Bundle\SMSModeBundle\Event\CreatingSubAccountEvent;
use WBW\Bundle\SMSModeBundle\Event\DeletingSMSEvent;
use WBW\Bundle\SMSModeBundle\Event\DeletingSubAccountEvent;
use WBW\Bundle\SMSModeBundle\Event\DeliveryReportEvent;
use WBW\Bundle\SMSModeBundle\Event\RetrievingSMSReplyEvent;
use WBW\Bundle\SMSModeBundle\Event\SendingSMSBatchEvent;
use WBW\Bundle\SMSModeBundle\Event\SendingSMSMessageEvent;
use WBW\Bundle\SMSModeBundle\Event\SendingTextToSpeechSMSEvent;
use WBW\Bundle\SMSModeBundle\Event\SendingUnicodeSMSEvent;
use WBW\Bundle\SMSModeBundle\Event\SentSMSMessageListEvent;
use WBW\Bundle\SMSModeBundle\Event\TransferringCreditsEvent;
use WBW\Library\SMSMode\Provider\APIProvider;
use WBW\Library\SMSMode\Traits\AccessTokenTrait;

/**
 * sMsmode event listener.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\SMSModeBundle\EventListener
 */
class SMSModeEventListener {

    use AccessTokenTrait;

    /**
     * Service name.
     *
     * @var string
     */
    const SERVICE_NAME = "webeweb.smsmode.event_listener";

    /**
     * API provider.
     *
     * @var APIProvider
     */
    private $apiProvider;

    /**
     * Pseudo.
     *
     * @var string
     */
    private $pass;

    /**
     * Pass.
     *
     * @var string.
     */
    private $pseudo;

    /**
     * Constructor.
     */
    public function __construct() {
        // NOTHING TO DO.
    }

    /**
     * Get the API provider.
     *
     * @return APIProvider Returns the API provider.
     */
    public function getApiProvider() {
        return $this->apiProvider;
    }

    /**
     * Get the pass.
     *
     * @return string Returns the pass.
     */
    public function getPass() {
        return $this->pass;
    }

    /**
     * Get the pseudo.
     *
     * @return string Returns the pseudo.
     */
    public function getPseudo() {
        return $this->pseudo;
    }

    /**
     * On adding contact.
     *
     * @param AddingContactEvent $event The adding contact event.
     * @return Event Returns the event.
     */
    public function onAddingContact(AddingContactEvent $event) {

        return $event;
    }

    /**
     * On checking SMS message status.
     *
     * @param CheckingSMSMessageStatusEvent $event The checking SMS message status event.
     * @return Event Returns the event.
     */
    public function onCheckingSMSMessageStatus(CheckingSMSMessageStatusEvent $event) {

        return $event;
    }

    /**
     * On creating sub-account.
     *
     * @param CreatingSubAccountEvent $event The creating sub-account event.
     * @return Event Returns the event.
     */
    public function onCreatingSubAccount(CreatingSubAccountEvent $event) {

        return $event;
    }

    /**
     * On deleting SMS.
     *
     * @param DeletingSMSEvent $event The deleting SMS event.
     * @return Event Returns the event.
     */
    public function onDeletingSMS(DeletingSMSEvent $event) {

        return $event;
    }

    /**
     * On deleting sub-account.
     *
     * @param DeletingSubAccountEvent $event The deleting sub-account event.
     * @return Event Returns the event.
     */
    public function onDeletingSubAccount(DeletingSubAccountEvent $event) {

        return $event;
    }

    /**
     * On delivery report.
     *
     * @param DeliveryReportEvent $event The delivery report event.
     * @return Event Returns the event.
     */
    public function onDeliveryReport(DeliveryReportEvent $event) {

        return $event;
    }

    /**
     * On retrieving SMS reply.
     *
     * @param RetrievingSMSReplyEvent $event The retrieving SMS reply event.
     * @return Event Returns the event.
     */
    public function onRetrievingSMSReply(RetrievingSMSReplyEvent $event) {

        return $event;
    }

    /**
     * On sending SMS batch.
     *
     * @param SendingSMSBatchEvent $event The sending SMS batch event.
     * @return Event Returns the event.
     */
    public function onSendingSMSBatch(SendingSMSBatchEvent $event) {

        return $event;
    }

    /**
     * On sending SMS message.
     *
     * @param SendingSMSMessageEvent $event The sending SMS message event.
     * @return Event Returns the event.
     */
    public function onSendingSMSMessage(SendingSMSMessageEvent $event) {

        return $event;
    }

    /**
     * On sending text-to-speech.
     *
     * @param SendingTextToSpeechSMSEvent $event The sending text-to-speech event.
     * @return Event Returns the event.
     */
    public function onSendingTextToSpeechSMS(SendingTextToSpeechSMSEvent $event) {

        return $event;
    }

    /**
     * On sending unicode SMS.
     *
     * @param SendingUnicodeSMSEvent $event The sending unicode SMS event.
     * @return Event Returns the event.
     */
    public function onSendingUnicodeSMS(SendingUnicodeSMSEvent $event) {

        return $event;
    }

    /**
     * On sent SMS message lis.
     *
     * @param SentSMSMessageListEvent $event The sent SMS message list event.
     * @return Event Returns the event.
     */
    public function onSentSMSMessageList(SentSMSMessageListEvent $event) {

        return $event;
    }

    /**
     * On transferring credits.
     *
     * @param TransferringCreditsEvent $event The transferring credits event.
     * @return Event Returns the event.
     */
    public function onTransferringCredits(TransferringCreditsEvent $event) {

        return $event;
    }

    /**
     * Set the API provider.
     *
     * @param APIProvider $apiProvider The API provider.
     * @return SMSModeEventListener Returns this event listener.
     */
    protected function setApiProvider($apiProvider) {
        $this->apiProvider = $apiProvider;
        return $this;
    }

    /**
     * Set the pass.
     *
     * @param string $pass The pass.
     * @return SMSModeEventListener Returns this event listener.
     */
    public function setPass($pass) {
        $this->pass = $pass;
        return $this;
    }

    /**
     * Set the pseudo.
     *
     * @param string $pseudo The pseudo.
     * @return SMSModeEventListener Returns this event listener.
     */
    public function setPseudo($pseudo) {
        $this->pseudo = $pseudo;
        return $this;
    }
}
