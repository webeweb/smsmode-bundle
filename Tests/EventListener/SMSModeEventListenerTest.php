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

/**
 * sMsmode event listener test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\SMSModeBundle\Tests\EventListener
 */
class SMSModeEventListenerTest extends AbstractTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $this->assertEquals("webeweb.smsmode.event_listener", SMSModeEventListener::SERVICE_NAME);

        $obj = new SMSModeEventListener();

        $this->assertNull($obj->getAccessToken());
        $this->assertNull($obj->getApiProvider());
        $this->assertNull($obj->getPass());
        $this->assertNull($obj->getPseudo());
    }

    /**
     * Tests the onAddingContact() method.
     *
     * @return void
     */
    public function testOnAddingContact() {

        // Set an Adding contact event mock.
        $addingContactEvent = new AddingContactEvent($this->addingContact);

        $obj = new SMSModeEventListener();

        $res = $obj->onAddingContact($addingContactEvent);
        $this->assertSame($addingContactEvent, $res);
    }

    /**
     * Tests the onCheckingSMSMessageStatus() method.
     *
     * @return void
     */
    public function testOnCheckingSMSMessageStatus() {

        // Set a Checking SMS message status event mock.
        $checkingSMSMessageStatusEvent = new CheckingSMSMessageStatusEvent($this->checkingSMSMessageStatus);

        $obj = new SMSModeEventListener();

        $res = $obj->onCheckingSMSMessageStatus($checkingSMSMessageStatusEvent);
        $this->assertSame($checkingSMSMessageStatusEvent, $res);
    }

    /**
     * Tests the onCreatingSubAccount() method.
     *
     * @return void
     */
    public function testOnCreatingSubAccount() {

        // Set a Creating sub-account event mock.
        $creatingSubAccountEvent = new CreatingSubAccountEvent($this->creatingSubAccount);

        $obj = new SMSModeEventListener();

        $res = $obj->onCreatingSubAccount($creatingSubAccountEvent);
        $this->assertSame($creatingSubAccountEvent, $res);
    }

    /**
     * Tests the onDeletingSMS() method.
     *
     * @return void
     */
    public function testOnDeletingSMS() {

        // Set a Deleting SMS event mock.
        $deletingSMSEvent = new DeletingSMSEvent($this->deletingSMS);

        $obj = new SMSModeEventListener();

        $res = $obj->onDeletingSMS($deletingSMSEvent);
        $this->assertSame($deletingSMSEvent, $res);
    }

    /**
     * Tests the onDeletingSubAccount() method.
     *
     * @return void
     */
    public function testOnDeletingSubAccount() {

        // Set a Deleting sub-account event mock.
        $deletingSubAccountEvent = new DeletingSubAccountEvent($this->deletingSubAccount);

        $obj = new SMSModeEventListener();

        $res = $obj->onDeletingSubAccount($deletingSubAccountEvent);
        $this->assertSame($deletingSubAccountEvent, $res);
    }

    /**
     * Tests the onDeliveryReport() method.
     *
     * @return void
     */
    public function testOnDeliveryReport() {

        // Set a Delivery report event mock.
        $deliveryReportEvent = new DeliveryReportEvent($this->deliveryReport);

        $obj = new SMSModeEventListener();

        $res = $obj->onDeliveryReport($deliveryReportEvent);
        $this->assertSame($deliveryReportEvent, $res);
    }

    /**
     * Tests the onRetrievingSMSReply() method.
     *
     * @return void
     */
    public function testOnRetrievingSMSReply() {

        // Set a Retrieving SMS reply event mock.
        $retrievingSMSReplyEvent = new RetrievingSMSReplyEvent($this->retrievingSMSReply);

        $obj = new SMSModeEventListener();

        $res = $obj->onRetrievingSMSReply($retrievingSMSReplyEvent);
        $this->assertSame($retrievingSMSReplyEvent, $res);
    }

    /**
     * Tests the onSendingSMSBatch() method.
     *
     * @return void
     */
    public function testOnSendingSMSBatch() {

        // Set a Sending SMS batch event mock.
        $sendingSMSBatchEvent = new SendingSMSBatchEvent($this->sendingSMSBatch);

        $obj = new SMSModeEventListener();

        $res = $obj->onSendingSMSBatch($sendingSMSBatchEvent);
        $this->assertSame($sendingSMSBatchEvent, $res);
    }

    /**
     * Tests the onSendingSMSMessage() method.
     *
     * @return void
     */
    public function testOnSendingSMSMessage() {

        // Set a Sending SMS message event mock.
        $sendingSMSMessageEvent = new SendingSMSMessageEvent($this->sendingSMSMessage);

        $obj = new SMSModeEventListener();

        $res = $obj->onSendingSMSMessage($sendingSMSMessageEvent);
        $this->assertSame($sendingSMSMessageEvent, $res);
    }

    /**
     * Tests the onSendingTextToSpeechSMS() method.
     *
     * @return void
     */
    public function testOnSendingTextToSpeechSMS() {

        // Set a Sending text-to-speech event mock.
        $sendingTextToSpeechSMSEvent = new SendingTextToSpeechSMSEvent($this->sendingTextToSpeechSMS);

        $obj = new SMSModeEventListener();

        $res = $obj->onSendingTextToSpeechSMS($sendingTextToSpeechSMSEvent);
        $this->assertSame($sendingTextToSpeechSMSEvent, $res);
    }

    /**
     * Tests the onSendingUnicodeSMS() method.
     *
     * @return void
     */
    public function testOnSendingUnicodeSMS() {

        // Set a Sending unicode SMS event mock.
        $sendingUnicodeSMSEvent = new SendingUnicodeSMSEvent($this->sendingUnicodeSMS);

        $obj = new SMSModeEventListener();

        $res = $obj->onSendingUnicodeSMS($sendingUnicodeSMSEvent);
        $this->assertSame($sendingUnicodeSMSEvent, $res);
    }

    /**
     * Tests the onSentSMSMessageList() method.
     *
     * @return void
     */
    public function testOnSentSMSMessageList() {

        // Set a Sent SMS message list event mock.
        $sentSMSMessageListEvent = new SentSMSMessageListEvent($this->sentSMSMessageList);

        $obj = new SMSModeEventListener();

        $res = $obj->onSentSMSMessageList($sentSMSMessageListEvent);
        $this->assertSame($sentSMSMessageListEvent, $res);
    }

    /**
     * Tests the onTransferringCredits() method.
     *
     * @return void
     */
    public function testOnTransferringCredits() {

        // Set a Transferring credits event mock.
        $transferringCreditsEvent = new TransferringCreditsEvent($this->transferringCredits);

        $obj = new SMSModeEventListener();

        $res = $obj->onTransferringCredits($transferringCreditsEvent);
        $this->assertSame($transferringCreditsEvent, $res);
    }

    /**
     * Tests the setPass() method.
     *
     * @return void
     */
    public function testSetPass() {

        $obj = new SMSModeEventListener();

        $obj->setPass("pass");
        $this->assertEquals("pass", $obj->getPass());
    }

    /**
     * Tests the setPseudo() method.
     *
     * @return void
     */
    public function testSetPseudo() {

        $obj = new SMSModeEventListener();

        $obj->setPseudo("pseudo");
        $this->assertEquals("pseudo", $obj->getPseudo());
    }
}
