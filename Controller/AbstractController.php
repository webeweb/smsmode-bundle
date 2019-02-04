<?php

/*
 * This file is part of the smsmode-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\SMSModeBundle\Controller;

use DateTime;
use Symfony\Component\HttpFoundation\Request;
use WBW\Bundle\CoreBundle\Controller\AbstractController as BaseController;
use WBW\Library\SMSMode\Model\DeliveryReportCallback;
use WBW\Library\SMSMode\Model\SMSReplyCallback;

/**
 * Abstract controller
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\SMSModeBundle\Controller
 * @abstract
 */
abstract class AbstractController extends BaseController {

    /**
     * Creates a Delivery report callback.
     *
     * @param Request $request The request.
     * @return DeliveryReportCallback Returns the delivery report callback.
     */
    protected function newDeliveryReportCallback(Request $request) {

        $dateReception = DateTime::createFromFormat("Y-m-d H:i:s", $request->query->get(DeliveryReportCallback::PARAMETER_DATE_RECEPTION));

        $deliveryReportCallback = new DeliveryReportCallback();
        $deliveryReportCallback->setDateReception(false !== $dateReception ? $dateReception : null);
        $deliveryReportCallback->setMccMnc($request->query->get(DeliveryReportCallback::PARAMETER_MCC_MNC));
        $deliveryReportCallback->setNumero($request->query->get(DeliveryReportCallback::PARAMETER_NUMERO));
        $deliveryReportCallback->setRefClient($request->query->get(DeliveryReportCallback::PARAMETER_REF_CLIENT));
        $deliveryReportCallback->setSmsID($request->query->get(DeliveryReportCallback::PARAMETER_SMS_ID));
        $deliveryReportCallback->setStatus($request->query->getInt(DeliveryReportCallback::PARAMETER_STATUT));

        return $deliveryReportCallback;
    }

    /**
     * Creates a SMS reply callback.
     *
     * @param Request $request The request.
     * @return SMSReplyCallback Returns the SMS reply callback.
     */
    protected function newSMSReplyCallback(Request $request) {

        $dateReception = DateTime::createFromFormat("dmY-His", $request->query->get(SMSReplyCallback::PARAMETER_DATE_RECEPTION));

        $smsReplyCallback = new SMSReplyCallback();
        $smsReplyCallback->setDateReception(false !== $dateReception ? $dateReception : null);
        $smsReplyCallback->setEmetteur($request->query->get(SMSReplyCallback::PARAMETER_EMETTEUR));
        $smsReplyCallback->setMessage($request->query->get(SMSReplyCallback::PARAMETER_MESSAGE));
        $smsReplyCallback->setNumero($request->query->get(SMSReplyCallback::PARAMETER_NUMERO));
        $smsReplyCallback->setRefClient($request->query->get(SMSReplyCallback::PARAMETER_REF_CLIENT));
        $smsReplyCallback->setResponseID($request->query->get(SMSReplyCallback::PARAMETER_RESPONSE_ID));
        $smsReplyCallback->setSmsID($request->query->get(SMSReplyCallback::PARAMETER_SMS_ID));

        return $smsReplyCallback;
    }
}
