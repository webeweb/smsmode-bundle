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

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Throwable;
use WBW\Bundle\SmsModeBundle\Event\DeliveryReportCallbackEvent;
use WBW\Bundle\SmsModeBundle\Event\SmsReplyCallbackEvent;

/**
 * Default controller.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\SmsModeBundle\Controller
 */
class DefaultController extends AbstractController {

    /**
     * Service name.
     *
     * @var string
     */
    const SERVICE_NAME = "wbw.smsmode.controller.default";

    /**
     * Delivery report callback.
     *
     * @param Request $request The request.
     * @return Response Returns the response.
     * @throws Throwable Throws an exception if an error occurs.
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
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function smsReplyCallbackAction(Request $request): Response {

        $smsReplyCallback = $this->newSmsReplyCallback($request);

        $event = new SmsReplyCallbackEvent($smsReplyCallback);
        $this->dispatchEvent($event->getEventName(), $event);

        return new JsonResponse(["code" => 200, "message" => "OK"]);
    }
}
