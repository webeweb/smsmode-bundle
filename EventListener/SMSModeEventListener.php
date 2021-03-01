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

use GuzzleHttp\Exception\GuzzleException;
use InvalidArgumentException;
use Psr\Log\LoggerInterface;
use RuntimeException;
use WBW\Bundle\CoreBundle\Service\LoggerTrait;
use WBW\Bundle\SMSModeBundle\Event\AbstractEvent;
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
use WBW\Library\Core\Exception\ApiException;
use WBW\Library\SMSMode\Factory\RequestFactory;
use WBW\Library\SMSMode\Model\AbstractRequest;
use WBW\Library\SMSMode\Model\AbstractResponse;
use WBW\Library\SMSMode\Model\Authentication;
use WBW\Library\SMSMode\Provider\ApiProvider;

/**
 * sMsmode event listener.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\SMSModeBundle\EventListener
 */
class SMSModeEventListener {

    use LoggerTrait;

    /**
     * Runtime exception message.
     *
     * @var string
     */
    const RUNTIME_EXCEPTION_MESSAGE = <<< EOT
sMsmode configuration is missing in your app/config/config.yml.
Please, add smsmode.accesss_token or smsmode.pseudo and smsmode.pass
EOT;

    /**
     * Service name.
     *
     * @var string
     */
    const SERVICE_NAME = "wbw.smsmode.event_listener";

    /**
     * API provider.
     *
     * @var ApiProvider
     */
    private $apiProvider;

    /**
     * Constructor.
     *
     * @param LoggerInterface $logger The logger.
     */
    public function __construct(LoggerInterface $logger) {
        $authentication = new Authentication();
        $this->setApiProvider(new ApiProvider($authentication, $logger));
    }

    /**
     * Before handle event.
     *
     * @return void
     * @throws RuntimeException Throws an runtime exception if the sMsmode configuration is missing.
     */
    protected function beforeHandleEvent(): void {

        $authentication    = $this->getApiProvider()->getAuthentication();
        $requestNormalizer = $this->getApiProvider()->getRequestSerializer();

        try {

            $requestNormalizer->serialize($authentication);
        } catch (InvalidArgumentException $ex) {

            throw new RuntimeException(self::RUNTIME_EXCEPTION_MESSAGE, 500, $ex);
        }
    }

    /**
     * Before return an event.
     *
     * @param AbstractEvent $event The event.
     * @param AbstractRequest $request The request.
     * @param AbstractResponse $response The response.
     * @return AbstractEvent Returns the event.
     */
    protected function beforeReturnEvent(AbstractEvent $event, AbstractRequest $request, AbstractResponse $response): AbstractEvent {

        $event->setRequest($request);
        $event->setResponse($response);

        return $event;
    }

    /**
     * Get the API provider.
     *
     * @return ApiProvider Returns the API provider.
     */
    public function getApiProvider(): ApiProvider {
        return $this->apiProvider;
    }

    /**
     * On account balance.
     *
     * @param AccountBalanceEvent $event The account balance event.
     * @return AccountBalanceEvent Returns the account balance event.
     * @throws InvalidArgumentException Throws an invalid argument exception if a parameter is missing.
     * @throws GuzzleException Throws a Guzzle exception if an error occurs.
     * @throws ApiException Throws an API exception if an error occurs.
     */
    public function onAccountBalance(AccountBalanceEvent $event): AccountBalanceEvent {

        $this->beforeHandleEvent();

        $request  = RequestFactory::newAccountBalanceRequest();
        $response = $this->getApiProvider()->accountBalance($request);

        return $this->beforeReturnEvent($event, $request, $response);
    }

    /**
     * On adding contact.
     *
     * @param AddingContactEvent $event The adding contact event.
     * @return AddingContactEvent Returns the adding contact event.
     * @throws InvalidArgumentException Throws an invalid argument exception if a parameter is missing.
     * @throws GuzzleException Throws a Guzzle exception if an error occurs.
     * @throws ApiException Throws an API exception if an error occurs.
     */
    public function onAddingContact(AddingContactEvent $event): AddingContactEvent {

        $this->beforeHandleEvent();

        $request  = RequestFactory::newAddingContactRequest($event->getAddingContact());
        $response = $this->getApiProvider()->addingContact($request);

        return $this->beforeReturnEvent($event, $request, $response);
    }

