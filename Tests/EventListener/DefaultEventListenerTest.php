<?php

/*
 * This file is part of the smsmode-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\SmsModeBundle\Tests\EventListener;

use RuntimeException;
use Throwable;
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
use WBW\Bundle\SmsModeBundle\EventListener\DefaultEventListener;
use WBW\Bundle\SmsModeBundle\Tests\AbstractTestCase;
use WBW\Library\SmsMode\Request\AccountBalanceRequest;
use WBW\Library\SmsMode\Request\AddingContactRequest;
use WBW\Library\SmsMode\Request\CheckingSmsMessageStatusRequest;
use WBW\Library\SmsMode\Request\CreatingApiKeyRequest;
use WBW\Library\SmsMode\Request\CreatingSubAccountRequest;
use WBW\Library\SmsMode\Request\DeletingSmsRequest;
use WBW\Library\SmsMode\Request\DeletingSubAccountRequest;
use WBW\Library\SmsMode\Request\DeliveryReportRequest;
use WBW\Library\SmsMode\Request\RetrievingSmsReplyRequest;
use WBW\Library\SmsMode\Request\SendingSmsBatchRequest;
use WBW\Library\SmsMode\Request\SendingSmsMessageRequest;
use WBW\Library\SmsMode\Request\SendingTextToSpeechSmsRequest;
use WBW\Library\SmsMode\Request\SendingUnicodeSmsRequest;
use WBW\Library\SmsMode\Request\SentSmsMessageListRequest;
use WBW\Library\SmsMode\Request\TransferringCreditsRequest;
use WBW\Library\SmsMode\Response\AccountBalanceResponse;
use WBW\Library\SmsMode\Response\AddingContactResponse;
use WBW\Library\SmsMode\Response\CheckingSmsMessageStatusResponse;
use WBW\Library\SmsMode\Response\CreatingApiKeyResponse;
use WBW\Library\SmsMode\Response\CreatingSubAccountResponse;
use WBW\Library\SmsMode\Response\DeletingSmsResponse;
use WBW\Library\SmsMode\Response\DeletingSubAccountResponse;
use WBW\Library\SmsMode\Response\DeliveryReportResponse;
use WBW\Library\SmsMode\Response\RetrievingSmsReplyResponse;
use WBW\Library\SmsMode\Response\SendingSmsBatchResponse;
use WBW\Library\SmsMode\Response\SendingSmsMessageResponse;
use WBW\Library\SmsMode\Response\SendingTextToSpeechSmsResponse;
use WBW\Library\SmsMode\Response\SendingUnicodeSmsResponse;
use WBW\Library\SmsMode\Response\SentSmsMessageListResponse;
use WBW\Library\SmsMode\Response\TransferringCreditsResponse;

/**
 * Default event listener test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\SmsModeBundle\Tests\EventListener
 */
class DefaultEventListenerTest extends AbstractTestCase {

    /**
     * sMsmode event listener.
     *
     * @var DefaultEventListener
     */
    private $smsModeEventListener;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void {
        parent::setUp();

        // Set a sMsmode event listener.
        $this->smsModeEventListener = new DefaultEventListener($this->logger);
        $this->smsModeEventListener->setPseudo("pseudo");
        $this->smsModeEventListener->setPass("pass");
    }

