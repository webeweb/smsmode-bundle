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

use InvalidArgumentException;
use Symfony\Component\EventDispatcher\Event;
use WBW\Bundle\SMSModeBundle\Event\AbstractSMSModeEvent;
use WBW\Bundle\SMSModeBundle\Event\AccountBalanceEvent;
use WBW\Bundle\SMSModeBundle\Event\AddingContactEvent;
use WBW\Bundle\SMSModeBundle\Event\CheckingSMSMessageStatusEvent;
use WBW\Bundle\SMSModeBundle\Event\CreatingAPIKeyEvent;
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
use WBW\Bundle\SMSModeBundle\Factory\SMSModeFactory;
use WBW\Library\SMSMode\Exception\APIException;
use WBW\Library\SMSMode\Model\AbstractRequest;
use WBW\Library\SMSMode\Model\AbstractResponse;
use WBW\Library\SMSMode\Model\Authentication;
use WBW\Library\SMSMode\Provider\APIProvider;

/**
 * sMsmode event listener.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\SMSModeBundle\EventListener
 */
class SMSModeEventListener {

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
     * Constructor.
     */
    public function __construct() {
        $authentication = new Authentication();
        $this->setApiProvider(new APIProvider($authentication));
    }

    /**
     * Before return an event.
     *
     * @param AbstractSMSModeEvent $event The event.
     * @param AbstractRequest $request The request.
     * @param AbstractResponse $response The response.
     * @return Event Returns the event.
     */
    protected function beforeReturnEvent(AbstractSMSModeEvent $event, AbstractRequest $request, AbstractResponse $response) {

        $event->setRequest($request);
        $event->setResponse($response);

        return $event;
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
     * On account balance.
     *
     * @param AccountBalanceEvent $event The account balance event.
     * @return AccountBalanceEvent Returns the account balance event.
     * @throws APIException Throws an API exception if an error occurs.
     * @throws InvalidArgumentException Throws an invalid argument exception if a parameter is missing.
     */
    public function onAccountBalance(AccountBalanceEvent $event) {

        $request  = SMSModeFactory::newAccountBalanceRequest();
        $response = $this->getApiProvider()->accountBalance($request);

        return $this->beforeReturnEvent($event, $request, $response);
    }

    /**
     * On adding contact.
     *
     * @param AddingContactEvent $event The adding contact event.
     * @return AddingContactEvent Returns the adding contact event.
     * @throws APIException Throws an API exception if an error occurs.
     * @throws InvalidArgumentException Throws an invalid argument exception if a parameter is missing.
     */
    public function onAddingContact(AddingContactEvent $event) {

        $request  = SMSModeFactory::newAddingContactRequest($event->getAddingContact());
        $response = $this->getApiProvider()->addingContact($request);

        return $this->beforeReturnEvent($event, $request, $response);
    }

    /**
     * On checking SMS message status.
     *
     * @param CheckingSMSMessageStatusEvent $event The checking SMS message status event.
     * @return CheckingSMSMessageStatusEvent Returns the checking SMS message status event.
     * @throws APIException Throws an API exception if an error occurs.
     * @throws InvalidArgumentException Throws an invalid argument exception if a parameter is missing.
     */
    public function onCheckingSMSMessageStatus(CheckingSMSMessageStatusEvent $event) {

        $request  = SMSModeFactory::newCheckingSMSMessageStatusRequest($event->getCheckingSMSMessageStatus());
        $response = $this->getApiProvider()->checkingSMSMessageStatus($request);

        return $this->beforeReturnEvent($event, $request, $response);
    }

    /**
     * On creating API key.
     *
     * @param CreatingAPIKeyEvent $event The account balance event.
     * @return CreatingAPIKeyEvent Returns the account balance event.
     * @throws APIException Throws an API exception if an error occurs.
     * @throws InvalidArgumentException Throws an invalid argument exception if a parameter is missing.
     */
    public function onCreatingAPIKey(CreatingAPIKeyEvent $event) {

        $request  = SMSModeFactory::newCreatingAPIKeyRequest();
        $response = $this->getApiProvider()->creatingAPIKey($request);

        return $this->beforeReturnEvent($event, $request, $response);
    }

    /**
     * On creating sub-account.
     *
     * @param CreatingSubAccountEvent $event The creating sub-account event.
     * @return CreatingSubAccountEvent Returns the creating sub-account event.
     * @throws APIException Throws an API exception if an error occurs.
     * @throws InvalidArgumentException Throws an invalid argument exception if a parameter is missing.
     */
    public function onCreatingSubAccount(CreatingSubAccountEvent $event) {

        $request  = SMSModeFactory::newCreatingSubAccountRequest($event->getCreatingSubAccount());
        $response = $this->getApiProvider()->creatingSubAccount($request);

        return $this->beforeReturnEvent($event, $request, $response);
    }

    /**
     * On deleting SMS.
     *
     * @param DeletingSMSEvent $event The deleting SMS event.
     * @return DeletingSMSEvent Returns the deleting SMS event.
     * @throws APIException Throws an API exception if an error occurs.
     * @throws InvalidArgumentException Throws an invalid argument exception if a parameter is missing.
     */
    public function onDeletingSMS(DeletingSMSEvent $event) {

        $request  = SMSModeFactory::newDeletingSMSRequest($event->getDeletingSMS());
        $response = $this->getApiProvider()->deletingSMS($request);

        return $this->beforeReturnEvent($event, $request, $response);
    }

    /**
     * On deleting sub-account.
     *
     * @param DeletingSubAccountEvent $event The deleting sub-account event.
     * @return DeletingSubAccountEvent Returns the deleting sub-account event.
     * @throws APIException Throws an API exception if an error occurs.
     * @throws InvalidArgumentException Throws an invalid argument exception if a parameter is missing.
     */
    public function onDeletingSubAccount(DeletingSubAccountEvent $event) {

        $request  = SMSModeFactory::newDeletingSubAccountRequest($event->getDeletingSubAccount());
        $response = $this->getApiProvider()->deletingSubAccount($request);

        return $this->beforeReturnEvent($event, $request, $response);
    }

    /**
     * On delivery report.
     *
     * @param DeliveryReportEvent $event The delivery report event.
     * @return DeliveryReportEvent Returns the delivery report event.
     * @throws APIException Throws an API exception if an error occurs.
     * @throws InvalidArgumentException Throws an invalid argument exception if a parameter is missing.
     */
    public function onDeliveryReport(DeliveryReportEvent $event) {

        $request  = SMSModeFactory::newDeliveryReportRequest($event->getDeliveryReport());
        $response = $this->getApiProvider()->deliveryReport($request);

        return $this->beforeReturnEvent($event, $request, $response);
    }

    /**
     * On retrieving SMS reply.
     *
     * @param RetrievingSMSReplyEvent $event The retrieving SMS reply event.
     * @return RetrievingSMSReplyEvent Returns the retrieving SMS reply event.
     * @throws APIException Throws an API exception if an error occurs.
     * @throws InvalidArgumentException Throws an invalid argument exception if a parameter is missing.
     */
    public function onRetrievingSMSReply(RetrievingSMSReplyEvent $event) {

        $request  = SMSModeFactory::newRetrievingSMSReplyRequest($event->getRetrievingSMSReply());
        $response = $this->getApiProvider()->retrievingSMSReply($request);

        return $this->beforeReturnEvent($event, $request, $response);
    }

    /**
     * On sending SMS batch.
     *
     * @param SendingSMSBatchEvent $event The sending SMS batch event.
     * @return SendingSMSBatchEvent Returns the sending SMS batch event.
     * @throws APIException Throws an API exception if an error occurs.
     * @throws InvalidArgumentException Throws an invalid argument exception if a parameter is missing.
     */
    public function onSendingSMSBatch(SendingSMSBatchEvent $event) {

        $request  = SMSModeFactory::newSendingSMSBatchRequest($event->getSendingSMSBatch());
        $response = $this->getApiProvider()->sendingSMSBatch($request);

        return $this->beforeReturnEvent($event, $request, $response);
    }

    /**
     * On sending SMS message.
     *
     * @param SendingSMSMessageEvent $event The sending SMS message event.
     * @return SendingSMSMessageEvent Returns the sending SMS message event.
     * @throws APIException Throws an API exception if an error occurs.
     * @throws InvalidArgumentException Throws an invalid argument exception if a parameter is missing.
     */
    public function onSendingSMSMessage(SendingSMSMessageEvent $event) {

        $request  = SMSModeFactory::newSendingSMSMessageRequest($event->getSendingSMSMessage());
        $response = $this->getApiProvider()->sendingSMSMessage($request);

        return $this->beforeReturnEvent($event, $request, $response);
    }

    /**
     * On sending text-to-speech.
     *
     * @param SendingTextToSpeechSMSEvent $event The sending text-to-speech event.
     * @return SendingTextToSpeechSMSEvent Returns the sending text-to-speech event.
     * @throws APIException Throws an API exception if an error occurs.
     * @throws InvalidArgumentException Throws an invalid argument exception if a parameter is missing.
     */
    public function onSendingTextToSpeechSMS(SendingTextToSpeechSMSEvent $event) {

        $request  = SMSModeFactory::newSendingTextToSpeechSMSRequest($event->getSendingTextToSpeechSMS());
        $response = $this->getApiProvider()->sendingTextToSpeechSMS($request);

        return $this->beforeReturnEvent($event, $request, $response);
    }

    /**
     * On sending unicode SMS.
     *
     * @param SendingUnicodeSMSEvent $event The sending unicode SMS event.
     * @return SendingUnicodeSMSEvent Returns the sending unicode SMS event.
     * @throws APIException Throws an API exception if an error occurs.
     * @throws InvalidArgumentException Throws an invalid argument exception if a parameter is missing.
     */
    public function onSendingUnicodeSMS(SendingUnicodeSMSEvent $event) {

        $request  = SMSModeFactory::newSendingUnicodeSMSRequest($event->getSendingUnicodeSMS());
        $response = $this->getApiProvider()->sendingUnicodeSMS($request);

        return $this->beforeReturnEvent($event, $request, $response);
    }

    /**
     * On sent SMS message lis.
     *
     * @param SentSMSMessageListEvent $event The sent SMS message list event.
     * @return SentSMSMessageListEvent Returns the sent SMS message list event.
     * @throws APIException Throws an API exception if an error occurs.
     * @throws InvalidArgumentException Throws an invalid argument exception if a parameter is missing.
     */
    public function onSentSMSMessageList(SentSMSMessageListEvent $event) {

        $request  = SMSModeFactory::newSentSMSMessageListRequest($event->getSentSMSMessageList());
        $response = $this->getApiProvider()->sentSMSMessageList($request);

        return $this->beforeReturnEvent($event, $request, $response);
    }

    /**
     * On transferring credits.
     *
     * @param TransferringCreditsEvent $event The transferring credits event.
     * @return TransferringCreditsEvent Returns the transferring credits event.
     * @throws APIException Throws an API exception if an error occurs.
     * @throws InvalidArgumentException Throws an invalid argument exception if a parameter is missing.
     */
    public function onTransferringCredits(TransferringCreditsEvent $event) {

        $request  = SMSModeFactory::newTransferringCreditsRequest($event->getTransferringCredits());
        $response = $this->getApiProvider()->transferringCredits($request);

        return $this->beforeReturnEvent($event, $request, $response);
    }

    /**
     * Set the access token.
     *
     * @param string $accessToken The access token.
     * @return SMSModeEventListener Returns this event listener.
     */
    public function setAccessToken($accessToken) {
        $this->getApiProvider()->getAuthentication()->setAccessToken($accessToken);
        return $this;
    }

    /**
     * Set the API provider.
     *
     * @param APIProvider $apiProvider The API provider.
     * @return SMSModeEventListener Returns this event listener.
     */
    protected function setApiProvider(ApiProvider $apiProvider) {
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
        $this->getApiProvider()->getAuthentication()->setPass($pass);
        return $this;
    }

    /**
     * Set the pseudo.
     *
     * @param string $pseudo The pseudo.
     * @return SMSModeEventListener Returns this event listener.
     */
    public function setPseudo($pseudo) {
        $this->getApiProvider()->getAuthentication()->setPseudo($pseudo);
        return $this;
    }
}
