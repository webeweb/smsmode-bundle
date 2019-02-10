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
        $model->setDate($addingContact->getSMSModeDate());
        $model->setGroupes($addingContact->getSMSModeGroupes());
        $model->setMobile($addingContact->getSMSModeMobile());
        $model->setNom($addingContact->getSMSModeNom());
        $model->setOther($addingContact->getSMSModeOther());
        $model->setPrenom($addingContact->getSMSModePrenom());
        $model->setSociete($addingContact->getSMSModeSociete());

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
        $model->setSmsID($checkingSMSMessageStatus->getSMSModeSmsID());

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
        $model->setAdresse($creatingSubAccount->getSMSModeAdresse());
        $model->setCodePostal($creatingSubAccount->getSMSModeCodePostal());
        $model->setDate($creatingSubAccount->getSMSModeDate());
        $model->setEmail($creatingSubAccount->getSMSModeEmail());
        $model->setFax($creatingSubAccount->getSMSModeFax());
        $model->setMobile($creatingSubAccount->getSMSModeMobile());
        $model->setNewPass($creatingSubAccount->getSMSModeNewPass());
        $model->setNewPseudo($creatingSubAccount->getSMSModeNewPseudo());
        $model->setNom($creatingSubAccount->getSMSModeNom());
        $model->setPrenom($creatingSubAccount->getSMSModePrenom());
        $model->setReference($creatingSubAccount->getSMSModeReference());
        $model->setSociete($creatingSubAccount->getSMSModeSociete());
        $model->setTelephone($creatingSubAccount->getSMSModeTelephone());
        $model->setVille($creatingSubAccount->getSMSModeVille());

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
        $model->setNumero($deletingSMS->getSMSModeNumero());
        $model->setSmsID($deletingSMS->getSMSModeSmsID());

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
        $model->setPseudoToDelete($deletingSubAccount->getSMSModePseudoToDelete());

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
        $model->setSmsID($deliveryReport->getSMSModeSmsID());

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
        $model->setOffset($retrievingSMSReply->getSMSModeOffset());
        $model->setEndDate($retrievingSMSReply->getSMSModeEndDate());
        $model->setStart($retrievingSMSReply->getSMSModeStart());
        $model->setStartDate($retrievingSMSReply->getSMSModeStartDate());

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
        $model->setClasseMsg($sendingSMSBatch->getSMSModeClasseMsg());
        $model->setDateEnvoi($sendingSMSBatch->getSMSModeDateEnvoi());
        $model->setEmetteur($sendingSMSBatch->getSMSModeEmetteur());
        $model->setFichier($sendingSMSBatch->getSMSModeFichier());
        $model->setNbrMsg($sendingSMSBatch->getSMSModeNbrMsg());
        $model->setNotificationUrl($sendingSMSBatch->getSMSModeNotificationUrl());
        $model->setRefClient($sendingSMSBatch->getSMSModeRefClient());

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
        $model->setClasseMsg($sendingSMSMessage->getSMSModeClasseMsg());
        $model->setDateEnvoi($sendingSMSMessage->getSMSModeDateEnvoi());
        $model->setEmetteur($sendingSMSMessage->getSMSModeEmetteur());
        $model->setGroupe($sendingSMSMessage->getSMSModeGroupe());
        $model->setMessage($sendingSMSMessage->getSMSModeMessage());
        foreach($sendingSMSMessage->getSMSModeNumero() as $current) {
            $model->addNumero($current);
        }
        $model->setNbrMsg($sendingSMSMessage->getSMSModeNbrMsg());
        $model->setNotificationUrl($sendingSMSMessage->getSMSModeNotificationUrl());
        $model->setNotificationUrlReponse($sendingSMSMessage->getSMSModeNotificationUrlReponse());
        $model->setRefClient($sendingSMSMessage->getSMSModeRefClient());
        $model->setStop($sendingSMSMessage->getSMSModeStop());

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
        $model->setDateEnvoi($sendingTextToSpeechSMS->getSMSModeDateEnvoi());
        $model->setLanguage($sendingTextToSpeechSMS->getSMSModeLanguage());
        $model->setMessage($sendingTextToSpeechSMS->getSMSModeMessage());
        foreach($sendingTextToSpeechSMS->getSMSModeNumero() as $current) {
            $model->addNumero($current);
        }
        $model->setTitle($sendingTextToSpeechSMS->getSMSModeTitle());

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
        $model->setClasseMsg($sendingUnicodeSMS->getSMSModeClasseMsg());
        $model->setDateEnvoi($sendingUnicodeSMS->getSMSModeDateEnvoi());
        $model->setEmetteur($sendingUnicodeSMS->getSMSModeEmetteur());
        $model->setGroupe($sendingUnicodeSMS->getSMSModeGroupe());
        $model->setMessage($sendingUnicodeSMS->getSMSModeMessage());
        foreach($sendingUnicodeSMS->getSMSModeNumero() as $current) {
            $model->addNumero($current);
        }
        $model->setNbrMsg($sendingUnicodeSMS->getSMSModeNbrMsg());
        $model->setNotificationUrl($sendingUnicodeSMS->getSMSModeNotificationUrl());
        $model->setNotificationUrlReponse($sendingUnicodeSMS->getSMSModeNotificationUrlReponse());
        $model->setRefClient($sendingUnicodeSMS->getSMSModeRefClient());
        $model->setStop($sendingUnicodeSMS->getSMSModeStop());

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
        $model->setOffset($sentSMSMessageList->getSMSModeOffset());

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
        $model->setCreditAmount($transferringCredits->getSMSModeCreditAmount());
        $model->setReference($transferringCredits->getSMSModeReference());
        $model->setTargetPseudo($transferringCredits->getSMSModeTargetPseudo());

        return $model;
    }
}
