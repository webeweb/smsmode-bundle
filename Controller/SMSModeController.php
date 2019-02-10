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
use WBW\Bundle\SMSModeBundle\Event\SMSModeEvents;
use WBW\Bundle\SMSModeBundle\Event\SMSReplyCallbackEvent;

/**
 * sMsmode controller.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\SMSModeBundle\Controller
 */
class SMSModeController extends AbstractController {

    /**
     * Delivery report callback.
     *
     * @param Request $request The request.
     * @return Response Returns the response.
     */
    public function deliveryReportCallbackAction(Request $request) {

        $eventName = SMSModeEvents::DELIVERY_REPORT_CALLBACK;

        $eventDispatcher = $this->getEventDispatcher();
        if (null !== $eventDispatcher && true === $eventDispatcher->hasListeners($eventName)) {

            $this->getLogger()->info(sprintf("sMsmode controller dispatch an event with name \"%s\"", $eventName));

            $deliveryReportCallback = $this->newDeliveryReportCallback($request);

            $event = new DeliveryReportCallbackEvent($deliveryReportCallback);

            $eventDispatcher->dispatch($eventName, $event);
        }

        return new JsonResponse(["code" => 200, "message" => "OK"]);
    }

    /**
     * SMS reply callback.
     *
     * @param Request $request The request.
     * @return Response Returns the response.
     */
    public function smsReplyCallbackAction(Request $request) {

        $eventName = SMSModeEvents::SMS_REPLY_CALLBACK;

        $eventDispatcher = $this->getEventDispatcher();
        if (null !== $eventDispatcher && true === $eventDispatcher->hasListeners($eventName)) {

            $this->getLogger()->info(sprintf("sMsmode controller dispatch an event with name \"%s\"", $eventName));

            $smsReplyCallback = $this->newSMSReplyCallback($request);

            $event = new SMSReplyCallbackEvent($smsReplyCallback);

            $eventDispatcher->dispatch($eventName, $event);
        }

        return new JsonResponse(["code" => 200, "message" => "OK"]);
    }
}
