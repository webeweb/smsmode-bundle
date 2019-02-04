<?php

/*
 * This file is part of the smsmode-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\SMSModeBundle\Tests\Factory;

use WBW\Bundle\SMSModeBundle\Entity\AddingContactInterface;
use WBW\Bundle\SMSModeBundle\Entity\CheckingSMSMessageStatusInterface;
use WBW\Bundle\SMSModeBundle\Entity\CreatingSubAccountInterface;
use WBW\Bundle\SMSModeBundle\Entity\DeletingSMSInterface;
use WBW\Bundle\SMSModeBundle\Entity\DeletingSubAccountInterface;
use WBW\Bundle\SMSModeBundle\Entity\DeliveryReportInterface;
use WBW\Bundle\SMSModeBundle\Entity\RetrievingSMSReplyInterface;
use WBW\Bundle\SMSModeBundle\Entity\SendingSMSBatchInterface;
use WBW\Bundle\SMSModeBundle\Entity\SendingSMSMessageInterface;
use WBW\Bundle\SMSModeBundle\Entity\SendingTextToSpeechSMSInterface;
use WBW\Bundle\SMSModeBundle\Entity\SendingUnicodeSMSInterface;
use WBW\Bundle\SMSModeBundle\Entity\SentSMSMessageListInterface;
use WBW\Bundle\SMSModeBundle\Entity\TransferringCreditsInterface;
use WBW\Bundle\SMSModeBundle\Factory\SMSModeFactory;
use WBW\Bundle\SMSModeBundle\Tests\AbstractTestCase;
use WBW\Library\SMSMode\Model\AddingContactRequest;
use WBW\Library\SMSMode\Model\CheckingSMSMessageStatusRequest;
use WBW\Library\SMSMode\Model\CreatingSubAccountRequest;
use WBW\Library\SMSMode\Model\DeletingSMSRequest;
use WBW\Library\SMSMode\Model\DeletingSubAccountRequest;
use WBW\Library\SMSMode\Model\DeliveryReportRequest;
use WBW\Library\SMSMode\Model\RetrievingSMSReplyRequest;
use WBW\Library\SMSMode\Model\SendingSMSBatchRequest;
use WBW\Library\SMSMode\Model\SendingSMSMessageRequest;
use WBW\Library\SMSMode\Model\SendingTextToSpeechSMSRequest;
use WBW\Library\SMSMode\Model\SendingUnicodeSMSRequest;
use WBW\Library\SMSMode\Model\SentSMSMessageListRequest;
use WBW\Library\SMSMode\Model\TransferringCreditsRequest;

/**
 * sMsmode factory test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\SMSModeBundle\Tests\Factory
 */
class SMSModeFactoryTest extends AbstractTestCase {

    /**
     * Tests the newAddingContactRequest() method.
     *
     * @return void
     */
    public function testNewAddingContactRequest() {

        // Set an Adding contact mock.
        $addingContact = $this->getMockBuilder(AddingContactInterface::class)->getMock();

        $res = SMSModeFactory::newAddingContactRequest($addingContact);
        $this->assertInstanceOf(AddingContactRequest::class, $res);
    }

    /**
     * Tests the newCheckingSMSMessageStatusRequest() method.
     *
     * @return void
     */
    public function testNewCheckingSMSMessageStatusRequest() {

        // Set a Checking SMS message status mock.
        $checkingSMSMessageStatus = $this->getMockBuilder(CheckingSMSMessageStatusInterface::class)->getMock();

        $res = SMSModeFactory::newCheckingSMSMessageStatusRequest($checkingSMSMessageStatus);
        $this->assertInstanceOf(CheckingSMSMessageStatusRequest::class, $res);
    }

    /**
     * Tests the newCreatingSubAccountRequest() method.
     *
     * @return void
     */
    public function testNewCreatingSubAccountRequest() {

        // Set a Creating sub-account mock.
        $creatingSubAccount = $this->getMockBuilder(CreatingSubAccountInterface::class)->getMock();

        $res = SMSModeFactory::newCreatingSubAccountRequest($creatingSubAccount);
        $this->assertInstanceOf(CreatingSubAccountRequest::class, $res);
    }

    /**
     * Tests the newDeletingSMSRequest() method.
     *
     * @return void
     */
    public function testNewDeletingSMSRequest() {

        // Set a Deleting SMS mock.
        $deletingSMS = $this->getMockBuilder(DeletingSMSInterface::class)->getMock();

        $res = SMSModeFactory::newDeletingSMSRequest($deletingSMS);
        $this->assertInstanceOf(DeletingSMSRequest::class, $res);
    }