    /**
     * On checking SMS message status.
     *
     * @param CheckingSMSMessageStatusEvent $event The checking SMS message status event.
     * @return CheckingSMSMessageStatusEvent Returns the checking SMS message status event.
     * @throws InvalidArgumentException Throws an invalid argument exception if a parameter is missing.
     * @throws GuzzleException Throws a Guzzle exception if an error occurs.
     * @throws ApiException Throws an API exception if an error occurs.
     */
    public function onCheckingSMSMessageStatus(CheckingSMSMessageStatusEvent $event): CheckingSMSMessageStatusEvent {

        $this->beforeHandleEvent();

        $request  = RequestFactory::newCheckingSMSMessageStatusRequest($event->getCheckingSMSMessageStatus());
        $response = $this->getApiProvider()->checkingSMSMessageStatus($request);

        return $this->beforeReturnEvent($event, $request, $response);
    }

    /**
     * On creating API key.
     *
     * @param CreatingAPIKeyEvent $event The account balance event.
     * @return CreatingAPIKeyEvent Returns the account balance event.
     * @throws InvalidArgumentException Throws an invalid argument exception if a parameter is missing.
     * @throws GuzzleException Throws a Guzzle exception if an error occurs.
     * @throws ApiException Throws an API exception if an error occurs.
     */
    public function onCreatingAPIKey(CreatingAPIKeyEvent $event): CreatingAPIKeyEvent {

        $this->beforeHandleEvent();

        $request  = RequestFactory::newCreatingAPIKeyRequest();
        $response = $this->getApiProvider()->creatingAPIKey($request);

        return $this->beforeReturnEvent($event, $request, $response);
    }

    /**
     * On creating sub-account.
     *
     * @param CreatingSubAccountEvent $event The creating sub-account event.
     * @return CreatingSubAccountEvent Returns the creating sub-account event.
     * @throws InvalidArgumentException Throws an invalid argument exception if a parameter is missing.
     * @throws GuzzleException Throws a Guzzle exception if an error occurs.
     * @throws ApiException Throws an API exception if an error occurs.
     */
    public function onCreatingSubAccount(CreatingSubAccountEvent $event): CreatingSubAccountEvent {

        $this->beforeHandleEvent();

        $request  = RequestFactory::newCreatingSubAccountRequest($event->getCreatingSubAccount());
        $response = $this->getApiProvider()->creatingSubAccount($request);

        return $this->beforeReturnEvent($event, $request, $response);
    }

    /**
     * On deleting SMS.
     *
     * @param DeletingSMSEvent $event The deleting SMS event.
     * @return DeletingSMSEvent Returns the deleting SMS event.
     * @throws InvalidArgumentException Throws an invalid argument exception if a parameter is missing.
     * @throws GuzzleException Throws a Guzzle exception if an error occurs.
     * @throws ApiException Throws an API exception if an error occurs.
     */
    public function onDeletingSMS(DeletingSMSEvent $event): DeletingSMSEvent {

        $this->beforeHandleEvent();

        $request  = RequestFactory::newDeletingSMSRequest($event->getDeletingSMS());
        $response = $this->getApiProvider()->deletingSMS($request);

        return $this->beforeReturnEvent($event, $request, $response);
    }

    /**
     * On deleting sub-account.
     *
     * @param DeletingSubAccountEvent $event The deleting sub-account event.
     * @return DeletingSubAccountEvent Returns the deleting sub-account event.
     * @throws InvalidArgumentException Throws an invalid argument exception if a parameter is missing.
     * @throws GuzzleException Throws a Guzzle exception if an error occurs.
     * @throws ApiException Throws an API exception if an error occurs.
     */
    public function onDeletingSubAccount(DeletingSubAccountEvent $event): DeletingSubAccountEvent {

        $this->beforeHandleEvent();

        $request  = RequestFactory::newDeletingSubAccountRequest($event->getDeletingSubAccount());
        $response = $this->getApiProvider()->deletingSubAccount($request);

        return $this->beforeReturnEvent($event, $request, $response);
    }

