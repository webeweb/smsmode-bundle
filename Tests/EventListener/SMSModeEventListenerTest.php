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
use WBW\Bundle\SMSModeBundle\EventListener\SMSModeEventListener;
use WBW\Bundle\SMSModeBundle\Tests\AbstractTestCase;
use WBW\Library\SMSMode\Model\Request\AddingContactRequest;
use WBW\Library\SMSMode\Model\Request\CheckingSMSMessageStatusRequest;
use WBW\Library\SMSMode\Model\Request\CreatingSubAccountRequest;
use WBW\Library\SMSMode\Model\Request\DeletingSMSRequest;
use WBW\Library\SMSMode\Model\Request\DeletingSubAccountRequest;
use WBW\Library\SMSMode\Model\Request\DeliveryReportRequest;
use WBW\Library\SMSMode\Model\Request\RetrievingSMSReplyRequest;
use WBW\Library\SMSMode\Model\Request\SendingSMSBatchRequest;
use WBW\Library\SMSMode\Model\Request\SendingSMSMessageRequest;
use WBW\Library\SMSMode\Model\Request\SendingTextToSpeechSMSRequest;
use WBW\Library\SMSMode\Model\Request\SendingUnicodeSMSRequest;
use WBW\Library\SMSMode\Model\Request\SentSMSMessageListRequest;
use WBW\Library\SMSMode\Model\Request\TransferringCreditsRequest;
use WBW\Library\SMSMode\Model\Response\AddingContactResponse;
use WBW\Library\SMSMode\Model\Response\CheckingSMSMessageStatusResponse;
use WBW\Library\SMSMode\Model\Response\CreatingSubAccountResponse;
use WBW\Library\SMSMode\Model\Response\DeletingSMSResponse;
use WBW\Library\SMSMode\Model\Response\DeletingSubAccountResponse;
use WBW\Library\SMSMode\Model\Response\DeliveryReportResponse;
use WBW\Library\SMSMode\Model\Response\RetrievingSMSReplyResponse;
use WBW\Library\SMSMode\Model\Response\SendingSMSBatchResponse;
use WBW\Library\SMSMode\Model\Response\SendingSMSMessageResponse;
use WBW\Library\SMSMode\Model\Response\SendingTextToSpeechSMSResponse;
use WBW\Library\SMSMode\Model\Response\SendingUnicodeSMSResponse;
use WBW\Library\SMSMode\Model\Response\SentSMSMessageListResponse;
use WBW\Library\SMSMode\Model\Response\TransferringCreditsResponse;

/**
 * sMsmode event listener test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\SMSModeBundle\Tests\EventListener
 */
class SMSModeEventListenerTest extends AbstractTestCase {

    /**
     * sMsmode event listener.
     *
     * @var SMSModeEventListener
     */
    private $smsModeEventListener;

    /**
     * {@inheritdoc}
     */
    protected function setUp() {
        parent::setUp();

        // Set a sMsmode event listener.
        $this->smsModeEventListener = new SMSModeEventListener();
        $this->smsModeEventListener->setPseudo("pseudo");
        $this->smsModeEventListener->setPass("pass");
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $this->assertEquals("webeweb.smsmode.event_listener", SMSModeEventListener::SERVICE_NAME);

        $obj = new SMSModeEventListener();

        $this->assertNotNull($obj->getApiProvider());
    }

    /**
     * Tests the onAddingContact() method.
     *
     * @return void
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testOnAddingContact() {

        // Set an Adding contact event mock.
        $addingContactEvent = new AddingContactEvent($this->addingContact);

        $obj = $this->smsModeEventListener;

        $res = $obj->onAddingContact($addingContactEvent);
        $this->assertSame($addingContactEvent, $res);

        $this->assertInstanceOf(AddingContactRequest::class, $res->getRequest());
        $this->assertInstanceOf(AddingContactResponse::class, $res->getResponse());
    }

    /**
     * Tests the onCheckingSMSMessageStatus() method.
     *
     * @return void
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testOnCheckingSMSMessageStatus() {

        // Set a Checking SMS message status event mock.
        $checkingSMSMessageStatusEvent = new CheckingSMSMessageStatusEvent($this->checkingSMSMessageStatus);

        $obj = $this->smsModeEventListener;

        $res = $obj->onCheckingSMSMessageStatus($checkingSMSMessageStatusEvent);
        $this->assertSame($checkingSMSMessageStatusEvent, $res);

        $this->assertInstanceOf(CheckingSMSMessageStatusRequest::class, $res->getRequest());
        $this->assertInstanceOf(CheckingSMSMessageStatusResponse::class, $res->getResponse());
    }

    /**
     * Tests the onCreatingSubAccount() method.
     *
     * @return void
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testOnCreatingSubAccount() {

        // Set a Creating sub-account event mock.
        $creatingSubAccountEvent = new CreatingSubAccountEvent($this->creatingSubAccount);

        $obj = $this->smsModeEventListener;

        $res = $obj->onCreatingSubAccount($creatingSubAccountEvent);
        $this->assertSame($creatingSubAccountEvent, $res);

        $this->assertInstanceOf(CreatingSubAccountRequest::class, $res->getRequest());
        $this->assertInstanceOf(CreatingSubAccountResponse::class, $res->getResponse());
    }

    /**
     * Tests the onDeletingSMS() method.
     *
     * @return void
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testOnDeletingSMS() {

        // Set a Deleting SMS event mock.
        $deletingSMSEvent = new DeletingSMSEvent($this->deletingSMS);

        $obj = $this->smsModeEventListener;

        $res = $obj->onDeletingSMS($deletingSMSEvent);
        $this->assertSame($deletingSMSEvent, $res);

        $this->assertInstanceOf(DeletingSMSRequest::class, $res->getRequest());
        $this->assertInstanceOf(DeletingSMSResponse::class, $res->getResponse());
    }

    /**
     * Tests the onDeletingSubAccount() method.
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
     * Tests the onDeliveryReport() method.
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
     * Tests the onRetrievingSMSReply() method.
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
     * Tests the onSendingSMSBatch() method.
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
     * Tests the onSendingSMSMessage() method.
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
     * Tests the onSendingTextToSpeechSMS() method.
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
     * Tests the onSendingUnicodeSMS() method.
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
     * Tests the onSentSMSMessageList() method.
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
     * Tests the onTransferringCredits() method.
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
     * Tests the setAccessToken() method.
     *
     * @return void
     */
    public function testSetAccessToken() {

        $obj = new SMSModeEventListener();

        $obj->setAccessToken("accessToken");
        $this->assertEquals("accessToken", $obj->getApiProvider()->getAuthentication()->getAccessToken());
    }

    /**
     * Tests the setPass() method.
     *
     * @return void
     */
    public function testSetPass() {

        $obj = new SMSModeEventListener();

        $obj->setPass("pass");
        $this->assertEquals("pass", $obj->getApiProvider()->getAuthentication()->getPass());
    }

    /**
     * Tests the setPseudo() method.
     *
     * @return void
     */
    public function testSetPseudo() {

        $obj = new SMSModeEventListener();

        $obj->setPseudo("pseudo");
        $this->assertEquals("pseudo", $obj->getApiProvider()->getAuthentication()->getPseudo());
    }
}
