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

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use WBW\Bundle\SMSModeBundle\Event\DeliveryReportCallbackEvent;
use WBW\Bundle\SMSModeBundle\Event\SMSReplyCallbackEvent;

/**
 * Default controller.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\SMSModeBundle\Controller
 */
class DefaultController extends AbstractController {

    /**
     * Service name.
     *
     * @var string
     */
    const SERVICE_NAME = "wbw.smsmode.controller.smsmode.default";

    /**
     * Delivery report callback.
     *
     * @param Request $request The request.
     * @return Response Returns the response.
     */
    public function deliveryReportCallbackAction(Request $request): Response {

        $deliveryReportCallback = $this->newDeliveryReportCallback($request);

        $event = new DeliveryReportCallbackEvent($deliveryReportCallback);
        $this->dispatchEvent($event->getEventName(), $event);

        return new JsonResponse(["code" => 200, "message" => "OK"]);
    }

    /**
     * SMS reply callback.
     *
     * @param Request $request The request.
     * @return Response Returns the response.
     */
    public function smsReplyCallbackAction(Request $request): Response {

        $smsReplyCallback = $this->newSMSReplyCallback($request);

        $event = new SMSReplyCallbackEvent($smsReplyCallback);
        $this->dispatchEvent($event->getEventName(), $event);

        return new JsonResponse(["code" => 200, "message" => "OK"]);
    }
}