    /**
     * On delivery report.
     *
     * @param DeliveryReportEvent $event The delivery report event.
     * @return DeliveryReportEvent Returns the delivery report event.
     * @throws InvalidArgumentException Throws an invalid argument exception if a parameter is missing.
     * @throws GuzzleException Throws a Guzzle exception if an error occurs.
     * @throws ApiException Throws an API exception if an error occurs.
     */
    public function onDeliveryReport(DeliveryReportEvent $event): DeliveryReportEvent {

        $this->beforeHandleEvent();

        $request  = RequestFactory::newDeliveryReportRequest($event->getDeliveryReport());
        $response = $this->getApiProvider()->deliveryReport($request);

        return $this->beforeReturnEvent($event, $request, $response);
    }

    /**
     * On retrieving SMS reply.
     *
     * @param RetrievingSMSReplyEvent $event The retrieving SMS reply event.
     * @return RetrievingSMSReplyEvent Returns the retrieving SMS reply event.
     * @throws InvalidArgumentException Throws an invalid argument exception if a parameter is missing.
     * @throws GuzzleException Throws a Guzzle exception if an error occurs.
     * @throws ApiException Throws an API exception if an error occurs.
     */
    public function onRetrievingSMSReply(RetrievingSMSReplyEvent $event): RetrievingSMSReplyEvent {

        $this->beforeHandleEvent();

        $request  = RequestFactory::newRetrievingSMSReplyRequest($event->getRetrievingSMSReply());
        $response = $this->getApiProvider()->retrievingSMSReply($request);

        return $this->beforeReturnEvent($event, $request, $response);
    }

    /**
     * On sending SMS batch.
     *
     * @param SendingSMSBatchEvent $event The sending SMS batch event.
     * @return SendingSMSBatchEvent Returns the sending SMS batch event.
     * @throws InvalidArgumentException Throws an invalid argument exception if a parameter is missing.
     * @throws GuzzleException Throws a Guzzle exception if an error occurs.
     * @throws ApiException Throws an API exception if an error occurs.
     */
    public function onSendingSMSBatch(SendingSMSBatchEvent $event): SendingSMSBatchEvent {

        $this->beforeHandleEvent();

        $request  = RequestFactory::newSendingSMSBatchRequest($event->getSendingSMSBatch());
        $response = $this->getApiProvider()->sendingSMSBatch($request);

        return $this->beforeReturnEvent($event, $request, $response);
    }

    /**
     * On sending SMS message.
     *
     * @param SendingSMSMessageEvent $event The sending SMS message event.
     * @return SendingSMSMessageEvent Returns the sending SMS message event.
     * @throws InvalidArgumentException Throws an invalid argument exception if a parameter is missing.
     * @throws GuzzleException Throws a Guzzle exception if an error occurs.
     * @throws ApiException Throws an API exception if an error occurs.
     */
    public function onSendingSMSMessage(SendingSMSMessageEvent $event): SendingSMSMessageEvent {

        $this->beforeHandleEvent();

        $request  = RequestFactory::newSendingSMSMessageRequest($event->getSendingSMSMessage());
        $response = $this->getApiProvider()->sendingSMSMessage($request);

        return $this->beforeReturnEvent($event, $request, $response);
    }

    /**
     * On sending text-to-speech.
     *
     * @param SendingTextToSpeechSMSEvent $event The sending text-to-speech event.
     * @return SendingTextToSpeechSMSEvent Returns the sending text-to-speech event.
     * @throws InvalidArgumentException Throws an invalid argument exception if a parameter is missing.
     * @throws GuzzleException Throws a Guzzle exception if an error occurs.
     * @throws ApiException Throws an API exception if an error occurs.
     */
    public function onSendingTextToSpeechSMS(SendingTextToSpeechSMSEvent $event): SendingTextToSpeechSMSEvent {

        $this->beforeHandleEvent();

        $request  = RequestFactory::newSendingTextToSpeechSMSRequest($event->getSendingTextToSpeechSMS());
        $response = $this->getApiProvider()->sendingTextToSpeechSMS($request);

        return $this->beforeReturnEvent($event, $request, $response);
    }

