<?php

/*
 * This file is part of the smsmode-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\SmsModeBundle\EventListener;

use GuzzleHttp\Exception\GuzzleException;
use InvalidArgumentException;
use Psr\Log\LoggerInterface;
use RuntimeException;
use WBW\Bundle\SmsModeBundle\Event\AbstractEvent;
use WBW\Bundle\SmsModeBundle\Event\AccountBalanceEvent;
use WBW\Bundle\SmsModeBundle\Event\AddingContactEvent;
use WBW\Bundle\SmsModeBundle\Event\CheckingSmsMessageStatusEvent;
use WBW\Bundle\SmsModeBundle\Event\CreatingApiKeyEvent;
use WBW\Bundle\SmsModeBundle\Event\CreatingSubAccountEvent;
use WBW\Bundle\SmsModeBundle\Event\DeletingSmsEvent;
use WBW\Bundle\SmsModeBundle\Event\DeletingSubAccountEvent;
use WBW\Bundle\SmsModeBundle\Event\DeliveryReportEvent;
use WBW\Bundle\SmsModeBundle\Event\RetrievingSmsReplyEvent;
use WBW\Bundle\SmsModeBundle\Event\SendingSmsBatchEvent;
use WBW\Bundle\SmsModeBundle\Event\SendingSmsMessageEvent;
use WBW\Bundle\SmsModeBundle\Event\SendingTextToSpeechSmsEvent;
use WBW\Bundle\SmsModeBundle\Event\SendingUnicodeSmsEvent;
use WBW\Bundle\SmsModeBundle\Event\SentSmsMessageListEvent;
use WBW\Bundle\SmsModeBundle\Event\TransferringCreditsEvent;
use WBW\Library\Logger\LoggerTrait;
use WBW\Library\Provider\Exception\ApiException;
use WBW\Library\SmsMode\Factory\RequestFactory;
use WBW\Library\SmsMode\Model\Authentication;
use WBW\Library\SmsMode\Provider\ApiProvider;
use WBW\Library\SmsMode\Request\AbstractRequest;
use WBW\Library\SmsMode\Response\AbstractResponse;

/**
 * Default event listener.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\SmsModeBundle\EventListener
 */
