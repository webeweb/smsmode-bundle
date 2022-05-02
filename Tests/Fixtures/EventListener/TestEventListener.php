<?php

/*
 * This file is part of the smsmode-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\SmsModeBundle\Tests\Fixtures\EventListener;

use WBW\Bundle\SmsModeBundle\Event\DeliveryReportCallbackEvent;
use WBW\Bundle\SmsModeBundle\Event\SmsReplyCallbackEvent;

/**
 * Test event listener.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\SmsModeBundle\Tests\Fixtures\EventListener
 */
class TestEventListener {

    /**
     * On delivery report callback.
     *
     * @param DeliveryReportCallbackEvent $event The event.
     * @return DeliveryReportCallbackEvent Returns the event.
     */
    public function onDeliveryReportCallback(DeliveryReportCallbackEvent $event): DeliveryReportCallbackEvent {
        return $event;
    }

    /**
     * On SMS reply callback.
     *
     * @param SmsReplyCallbackEvent $event The event.
     * @return SmsReplyCallbackEvent Returns the event.
     */
    public function onSmsReplyCallback(SmsReplyCallbackEvent $event): SmsReplyCallbackEvent {
        return $event;
    }
}