    /**
     * On sending unicode SMS.
     *
     * @param SendingUnicodeSMSEvent $event The sending unicode SMS event.
     * @return SendingUnicodeSMSEvent Returns the sending unicode SMS event.
     * @throws InvalidArgumentException Throws an invalid argument exception if a parameter is missing.
     * @throws GuzzleException Throws a Guzzle exception if an error occurs.
     * @throws ApiException Throws an API exception if an error occurs.
     */
    public function onSendingUnicodeSMS(SendingUnicodeSMSEvent $event): SendingUnicodeSMSEvent {

        $this->beforeHandleEvent();

        $request  = RequestFactory::newSendingUnicodeSMSRequest($event->getSendingUnicodeSMS());
        $response = $this->getApiProvider()->sendingUnicodeSMS($request);

        return $this->beforeReturnEvent($event, $request, $response);
    }

    /**
     * On sent SMS message lis.
     *
     * @param SentSMSMessageListEvent $event The sent SMS message list event.
     * @return SentSMSMessageListEvent Returns the sent SMS message list event.
     * @throws InvalidArgumentException Throws an invalid argument exception if a parameter is missing.
     * @throws GuzzleException Throws a Guzzle exception if an error occurs.
     * @throws ApiException Throws an API exception if an error occurs.
     */
    public function onSentSMSMessageList(SentSMSMessageListEvent $event): SentSMSMessageListEvent {

        $this->beforeHandleEvent();

        $request  = RequestFactory::newSentSMSMessageListRequest($event->getSentSMSMessageList());
        $response = $this->getApiProvider()->sentSMSMessageList($request);

        return $this->beforeReturnEvent($event, $request, $response);
    }

    /**
     * On transferring credits.
     *
     * @param TransferringCreditsEvent $event The transferring credits event.
     * @return TransferringCreditsEvent Returns the transferring credits event.
     * @throws InvalidArgumentException Throws an invalid argument exception if a parameter is missing.
     * @throws GuzzleException Throws a Guzzle exception if an error occurs.
     * @throws ApiException Throws an API exception if an error occurs.
     */
    public function onTransferringCredits(TransferringCreditsEvent $event): TransferringCreditsEvent {

        $this->beforeHandleEvent();

        $request  = RequestFactory::newTransferringCreditsRequest($event->getTransferringCredits());
        $response = $this->getApiProvider()->transferringCredits($request);

        return $this->beforeReturnEvent($event, $request, $response);
    }

    /**
     * Set the access token.
     *
     * @param string|null $accessToken The access token.
     * @return SMSModeEventListener Returns this event listener.
     */
    public function setAccessToken(?string $accessToken): SMSModeEventListener {
        $this->getApiProvider()->getAuthentication()->setAccessToken($accessToken);
        return $this;
    }

    /**
     * Set the API provider.
     *
     * @param ApiProvider $apiProvider The API provider.
     * @return SMSModeEventListener Returns this event listener.
     */
    protected function setApiProvider(ApiProvider $apiProvider): SMSModeEventListener {
        $this->apiProvider = $apiProvider;
        return $this;
    }

    /**
     * Set the pass.
     *
     * @param string|null $pass The pass.
     * @return SMSModeEventListener Returns this event listener.
     */
    public function setPass(?string $pass): SMSModeEventListener {
        $this->getApiProvider()->getAuthentication()->setPass($pass);
        return $this;
    }

    /**
     * Set the pseudo.
     *
     * @param string|null $pseudo The pseudo.
     * @return SMSModeEventListener Returns this event listener.
     */
    public function setPseudo(?string $pseudo): SMSModeEventListener {
        $this->getApiProvider()->getAuthentication()->setPseudo($pseudo);
        return $this;
    }
}