    /**
     * Tests the newDeletingSubAccountRequest() method.
     *
     * @return void
     */
    public function testNewDeletingSubAccountRequest() {

        // Set a Deleting sub-account mock.
        $deletingSubAccount = $this->getMockBuilder(DeletingSubAccountInterface::class)->getMock();

        $res = SMSModeFactory::newDeletingSubAccountRequest($deletingSubAccount);
        $this->assertInstanceOf(DeletingSubAccountRequest::class, $res);
    }

    /**
     * Tests the newDeliveryReportRequest() method.
     *
     * @return void
     */
    public function testNewDeliveryReportRequest() {

        // Set a Delivery report mock.
        $deliveryReport = $this->getMockBuilder(DeliveryReportInterface::class)->getMock();

        $res = SMSModeFactory::newDeliveryReportRequest($deliveryReport);
        $this->assertInstanceOf(DeliveryReportRequest::class, $res);
    }

    /**
     * Tests the newRetrievingSMSReplyRequest() method.
     *
     * @return void
     */
    public function testNewRetrievingSMSReplyRequest() {

        // Set a Retrieving SMS reply mock.
        $retrievingSMSReply = $this->getMockBuilder(RetrievingSMSReplyInterface::class)->getMock();

        $res = SMSModeFactory::newRetrievingSMSReplyRequest($retrievingSMSReply);
        $this->assertInstanceOf(RetrievingSMSReplyRequest::class, $res);
    }

    /**
     * Tests the newSendingSMSBatchRequest() method.
     *
     * @return void
     */
    public function testNewSendingSMSBatchRequest() {

        // Set a Sending SMS batch mock.
        $sendingSMSBatch = $this->getMockBuilder(SendingSMSBatchInterface::class)->getMock();

        $res = SMSModeFactory::newSendingSMSBatchRequest($sendingSMSBatch);
        $this->assertInstanceOf(SendingSMSBatchRequest::class, $res);
    }

    /**
     * Tests the newSendingSMSMessageRequest() method.
     *
     * @return void
     */
    public function testNewSendingSMSMessageRequest() {

        // Set a Sending SMS message mock.
        $sendingSMSMessage = $this->getMockBuilder(SendingSMSMessageInterface::class)->getMock();

        $res = SMSModeFactory::newSendingSMSMessageRequest($sendingSMSMessage);
        $this->assertInstanceOf(SendingSMSMessageRequest::class, $res);
    }

    /**
     * Tests the newSendingTextToSpeechSMSRequest() method.
     *
     * @return void
     */
    public function testNewSendingTextToSpeechSMSRequest() {

        // Set a Sending text-to-speech SMS mock.
        $sendingTextToSpeechSMS = $this->getMockBuilder(SendingTextToSpeechSMSInterface::class)->getMock();

        $res = SMSModeFactory::newSendingTextToSpeechSMSRequest($sendingTextToSpeechSMS);
        $this->assertInstanceOf(SendingTextToSpeechSMSRequest::class, $res);
    }

    /**
     * Tests the newSendingUnicodeSMSRequest() method.
     *
     * @return void
     */
    public function testNewSendingUnicodeSMSRequest() {

        // Set a Sending unicode SMS mock.
        $sendingUnicodeSMS = $this->getMockBuilder(SendingUnicodeSMSInterface::class)->getMock();

        $res = SMSModeFactory::newSendingUnicodeSMSRequest($sendingUnicodeSMS);
        $this->assertInstanceOf(SendingUnicodeSMSRequest::class, $res);
    }

    /**
     * Tests the newSentSMSMessageListRequest() method.
     *
     * @return void
     */
    public function testNewSentSMSMessageListRequest() {

        // Set a Sent SMS message list mock.
        $sentSMSMessageList = $this->getMockBuilder(SentSMSMessageListInterface::class)->getMock();

        $res = SMSModeFactory::newSentSMSMessageListRequest($sentSMSMessageList);
        $this->assertInstanceOf(SentSMSMessageListRequest::class, $res);
    }

    /**
     * Tests the newTransferringCreditsRequest() method.
     *
     * @return void
     */
    public function testNewTransferringCreditsRequest() {

        // Set a Transferring credits mock.
        $transferringCredits = $this->getMockBuilder(TransferringCreditsInterface::class)->getMock();

        $res = SMSModeFactory::newTransferringCreditsRequest($transferringCredits);
        $this->assertInstanceOf(TransferringCreditsRequest::class, $res);
    }
}
