<?php

/*
 * This file is part of the smsmode-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\SMSModeBundle\Tests\EventListener;

use Exception;
use RuntimeException;
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
use WBW\Bundle\SMSModeBundle\EventListener\DefaultEventListener;
use WBW\Bundle\SMSModeBundle\Tests\AbstractTestCase;
use WBW\Library\SMSMode\Request\AccountBalanceRequest;
use WBW\Library\SMSMode\Request\AddingContactRequest;
use WBW\Library\SMSMode\Request\CheckingSMSMessageStatusRequest;
use WBW\Library\SMSMode\Request\CreatingAPIKeyRequest;
use WBW\Library\SMSMode\Request\CreatingSubAccountRequest;
use WBW\Library\SMSMode\Request\DeletingSMSRequest;
use WBW\Library\SMSMode\Request\DeletingSubAccountRequest;
use WBW\Library\SMSMode\Request\DeliveryReportRequest;
use WBW\Library\SMSMode\Request\RetrievingSMSReplyRequest;
use WBW\Library\SMSMode\Request\SendingSMSBatchRequest;
use WBW\Library\SMSMode\Request\SendingSMSMessageRequest;
use WBW\Library\SMSMode\Request\SendingTextToSpeechSMSRequest;
use WBW\Library\SMSMode\Request\SendingUnicodeSMSRequest;
use WBW\Library\SMSMode\Request\SentSMSMessageListRequest;
use WBW\Library\SMSMode\Request\TransferringCreditsRequest;
use WBW\Library\SMSMode\Response\AccountBalanceResponse;
use WBW\Library\SMSMode\Response\AddingContactResponse;
use WBW\Library\SMSMode\Response\CheckingSMSMessageStatusResponse;
use WBW\Library\SMSMode\Response\CreatingAPIKeyResponse;
use WBW\Library\SMSMode\Response\CreatingSubAccountResponse;
use WBW\Library\SMSMode\Response\DeletingSMSResponse;
use WBW\Library\SMSMode\Response\DeletingSubAccountResponse;
use WBW\Library\SMSMode\Response\DeliveryReportResponse;
use WBW\Library\SMSMode\Response\RetrievingSMSReplyResponse;
use WBW\Library\SMSMode\Response\SendingSMSBatchResponse;
use WBW\Library\SMSMode\Response\SendingSMSMessageResponse;
use WBW\Library\SMSMode\Response\SendingTextToSpeechSMSResponse;
use WBW\Library\SMSMode\Response\SendingUnicodeSMSResponse;
use WBW\Library\SMSMode\Response\SentSMSMessageListResponse;
use WBW\Library\SMSMode\Response\TransferringCreditsResponse;

/**
 * Default event listener test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\SMSModeBundle\Tests\EventListener
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
     * @throws Exception Throws an exception if an error occurs.
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
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testOnAccountBalanceWithRuntimeException(): void {

        // Set an Account balance event mock.
        $accountBalanceEvent = new AccountBalanceEvent();

        $obj = new DefaultEventListener($this->logger);

        try {

            $obj->onAccountBalance($accountBalanceEvent);
        } catch (Exception $ex) {

            $this->assertInstanceOf(RuntimeException::class, $ex);
            $this->assertEquals(DefaultEventListener::RUNTIME_EXCEPTION_MESSAGE, $ex->getMessage());
        }
    }

    /**
     * Tests onAddingContact()
     *
     * @return void
     * @throws Exception Throws an exception if an error occurs.
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
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testOnAddingContactWithRuntimeException(): void {

        // Set an Adding contact event mock.
        $addingContactEvent = new AddingContactEvent($this->addingContact);

        $obj = new DefaultEventListener($this->logger);

        try {

            $obj->onAddingContact($addingContactEvent);
        } catch (Exception $ex) {

            $this->assertInstanceOf(RuntimeException::class, $ex);
            $this->assertEquals(DefaultEventListener::RUNTIME_EXCEPTION_MESSAGE, $ex->getMessage());
        }
    }

    /**
     * Tests onCheckingSMSMessageStatus()
     *
     * @return void
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testOnCheckingSMSMessageStatus(): void {

        // Set a Checking SMS message status event mock.
        $checkingSMSMessageStatusEvent = new CheckingSMSMessageStatusEvent($this->checkingSMSMessageStatus);

        $obj = $this->smsModeEventListener;

        $res = $obj->onCheckingSMSMessageStatus($checkingSMSMessageStatusEvent);
        $this->assertSame($checkingSMSMessageStatusEvent, $res);

        $this->assertInstanceOf(CheckingSMSMessageStatusRequest::class, $res->getRequest());
        $this->assertInstanceOf(CheckingSMSMessageStatusResponse::class, $res->getResponse());
    }

    /**
     * Tests onCheckingSMSMessageStatus()
     *
     * @return void
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testOnCheckingSMSMessageStatusWithRuntimeException(): void {

        // Set an Checking SMS message status event mock.
        $checkingSMSMessageStatusEvent = new CheckingSMSMessageStatusEvent($this->checkingSMSMessageStatus);

        $obj = new DefaultEventListener($this->logger);

        try {

            $obj->onCheckingSMSMessageStatus($checkingSMSMessageStatusEvent);
        } catch (Exception $ex) {

            $this->assertInstanceOf(RuntimeException::class, $ex);
            $this->assertEquals(DefaultEventListener::RUNTIME_EXCEPTION_MESSAGE, $ex->getMessage());
        }
    }

    /**
     * Tests onCreatingAPIKey()
     *
     * @return void
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testOnCreatingAPIKey(): void {

        // Set a Creating API key event mock.
        $creatingAPIKeyEvent = new CreatingAPIKeyEvent();

        $obj = $this->smsModeEventListener;

        $res = $obj->onCreatingAPIKey($creatingAPIKeyEvent);
        $this->assertSame($creatingAPIKeyEvent, $res);

        $this->assertInstanceOf(CreatingAPIKeyRequest::class, $res->getRequest());
        $this->assertInstanceOf(CreatingAPIKeyResponse::class, $res->getResponse());
    }

    /**
     * Tests onCreatingAPIKey()
     *
     * @return void
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testOnCreatingAPIKeyWithRuntimeException(): void {

        // Set a Creating API key event mock.
        $creatingAPIKeyEvent = new CreatingAPIKeyEvent();

        $obj = new DefaultEventListener($this->logger);

        try {

            $obj->onCreatingAPIKey($creatingAPIKeyEvent);
        } catch (Exception $ex) {

            $this->assertInstanceOf(RuntimeException::class, $ex);
            $this->assertEquals(DefaultEventListener::RUNTIME_EXCEPTION_MESSAGE, $ex->getMessage());
        }
    }

    /**
     * Tests onCreatingSubAccount()
     *
     * @return void
     * @throws Exception Throws an exception if an error occurs.
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
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testOnCreatingSubAccountWithRuntimeException(): void {

        // Set a Creating sub-account event mock.
        $creatingSubAccountEvent = new CreatingSubAccountEvent($this->creatingSubAccount);

        $obj = new DefaultEventListener($this->logger);

        try {

            $obj->onCreatingSubAccount($creatingSubAccountEvent);
        } catch (Exception $ex) {

            $this->assertInstanceOf(RuntimeException::class, $ex);
            $this->assertEquals(DefaultEventListener::RUNTIME_EXCEPTION_MESSAGE, $ex->getMessage());
        }
    }

    /**
     * Tests onDeletingSMS()
     *
     * @return void
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testOnDeletingSMS(): void {

        // Set a Deleting SMS event mock.
        $deletingSMSEvent = new DeletingSMSEvent($this->deletingSMS);

        $obj = $this->smsModeEventListener;

        $res = $obj->onDeletingSMS($deletingSMSEvent);
        $this->assertSame($deletingSMSEvent, $res);

        $this->assertInstanceOf(DeletingSMSRequest::class, $res->getRequest());
        $this->assertInstanceOf(DeletingSMSResponse::class, $res->getResponse());
    }

    /**
     * Tests onDeletingSMS()
     *
     * @return void
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testOnDeletingSMSWithRuntimeException(): void {

        // Set a Deleting SMS event mock.
        $deletingSMSEvent = new DeletingSMSEvent($this->deletingSMS);

        $obj = new DefaultEventListener($this->logger);

        try {

            $obj->onDeletingSMS($deletingSMSEvent);
        } catch (Exception $ex) {

            $this->assertInstanceOf(RuntimeException::class, $ex);
            $this->assertEquals(DefaultEventListener::RUNTIME_EXCEPTION_MESSAGE, $ex->getMessage());
        }
    }

    /**
     * Tests onDeletingSubAccount()
     *
     * @return void
     * @throws Exception Throws an exception if an error occurs.
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
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testOnDeletingSubAccountWithRuntimeException() {

        // Set a Deleting sub-account event mock.
        $deletingSubAccountEvent = new DeletingSubAccountEvent($this->deletingSubAccount);

        $obj = new DefaultEventListener($this->logger);

        try {

            $obj->onDeletingSubAccount($deletingSubAccountEvent);
        } catch (Exception $ex) {

            $this->assertInstanceOf(RuntimeException::class, $ex);
            $this->assertEquals(DefaultEventListener::RUNTIME_EXCEPTION_MESSAGE, $ex->getMessage());
        }
    }

    /**
     * Tests onDeliveryReport()
     *
     * @return void
     * @throws Exception Throws an exception if an error occurs.
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
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testOnDeliveryReportWithRuntimeException() {

        // Set a Delivery report event mock.
        $deliveryReportEvent = new DeliveryReportEvent($this->deliveryReport);

        $obj = new DefaultEventListener($this->logger);

        try {

            $obj->onDeliveryReport($deliveryReportEvent);
        } catch (Exception $ex) {

            $this->assertInstanceOf(RuntimeException::class, $ex);
            $this->assertEquals(DefaultEventListener::RUNTIME_EXCEPTION_MESSAGE, $ex->getMessage());
        }
    }

    /**
     * Tests onRetrievingSMSReply()
     *
     * @return void
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testOnRetrievingSMSReply() {

        // Set a Retrieving SMS reply event mock.
        $retrievingSMSReplyEvent = new RetrievingSMSReplyEvent($this->retrievingSMSReply);

        $obj = $this->smsModeEventListener;

        $res = $obj->onRetrievingSMSReply($retrievingSMSReplyEvent);
        $this->assertSame($retrievingSMSReplyEvent, $res);

        $this->assertInstanceOf(RetrievingSMSReplyRequest::class, $res->getRequest());
        $this->assertInstanceOf(RetrievingSMSReplyResponse::class, $res->getResponse());
    }

    /**
     * Tests onRetrievingSMSReply()
     *
     * @return void
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testOnRetrievingSMSReplyWithRuntimeException() {

        // Set a Retrieving SMS reply event mock.
        $retrievingSMSReplyEvent = new RetrievingSMSReplyEvent($this->retrievingSMSReply);

        $obj = new DefaultEventListener($this->logger);

        try {

            $obj->onRetrievingSMSReply($retrievingSMSReplyEvent);
        } catch (Exception $ex) {

            $this->assertInstanceOf(RuntimeException::class, $ex);
            $this->assertEquals(DefaultEventListener::RUNTIME_EXCEPTION_MESSAGE, $ex->getMessage());
        }
    }

    /**
     * Tests onSendingSMSBatch()
     *
     * @return void
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testOnSendingSMSBatch() {

        // Set a Sending SMS batch event mock.
        $sendingSMSBatchEvent = new SendingSMSBatchEvent($this->sendingSMSBatch);

        $obj = $this->smsModeEventListener;

        $res = $obj->onSendingSMSBatch($sendingSMSBatchEvent);
        $this->assertSame($sendingSMSBatchEvent, $res);

        $this->assertInstanceOf(SendingSMSBatchRequest::class, $res->getRequest());
        $this->assertInstanceOf(SendingSMSBatchResponse::class, $res->getResponse());
    }

    /**
     * Tests onSendingSMSBatch()
     *
     * @return void
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testOnSendingSMSBatchWithRuntimeException() {

        // Set a Sending SMS batch event mock.
        $sendingSMSBatchEvent = new SendingSMSBatchEvent($this->sendingSMSBatch);

        $obj = new DefaultEventListener($this->logger);

        try {

            $obj->onSendingSMSBatch($sendingSMSBatchEvent);
        } catch (Exception $ex) {

            $this->assertInstanceOf(RuntimeException::class, $ex);
            $this->assertEquals(DefaultEventListener::RUNTIME_EXCEPTION_MESSAGE, $ex->getMessage());
        }
    }

    /**
     * Tests onSendingSMSMessage()
     *
     * @return void
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testOnSendingSMSMessage() {

        // Set a Sending SMS message event mock.
        $sendingSMSMessageEvent = new SendingSMSMessageEvent($this->sendingSMSMessage);

        $obj = $this->smsModeEventListener;

        $res = $obj->onSendingSMSMessage($sendingSMSMessageEvent);
        $this->assertSame($sendingSMSMessageEvent, $res);

        $this->assertInstanceOf(SendingSMSMessageRequest::class, $res->getRequest());
        $this->assertInstanceOf(SendingSMSMessageResponse::class, $res->getResponse());
    }

    /**
     * Tests onSendingSMSMessage()
     *
     * @return void
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testOnSendingSMSMessageWithRuntimeException() {

        // Set a Sending SMS message event mock.
        $sendingSMSMessageEvent = new SendingSMSMessageEvent($this->sendingSMSMessage);

        $obj = new DefaultEventListener($this->logger);

        try {

            $obj->onSendingSMSMessage($sendingSMSMessageEvent);
        } catch (Exception $ex) {

            $this->assertInstanceOf(RuntimeException::class, $ex);
            $this->assertEquals(DefaultEventListener::RUNTIME_EXCEPTION_MESSAGE, $ex->getMessage());
        }
    }

    /**
     * Tests onSendingTextToSpeechSMS()
     *
     * @return void
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testOnSendingTextToSpeechSMS() {

        // Set a Sending text-to-speech event mock.
        $sendingTextToSpeechSMSEvent = new SendingTextToSpeechSMSEvent($this->sendingTextToSpeechSMS);

        $obj = $this->smsModeEventListener;

        $res = $obj->onSendingTextToSpeechSMS($sendingTextToSpeechSMSEvent);
        $this->assertSame($sendingTextToSpeechSMSEvent, $res);

        $this->assertInstanceOf(SendingTextToSpeechSMSRequest::class, $res->getRequest());
        $this->assertInstanceOf(SendingTextToSpeechSMSResponse::class, $res->getResponse());
    }

    /**
     * Tests onSendingTextToSpeechSMS()
     *
     * @return void
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testOnSendingTextToSpeechSMSWithRuntimeException() {

        // Set a Sending text-to-speech SMS event mock.
        $sendingTextToSpeechSMSEvent = new SendingTextToSpeechSMSEvent($this->sendingTextToSpeechSMS);

        $obj = new DefaultEventListener($this->logger);

        try {

            $obj->onSendingTextToSpeechSMS($sendingTextToSpeechSMSEvent);
        } catch (Exception $ex) {

            $this->assertInstanceOf(RuntimeException::class, $ex);
            $this->assertEquals(DefaultEventListener::RUNTIME_EXCEPTION_MESSAGE, $ex->getMessage());
        }
    }

    /**
     * Tests onSendingUnicodeSMS()
     *
     * @return void
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testOnSendingUnicodeSMS() {

        // Set a Sending unicode SMS event mock.
        $sendingUnicodeSMSEvent = new SendingUnicodeSMSEvent($this->sendingUnicodeSMS);

        $obj = $this->smsModeEventListener;

        $res = $obj->onSendingUnicodeSMS($sendingUnicodeSMSEvent);
        $this->assertSame($sendingUnicodeSMSEvent, $res);

        $this->assertInstanceOf(SendingUnicodeSMSRequest::class, $res->getRequest());
        $this->assertInstanceOf(SendingUnicodeSMSResponse::class, $res->getResponse());
    }

    /**
     * Tests onSendingUnicodeSMS()
     *
     * @return void
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testOnSendingUnicodeSMSWithRuntimeException() {

        // Set a Sending unicode SMS event mock.
        $sendingUnicodeSMSEvent = new SendingUnicodeSMSEvent($this->sendingUnicodeSMS);

        $obj = new DefaultEventListener($this->logger);

        try {

            $obj->onSendingUnicodeSMS($sendingUnicodeSMSEvent);
        } catch (Exception $ex) {

            $this->assertInstanceOf(RuntimeException::class, $ex);
            $this->assertEquals(DefaultEventListener::RUNTIME_EXCEPTION_MESSAGE, $ex->getMessage());
        }
    }

    /**
     * Tests onSentSMSMessageList()
     *
     * @return void
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testOnSentSMSMessageList() {

        // Set a Sent SMS message list event mock.
        $sentSMSMessageListEvent = new SentSMSMessageListEvent($this->sentSMSMessageList);

        $obj = $this->smsModeEventListener;

        $res = $obj->onSentSMSMessageList($sentSMSMessageListEvent);
        $this->assertSame($sentSMSMessageListEvent, $res);

        $this->assertInstanceOf(SentSMSMessageListRequest::class, $res->getRequest());
        $this->assertInstanceOf(SentSMSMessageListResponse::class, $res->getResponse());
    }

    /**
     * Tests onSentSMSMessageList()
     *
     * @return void
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testOnSentSMSMessageListWithRuntimeException() {

        // Set a Sent SMS message list event mock.
        $sentSMSMessageListEvent = new SentSMSMessageListEvent($this->sentSMSMessageList);

        $obj = new DefaultEventListener($this->logger);

        try {

            $obj->onSentSMSMessageList($sentSMSMessageListEvent);
        } catch (Exception $ex) {

            $this->assertInstanceOf(RuntimeException::class, $ex);
            $this->assertEquals(DefaultEventListener::RUNTIME_EXCEPTION_MESSAGE, $ex->getMessage());
        }
    }

    /**
     * Tests onTransferringCredits()
     *
     * @return void
     * @throws Exception Throws an exception if an error occurs.
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
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testOnTransferringCreditsWithRuntimeException() {

        // Set a Transferring credits event mock.
        $transferringCreditsEvent = new TransferringCreditsEvent($this->transferringCredits);

        $obj = new DefaultEventListener($this->logger);

        try {

            $obj->onTransferringCredits($transferringCreditsEvent);
        } catch (Exception $ex) {

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