<?php

/*
 * This file is part of the smsmode-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\SMSModeBundle\Factory;

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
 * sMsmode factory.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\SMSModeBundle\Factory
 */
class SMSModeFactory {

    /**
     * Creates an adding contact request.
     *
     * @param AddingContactInterface $addingContact The adding contact.
     * @return AddingContactRequest Returns the adding contact request.
     */
    public static function newAddingContactRequest(AddingContactInterface $addingContact) {

        $model = new AddingContactRequest();

        return $model;
    }

    /**
     * Creates a checking SMS message status request.
     *
     * @param CheckingSMSMessageStatusInterface $checkingSMSMessageStatus the checking SMS message status.
     * @return CheckingSMSMessageStatusRequest Returns the checking SMS message status request.
     */
    public static function newCheckingSMSMessageStatusRequest(CheckingSMSMessageStatusInterface $checkingSMSMessageStatus) {

        $model = new CheckingSMSMessageStatusRequest();

        return $model;
    }

    /**
     * Creates a creating sub-account request.
     *
     * @param CreatingSubAccountInterface $creatingSubAccount the creating sub-account.
     * @return CreatingSubAccountRequest Returns the creating sub-account request.
     */
    public static function newCreatingSubAccountRequest(CreatingSubAccountInterface $creatingSubAccount) {

        $model = new CreatingSubAccountRequest();

        return $model;
    }

    /**
     * Creates a deleting SMS request.
     *
     * @param DeletingSMSInterface $deletingSMS the deleting SMS.
     * @return DeletingSMSRequest Returns the deleting SMS request.
     */
    public static function newDeletingSMSRequest(DeletingSMSInterface $deletingSMS) {

        $model = new DeletingSMSRequest();

        return $model;
    }

    /**
     * Creates a deleting sub-account request.
     *
     * @param DeletingSubAccountInterface $deletingSubAccount the deleting sub-account.
     * @return DeletingSubAccountRequest Returns the deleting sub-account status request.
     */
    public static function newDeletingSubAccountRequest(DeletingSubAccountInterface $deletingSubAccount) {

        $model = new DeletingSubAccountRequest();

        return $model;
    }

    /**
     * Creates a delivery report request.
     *
     * @param DeliveryReportInterface $deliveryReport the delivery report.
     * @return DeliveryReportRequest Returns the delivery report request.
     */
    public static function newDeliveryReportRequest(DeliveryReportInterface $deliveryReport) {

        $model = new DeliveryReportRequest();

        return $model;
    }

    /**
     * Creates a retrieving SMS reply request.
     *
     * @param RetrievingSMSReplyInterface $retrievingSMSReply the retrieving SMS reply.
     * @return RetrievingSMSReplyRequest Returns the retrieving SMS reply request.
     */
    public static function newRetrievingSMSReplyRequest(RetrievingSMSReplyInterface $retrievingSMSReply) {

        $model = new RetrievingSMSReplyRequest();

        return $model;
    }

    /**
     * Creates a sending SMS batch request.
     *
     * @param SendingSMSBatchInterface $sendingSMSBatch the sending SMS batch.
     * @return SendingSMSBatchRequest Returns the sending SMS batch request.
     */
    public static function newSendingSMSBatchRequest(SendingSMSBatchInterface $sendingSMSBatch) {

        $model = new SendingSMSBatchRequest();

        return $model;
    }

    /**
     * Creates a sending SMS message request.
     *
     * @param SendingSMSMessageInterface $sendingSMSMessage the sending SMS message.
     * @return SendingSMSMessageRequest Returns the sending SMS message request.
     */
    public static function newSendingSMSMessageRequest(SendingSMSMessageInterface $sendingSMSMessage) {

        $model = new SendingSMSMessageRequest();

        return $model;
    }

    /**
     * Creates a sending text-to-speech SMS request.
     *
     * @param SendingTextToSpeechSMSInterface $sendingTextToSpeechSMS the sending text-to-speech SMS.
     * @return SendingTextToSpeechSMSRequest Returns the sending text-to-speech SMS request.
     */
    public static function newSendingTextToSpeechSMSRequest(SendingTextToSpeechSMSInterface $sendingTextToSpeechSMS) {

        $model = new SendingTextToSpeechSMSRequest();

        return $model;
    }

    /**
     * Creates a sending unicode SMS request.
     *
     * @param SendingUnicodeSMSInterface $sendingUnicodeSMS the sending unicode SMS.
     * @return SendingUnicodeSMSRequest Returns the sending unicode SMS request.
     */
    public static function newSendingUnicodeSMSRequest(SendingUnicodeSMSInterface $sendingUnicodeSMS) {

        $model = new SendingUnicodeSMSRequest();

        return $model;
    }

    /**
     * Creates a sent SMS message list request.
     *
     * @param SentSMSMessageListInterface $sentSMSMessageList the sent SMS message list.
     * @return SentSMSMessageListRequest Returns the sent SMS message list request.
     */
    public static function newSentSMSMessageListRequest(SentSMSMessageListInterface $sentSMSMessageList) {

        $model = new SentSMSMessageListRequest();

        return $model;
    }

    /**
     * Creates a transferring credits request.
     *
     * @param TransferringCreditsInterface $transferringCredits the transferring credits.
     * @return TransferringCreditsRequest Returns the transferring credits request.
     */
    public static function newTransferringCreditsRequest(TransferringCreditsInterface $transferringCredits) {

        $model = new TransferringCreditsRequest();

        return $model;
    }
}