    /**
     * Tests onAccountBalance()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testOnAccountBalance(): void {

        // Set an Account balance event mock.
        $accountBalanceEvent = new AccountBalanceEvent();

        $obj = $this->smsModeEventListener;

        $res = $obj->onAccountBalance($accountBalanceEvent);
        $this->assertSame($accountBalanceEvent, $res);

        $this->assertInstanceOf(AccountBalanceRequest::class, $res->getRequest());
        $this->assertInstanceOf(AccountBalanceResponse::class, $res->getResponse());
    }

    /**
     * Tests onAccountBalance()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testOnAccountBalanceWithRuntimeException(): void {

        // Set an Account balance event mock.
        $accountBalanceEvent = new AccountBalanceEvent();

        $obj = new DefaultEventListener($this->logger);

        try {

            $obj->onAccountBalance($accountBalanceEvent);
        } catch (Throwable $ex) {

            $this->assertInstanceOf(RuntimeException::class, $ex);
            $this->assertEquals(DefaultEventListener::RUNTIME_EXCEPTION_MESSAGE, $ex->getMessage());
        }
    }

    /**
     * Tests onAddingContact()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testOnAddingContact(): void {

        // Set an Adding contact event mock.
        $addingContactEvent = new AddingContactEvent($this->addingContact);

        $obj = $this->smsModeEventListener;

        $res = $obj->onAddingContact($addingContactEvent);
        $this->assertSame($addingContactEvent, $res);

        $this->assertInstanceOf(AddingContactRequest::class, $res->getRequest());
        $this->assertInstanceOf(AddingContactResponse::class, $res->getResponse());
    }

    /**
     * Tests onAddingContact()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testOnAddingContactWithRuntimeException(): void {

        // Set an Adding contact event mock.
        $addingContactEvent = new AddingContactEvent($this->addingContact);

        $obj = new DefaultEventListener($this->logger);

        try {

            $obj->onAddingContact($addingContactEvent);
        } catch (Throwable $ex) {

            $this->assertInstanceOf(RuntimeException::class, $ex);
            $this->assertEquals(DefaultEventListener::RUNTIME_EXCEPTION_MESSAGE, $ex->getMessage());
        }
    }

    /**
     * Tests onCheckingSmsMessageStatus()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testOnCheckingSmsMessageStatus(): void {

        // Set a Checking SMS message status event mock.
        $checkingSmsMessageStatusEvent = new CheckingSmsMessageStatusEvent($this->checkingSmsMessageStatus);

        $obj = $this->smsModeEventListener;

        $res = $obj->onCheckingSmsMessageStatus($checkingSmsMessageStatusEvent);
        $this->assertSame($checkingSmsMessageStatusEvent, $res);

        $this->assertInstanceOf(CheckingSmsMessageStatusRequest::class, $res->getRequest());
        $this->assertInstanceOf(CheckingSmsMessageStatusResponse::class, $res->getResponse());
    }

    /**
     * Tests onCheckingSmsMessageStatus()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testOnCheckingSmsMessageStatusWithRuntimeException(): void {

        // Set an Checking SMS message status event mock.
        $checkingSmsMessageStatusEvent = new CheckingSmsMessageStatusEvent($this->checkingSmsMessageStatus);

        $obj = new DefaultEventListener($this->logger);

        try {

            $obj->onCheckingSmsMessageStatus($checkingSmsMessageStatusEvent);
        } catch (Throwable $ex) {

            $this->assertInstanceOf(RuntimeException::class, $ex);
            $this->assertEquals(DefaultEventListener::RUNTIME_EXCEPTION_MESSAGE, $ex->getMessage());
        }
    }

    /**
     * Tests onCreatingApiKey()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testOnCreatingApiKey(): void {

        // Set a Creating API key event mock.
        $creatingApiKeyEvent = new CreatingApiKeyEvent();

        $obj = $this->smsModeEventListener;

        $res = $obj->onCreatingApiKey($creatingApiKeyEvent);
        $this->assertSame($creatingApiKeyEvent, $res);

        $this->assertInstanceOf(CreatingApiKeyRequest::class, $res->getRequest());
        $this->assertInstanceOf(CreatingApiKeyResponse::class, $res->getResponse());
    }

    /**
     * Tests onCreatingApiKey()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testOnCreatingApiKeyWithRuntimeException(): void {

        // Set a Creating API key event mock.
        $creatingApiKeyEvent = new CreatingApiKeyEvent();

        $obj = new DefaultEventListener($this->logger);

        try {

            $obj->onCreatingApiKey($creatingApiKeyEvent);
        } catch (Throwable $ex) {

            $this->assertInstanceOf(RuntimeException::class, $ex);
            $this->assertEquals(DefaultEventListener::RUNTIME_EXCEPTION_MESSAGE, $ex->getMessage());
        }
    }

    /**
     * Tests onCreatingSubAccount()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testOnCreatingSubAccount(): void {

        // Set a Creating sub-account event mock.
        $creatingSubAccountEvent = new CreatingSubAccountEvent($this->creatingSubAccount);

        $obj = $this->smsModeEventListener;

        $res = $obj->onCreatingSubAccount($creatingSubAccountEvent);
        $this->assertSame($creatingSubAccountEvent, $res);

        $this->assertInstanceOf(CreatingSubAccountRequest::class, $res->getRequest());
        $this->assertInstanceOf(CreatingSubAccountResponse::class, $res->getResponse());
    }

    /**
     * Tests onCreatingSubAccount()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testOnCreatingSubAccountWithRuntimeException(): void {

        // Set a Creating sub-account event mock.
        $creatingSubAccountEvent = new CreatingSubAccountEvent($this->creatingSubAccount);

        $obj = new DefaultEventListener($this->logger);

        try {

            $obj->onCreatingSubAccount($creatingSubAccountEvent);
        } catch (Throwable $ex) {

            $this->assertInstanceOf(RuntimeException::class, $ex);
            $this->assertEquals(DefaultEventListener::RUNTIME_EXCEPTION_MESSAGE, $ex->getMessage());
        }
    }

    /**
     * Tests onDeletingSms()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testOnDeletingSms(): void {

        // Set a Deleting SMS event mock.
        $deletingSmsEvent = new DeletingSmsEvent($this->deletingSms);

        $obj = $this->smsModeEventListener;

        $res = $obj->onDeletingSms($deletingSmsEvent);
        $this->assertSame($deletingSmsEvent, $res);

        $this->assertInstanceOf(DeletingSmsRequest::class, $res->getRequest());
        $this->assertInstanceOf(DeletingSmsResponse::class, $res->getResponse());
    }

    /**
     * Tests onDeletingSms()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testOnDeletingSmsWithRuntimeException(): void {

        // Set a Deleting SMS event mock.
        $deletingSmsEvent = new DeletingSmsEvent($this->deletingSms);

        $obj = new DefaultEventListener($this->logger);

        try {

            $obj->onDeletingSms($deletingSmsEvent);
        } catch (Throwable $ex) {

            $this->assertInstanceOf(RuntimeException::class, $ex);
            $this->assertEquals(DefaultEventListener::RUNTIME_EXCEPTION_MESSAGE, $ex->getMessage());
        }
    }

    /**
     * Tests onDeletingSubAccount()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testOnDeletingSubAccount() {

        // Set a Deleting sub-account event mock.
        $deletingSubAccountEvent = new DeletingSubAccountEvent($this->deletingSubAccount);

        $obj = $this->smsModeEventListener;

        $res = $obj->onDeletingSubAccount($deletingSubAccountEvent);
        $this->assertSame($deletingSubAccountEvent, $res);

        $this->assertInstanceOf(DeletingSubAccountRequest::class, $res->getRequest());
        $this->assertInstanceOf(DeletingSubAccountResponse::class, $res->getResponse());
    }

    /**
     * Tests onDeletingSubAccount()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testOnDeletingSubAccountWithRuntimeException() {

        // Set a Deleting sub-account event mock.
        $deletingSubAccountEvent = new DeletingSubAccountEvent($this->deletingSubAccount);

        $obj = new DefaultEventListener($this->logger);

        try {

            $obj->onDeletingSubAccount($deletingSubAccountEvent);
        } catch (Throwable $ex) {

            $this->assertInstanceOf(RuntimeException::class, $ex);
            $this->assertEquals(DefaultEventListener::RUNTIME_EXCEPTION_MESSAGE, $ex->getMessage());
        }
    }

    /**
     * Tests onDeliveryReport()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testOnDeliveryReport() {

        // Set a Delivery report event mock.
        $deliveryReportEvent = new DeliveryReportEvent($this->deliveryReport);

        $obj = $this->smsModeEventListener;

        $res = $obj->onDeliveryReport($deliveryReportEvent);
        $this->assertSame($deliveryReportEvent, $res);

        $this->assertInstanceOf(DeliveryReportRequest::class, $res->getRequest());
        $this->assertInstanceOf(DeliveryReportResponse::class, $res->getResponse());
    }

    /**
     * Tests onDeliveryReport()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testOnDeliveryReportWithRuntimeException() {

        // Set a Delivery report event mock.
        $deliveryReportEvent = new DeliveryReportEvent($this->deliveryReport);

        $obj = new DefaultEventListener($this->logger);

        try {

            $obj->onDeliveryReport($deliveryReportEvent);
        } catch (Throwable $ex) {

            $this->assertInstanceOf(RuntimeException::class, $ex);
            $this->assertEquals(DefaultEventListener::RUNTIME_EXCEPTION_MESSAGE, $ex->getMessage());
        }
    }

    /**
     * Tests onRetrievingSmsReply()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testOnRetrievingSmsReply() {

        // Set a Retrieving SMS reply event mock.
        $retrievingSmsReplyEvent = new RetrievingSmsReplyEvent($this->retrievingSmsReply);

        $obj = $this->smsModeEventListener;

        $res = $obj->onRetrievingSmsReply($retrievingSmsReplyEvent);
        $this->assertSame($retrievingSmsReplyEvent, $res);

        $this->assertInstanceOf(RetrievingSmsReplyRequest::class, $res->getRequest());
        $this->assertInstanceOf(RetrievingSmsReplyResponse::class, $res->getResponse());
    }

    /**
     * Tests onRetrievingSmsReply()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testOnRetrievingSmsReplyWithRuntimeException() {

        // Set a Retrieving SMS reply event mock.
        $retrievingSmsReplyEvent = new RetrievingSmsReplyEvent($this->retrievingSmsReply);

        $obj = new DefaultEventListener($this->logger);

        try {

            $obj->onRetrievingSmsReply($retrievingSmsReplyEvent);
        } catch (Throwable $ex) {

            $this->assertInstanceOf(RuntimeException::class, $ex);
            $this->assertEquals(DefaultEventListener::RUNTIME_EXCEPTION_MESSAGE, $ex->getMessage());
        }
    }

    /**
     * Tests onSendingSmsBatch()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testOnSendingSmsBatch() {

        // Set a Sending SMS batch event mock.
        $sendingSmsBatchEvent = new SendingSmsBatchEvent($this->sendingSmsBatch);

        $obj = $this->smsModeEventListener;

        $res = $obj->onSendingSmsBatch($sendingSmsBatchEvent);
        $this->assertSame($sendingSmsBatchEvent, $res);

        $this->assertInstanceOf(SendingSmsBatchRequest::class, $res->getRequest());
        $this->assertInstanceOf(SendingSmsBatchResponse::class, $res->getResponse());
    }

    /**
     * Tests onSendingSmsBatch()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testOnSendingSmsBatchWithRuntimeException() {

        // Set a Sending SMS batch event mock.
        $sendingSmsBatchEvent = new SendingSmsBatchEvent($this->sendingSmsBatch);

        $obj = new DefaultEventListener($this->logger);

        try {

            $obj->onSendingSmsBatch($sendingSmsBatchEvent);
        } catch (Throwable $ex) {

            $this->assertInstanceOf(RuntimeException::class, $ex);
            $this->assertEquals(DefaultEventListener::RUNTIME_EXCEPTION_MESSAGE, $ex->getMessage());
        }
    }

    /**
     * Tests onSendingSmsMessage()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testOnSendingSmsMessage() {

        // Set a Sending SMS message event mock.
        $sendingSmsMessageEvent = new SendingSmsMessageEvent($this->sendingSmsMessage);

        $obj = $this->smsModeEventListener;

        $res = $obj->onSendingSmsMessage($sendingSmsMessageEvent);
        $this->assertSame($sendingSmsMessageEvent, $res);

        $this->assertInstanceOf(SendingSmsMessageRequest::class, $res->getRequest());
        $this->assertInstanceOf(SendingSmsMessageResponse::class, $res->getResponse());
    }

    /**
     * Tests onSendingSmsMessage()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testOnSendingSmsMessageWithRuntimeException() {

        // Set a Sending SMS message event mock.
        $sendingSmsMessageEvent = new SendingSmsMessageEvent($this->sendingSmsMessage);

        $obj = new DefaultEventListener($this->logger);

        try {

            $obj->onSendingSmsMessage($sendingSmsMessageEvent);
        } catch (Throwable $ex) {

            $this->assertInstanceOf(RuntimeException::class, $ex);
            $this->assertEquals(DefaultEventListener::RUNTIME_EXCEPTION_MESSAGE, $ex->getMessage());
        }
    }

    /**
     * Tests onSendingTextToSpeechSms()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testOnSendingTextToSpeechSms() {

        // Set a Sending text-to-speech event mock.
        $sendingTextToSpeechSmsEvent = new SendingTextToSpeechSmsEvent($this->sendingTextToSpeechSms);

        $obj = $this->smsModeEventListener;

        $res = $obj->onSendingTextToSpeechSms($sendingTextToSpeechSmsEvent);
        $this->assertSame($sendingTextToSpeechSmsEvent, $res);

        $this->assertInstanceOf(SendingTextToSpeechSmsRequest::class, $res->getRequest());
        $this->assertInstanceOf(SendingTextToSpeechSmsResponse::class, $res->getResponse());
    }

    /**
     * Tests onSendingTextToSpeechSms()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testOnSendingTextToSpeechSmsWithRuntimeException() {

        // Set a Sending text-to-speech SMS event mock.
        $sendingTextToSpeechSmsEvent = new SendingTextToSpeechSmsEvent($this->sendingTextToSpeechSms);

        $obj = new DefaultEventListener($this->logger);

        try {

            $obj->onSendingTextToSpeechSms($sendingTextToSpeechSmsEvent);
        } catch (Throwable $ex) {

            $this->assertInstanceOf(RuntimeException::class, $ex);
            $this->assertEquals(DefaultEventListener::RUNTIME_EXCEPTION_MESSAGE, $ex->getMessage());
        }
    }

    /**
     * Tests onSendingUnicodeSms()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testOnSendingUnicodeSms() {

        // Set a Sending unicode SMS event mock.
        $sendingUnicodeSmsEvent = new SendingUnicodeSmsEvent($this->sendingUnicodeSms);

        $obj = $this->smsModeEventListener;

        $res = $obj->onSendingUnicodeSms($sendingUnicodeSmsEvent);
        $this->assertSame($sendingUnicodeSmsEvent, $res);

        $this->assertInstanceOf(SendingUnicodeSmsRequest::class, $res->getRequest());
        $this->assertInstanceOf(SendingUnicodeSmsResponse::class, $res->getResponse());
    }

    /**
     * Tests onSendingUnicodeSms()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testOnSendingUnicodeSmsWithRuntimeException() {

        // Set a Sending unicode SMS event mock.
        $sendingUnicodeSmsEvent = new SendingUnicodeSmsEvent($this->sendingUnicodeSms);

        $obj = new DefaultEventListener($this->logger);

        try {

            $obj->onSendingUnicodeSms($sendingUnicodeSmsEvent);
        } catch (Throwable $ex) {

            $this->assertInstanceOf(RuntimeException::class, $ex);
            $this->assertEquals(DefaultEventListener::RUNTIME_EXCEPTION_MESSAGE, $ex->getMessage());
        }
    }

    /**
     * Tests onSentSmsMessageList()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testOnSentSmsMessageList() {

        // Set a Sent SMS message list event mock.
        $sentSmsMessageListEvent = new SentSmsMessageListEvent($this->sentSmsMessageList);

        $obj = $this->smsModeEventListener;

        $res = $obj->onSentSmsMessageList($sentSmsMessageListEvent);
        $this->assertSame($sentSmsMessageListEvent, $res);

        $this->assertInstanceOf(SentSmsMessageListRequest::class, $res->getRequest());
        $this->assertInstanceOf(SentSmsMessageListResponse::class, $res->getResponse());
    }

    /**
     * Tests onSentSmsMessageList()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testOnSentSmsMessageListWithRuntimeException() {

        // Set a Sent SMS message list event mock.
        $sentSmsMessageListEvent = new SentSmsMessageListEvent($this->sentSmsMessageList);

        $obj = new DefaultEventListener($this->logger);

        try {

            $obj->onSentSmsMessageList($sentSmsMessageListEvent);
        } catch (Throwable $ex) {

            $this->assertInstanceOf(RuntimeException::class, $ex);
            $this->assertEquals(DefaultEventListener::RUNTIME_EXCEPTION_MESSAGE, $ex->getMessage());
        }
    }

    /**
     * Tests onTransferringCredits()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testOnTransferringCredits() {

        // Set a Transferring credits event mock.
        $transferringCreditsEvent = new TransferringCreditsEvent($this->transferringCredits);

        $obj = $this->smsModeEventListener;

        $res = $obj->onTransferringCredits($transferringCreditsEvent);
        $this->assertSame($transferringCreditsEvent, $res);

        $this->assertInstanceOf(TransferringCreditsRequest::class, $res->getRequest());
        $this->assertInstanceOf(TransferringCreditsResponse::class, $res->getResponse());
    }

    /**
     * Tests onTransferringCredits()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testOnTransferringCreditsWithRuntimeException() {

        // Set a Transferring credits event mock.
        $transferringCreditsEvent = new TransferringCreditsEvent($this->transferringCredits);

        $obj = new DefaultEventListener($this->logger);

        try {

            $obj->onTransferringCredits($transferringCreditsEvent);
        } catch (Throwable $ex) {

            $this->assertInstanceOf(RuntimeException::class, $ex);
            $this->assertEquals(DefaultEventListener::RUNTIME_EXCEPTION_MESSAGE, $ex->getMessage());
        }
    }

    /**
     * Tests setAccessToken()
     *
     * @return void
     */
    public function testSetAccessToken() {

        $obj = new DefaultEventListener($this->logger);

        $obj->setAccessToken("accessToken");
        $this->assertEquals("accessToken", $obj->getApiProvider()->getAuthentication()->getAccessToken());
    }

    /**
     * Tests setPass()
     *
     * @return void
     */
    public function testSetPass() {

        $obj = new DefaultEventListener($this->logger);

        $obj->setPass("pass");
        $this->assertEquals("pass", $obj->getApiProvider()->getAuthentication()->getPass());
    }

    /**
     * Tests setPseudo()
     *
     * @return void
     */
    public function testSetPseudo() {

        $obj = new DefaultEventListener($this->logger);

        $obj->setPseudo("pseudo");
        $this->assertEquals("pseudo", $obj->getApiProvider()->getAuthentication()->getPseudo());
    }

    /**
     * Tests __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("sMsmode configuration is missing in your app/config/config.yml.\nPlease, add smsmode.accesss_token or smsmode.pseudo and smsmode.pass", DefaultEventListener::RUNTIME_EXCEPTION_MESSAGE);
        $this->assertEquals("wbw.smsmode.event_listener.default", DefaultEventListener::SERVICE_NAME);

        $obj = new DefaultEventListener($this->logger);

        $this->assertNotNull($obj->getApiProvider());
    }
}
