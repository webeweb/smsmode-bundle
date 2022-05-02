<?php

/*
 * This file is part of the smsmode-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\SmsModeBundle\Controller;

use DateTime;
use Symfony\Component\HttpFoundation\Request;
use WBW\Bundle\CoreBundle\Controller\AbstractController as BaseController;
use WBW\Library\SmsMode\Model\DeliveryReportCallback;
use WBW\Library\SmsMode\Model\SmsReplyCallback;

/**
 * Abstract controller.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\SmsModeBundle\Controller
 * @abstract
 */
abstract class AbstractController extends BaseController {

    /**
     * Creates a delivery report callback.
     *
     * @param Request $request The request.
     * @return DeliveryReportCallback Returns the delivery report callback.
     */
    protected function newDeliveryReportCallback(Request $request): DeliveryReportCallback {

        $dateReception = DateTime::createFromFormat("Y-m-d H:i:s", $request->query->get(DeliveryReportCallback::PARAMETER_DATE_RECEPTION));

        $model = new DeliveryReportCallback();
        $model->setDateReception(false !== $dateReception ? $dateReception : null);
        $model->setMccMnc($request->query->get(DeliveryReportCallback::PARAMETER_MCC_MNC));
        $model->setNumero($request->query->get(DeliveryReportCallback::PARAMETER_NUMERO));
        $model->setRefClient($request->query->get(DeliveryReportCallback::PARAMETER_REF_CLIENT));
        $model->setSmsID($request->query->get(DeliveryReportCallback::PARAMETER_SMS_ID));
        $model->setStatus($request->query->getInt(DeliveryReportCallback::PARAMETER_STATUT));

        return $model;
    }

    /**
     * Creates a SMS reply callback.
     *
     * @param Request $request The request.
     * @return SmsReplyCallback Returns the Sms reply callback.
     */
    protected function newSmsReplyCallback(Request $request): SmsReplyCallback {

        $dateReception = DateTime::createFromFormat("dmY-His", $request->query->get(SmsReplyCallback::PARAMETER_DATE_RECEPTION));

        $model = new SmsReplyCallback();
        $model->setDateReception(false !== $dateReception ? $dateReception : null);
        $model->setEmetteur($request->query->get(SmsReplyCallback::PARAMETER_EMETTEUR));
        $model->setMessage($request->query->get(SmsReplyCallback::PARAMETER_MESSAGE));
        $model->setNumero($request->query->get(SmsReplyCallback::PARAMETER_NUMERO));
        $model->setRefClient($request->query->get(SmsReplyCallback::PARAMETER_REF_CLIENT));
        $model->setResponseID($request->query->get(SmsReplyCallback::PARAMETER_RESPONSE_ID));
        $model->setSmsID($request->query->get(SmsReplyCallback::PARAMETER_SMS_ID));

        return $model;
    }
}