class DefaultEventListener {

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
    const SERVICE_NAME = "wbw.smsmode.event_listener.default";

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
     * @throws RuntimeException Throws a runtime exception if the sMsmode configuration is missing.
     */
    protected function beforeHandleEvent(): void {

        $authentication = $this->getApiProvider()->getAuthentication();
        $serializer     = $this->getApiProvider()->getRequestSerializer();

        try {

            $serializer->serialize($authentication);
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
     * @param CheckingSmsMessageStatusEvent $event The checking SMS message status event.
     * @return CheckingSmsMessageStatusEvent Returns the checking SMS message status event.
     * @throws InvalidArgumentException Throws an invalid argument exception if a parameter is missing.
     * @throws GuzzleException Throws a Guzzle exception if an error occurs.
     * @throws ApiException Throws an API exception if an error occurs.
     */
    public function onCheckingSmsMessageStatus(CheckingSmsMessageStatusEvent $event): CheckingSmsMessageStatusEvent {

        $this->beforeHandleEvent();

        $request  = RequestFactory::newCheckingSmsMessageStatusRequest($event->getCheckingSmsMessageStatus());
        $response = $this->getApiProvider()->checkingSmsMessageStatus($request);

        return $this->beforeReturnEvent($event, $request, $response);
    }

    /**
     * On creating API key.
     *
     * @param CreatingApiKeyEvent $event The account balance event.
     * @return CreatingApiKeyEvent Returns the account balance event.
     * @throws InvalidArgumentException Throws an invalid argument exception if a parameter is missing.
     * @throws GuzzleException Throws a Guzzle exception if an error occurs.
     * @throws ApiException Throws an API exception if an error occurs.
     */
    public function onCreatingApiKey(CreatingApiKeyEvent $event): CreatingApiKeyEvent {

        $this->beforeHandleEvent();

        $request  = RequestFactory::newCreatingApiKeyRequest();
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
     * @param DeletingSmsEvent $event The deleting SMS event.
     * @return DeletingSmsEvent Returns the deleting SMS event.
     * @throws InvalidArgumentException Throws an invalid argument exception if a parameter is missing.
     * @throws GuzzleException Throws a Guzzle exception if an error occurs.
     * @throws ApiException Throws an API exception if an error occurs.
     */
    public function onDeletingSms(DeletingSmsEvent $event): DeletingSmsEvent {

        $this->beforeHandleEvent();

        $request  = RequestFactory::newDeletingSmsRequest($event->getDeletingSms());
        $response = $this->getApiProvider()->deletingSms($request);

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
     * @param RetrievingSmsReplyEvent $event The retrieving SMS reply event.
     * @return RetrievingSmsReplyEvent Returns the retrieving SMS reply event.
     * @throws InvalidArgumentException Throws an invalid argument exception if a parameter is missing.
     * @throws GuzzleException Throws a Guzzle exception if an error occurs.
     * @throws ApiException Throws an API exception if an error occurs.
     */
    public function onRetrievingSmsReply(RetrievingSmsReplyEvent $event): RetrievingSmsReplyEvent {

        $this->beforeHandleEvent();

        $request  = RequestFactory::newRetrievingSmsReplyRequest($event->getRetrievingSmsReply());
        $response = $this->getApiProvider()->retrievingSmsReply($request);

        return $this->beforeReturnEvent($event, $request, $response);
    }

    /**
     * On sending SMS batch.
     *
     * @param SendingSmsBatchEvent $event The sending SMS batch event.
     * @return SendingSmsBatchEvent Returns the sending SMS batch event.
     * @throws InvalidArgumentException Throws an invalid argument exception if a parameter is missing.
     * @throws GuzzleException Throws a Guzzle exception if an error occurs.
     * @throws ApiException Throws an API exception if an error occurs.
     */
    public function onSendingSmsBatch(SendingSmsBatchEvent $event): SendingSmsBatchEvent {

        $this->beforeHandleEvent();

        $request  = RequestFactory::newSendingSmsBatchRequest($event->getSendingSmsBatch());
        $response = $this->getApiProvider()->sendingSmsBatch($request);

        return $this->beforeReturnEvent($event, $request, $response);
    }

    /**
     * On sending SMS message.
     *
     * @param SendingSmsMessageEvent $event The sending SMS message event.
     * @return SendingSmsMessageEvent Returns the sending SMS message event.
     * @throws InvalidArgumentException Throws an invalid argument exception if a parameter is missing.
     * @throws GuzzleException Throws a Guzzle exception if an error occurs.
     * @throws ApiException Throws an API exception if an error occurs.
     */
    public function onSendingSmsMessage(SendingSmsMessageEvent $event): SendingSmsMessageEvent {

        $this->beforeHandleEvent();

        $request  = RequestFactory::newSendingSmsMessageRequest($event->getSendingSmsMessage());
        $response = $this->getApiProvider()->sendingSmsMessage($request);

        return $this->beforeReturnEvent($event, $request, $response);
    }

    /**
     * On sending text-to-speech.
     *
     * @param SendingTextToSpeechSmsEvent $event The sending text-to-speech event.
     * @return SendingTextToSpeechSmsEvent Returns the sending text-to-speech event.
     * @throws InvalidArgumentException Throws an invalid argument exception if a parameter is missing.
     * @throws GuzzleException Throws a Guzzle exception if an error occurs.
     * @throws ApiException Throws an API exception if an error occurs.
     */
    public function onSendingTextToSpeechSms(SendingTextToSpeechSmsEvent $event): SendingTextToSpeechSmsEvent {

        $this->beforeHandleEvent();

        $request  = RequestFactory::newSendingTextToSpeechSmsRequest($event->getSendingTextToSpeechSms());
        $response = $this->getApiProvider()->sendingTextToSpeechSms($request);

        return $this->beforeReturnEvent($event, $request, $response);
    }

    /**
     * On sending unicode SMS.
     *
     * @param SendingUnicodeSmsEvent $event The sending unicode SMS event.
     * @return SendingUnicodeSmsEvent Returns the sending unicode SMS event.
     * @throws InvalidArgumentException Throws an invalid argument exception if a parameter is missing.
     * @throws GuzzleException Throws a Guzzle exception if an error occurs.
     * @throws ApiException Throws an API exception if an error occurs.
     */
    public function onSendingUnicodeSms(SendingUnicodeSmsEvent $event): SendingUnicodeSmsEvent {

        $this->beforeHandleEvent();

        $request  = RequestFactory::newSendingUnicodeSmsRequest($event->getSendingUnicodeSms());
        $response = $this->getApiProvider()->sendingUnicodeSms($request);

        return $this->beforeReturnEvent($event, $request, $response);
    }

    /**
     * On sent SMS message lis.
     *
     * @param SentSmsMessageListEvent $event The sent SMS message list event.
     * @return SentSmsMessageListEvent Returns the sent SMS message list event.
     * @throws InvalidArgumentException Throws an invalid argument exception if a parameter is missing.
     * @throws GuzzleException Throws a Guzzle exception if an error occurs.
     * @throws ApiException Throws an API exception if an error occurs.
     */
    public function onSentSmsMessageList(SentSmsMessageListEvent $event): SentSmsMessageListEvent {

        $this->beforeHandleEvent();

        $request  = RequestFactory::newSentSmsMessageListRequest($event->getSentSmsMessageList());
        $response = $this->getApiProvider()->sentSmsMessageList($request);

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
     * @return DefaultEventListener Returns this event listener.
     */
    public function setAccessToken(?string $accessToken): DefaultEventListener {
        $this->getApiProvider()->getAuthentication()->setAccessToken($accessToken);
        return $this;
    }

    /**
     * Set the API provider.
     *
     * @param ApiProvider $apiProvider The API provider.
     * @return DefaultEventListener Returns this event listener.
     */
    protected function setApiProvider(ApiProvider $apiProvider): DefaultEventListener {
        $this->apiProvider = $apiProvider;
        return $this;
    }

    /**
     * Set the pass.
     *
     * @param string|null $pass The pass.
     * @return DefaultEventListener Returns this event listener.
     */
    public function setPass(?string $pass): DefaultEventListener {
        $this->getApiProvider()->getAuthentication()->setPass($pass);
        return $this;
    }

    /**
     * Set the pseudo.
     *
     * @param string|null $pseudo The pseudo.
     * @return DefaultEventListener Returns this event listener.
     */
    public function setPseudo(?string $pseudo): DefaultEventListener {
        $this->getApiProvider()->getAuthentication()->setPseudo($pseudo);
        return $this;
    }
}
