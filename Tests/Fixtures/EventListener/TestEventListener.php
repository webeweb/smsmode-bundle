<?php

/*
 * This file is part of the smsmode-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\SMSModeBundle\Tests\Fixtures\EventListener;

use WBW\Bundle\SMSModeBundle\Event\DeliveryReportCallbackEvent;
use WBW\Bundle\SMSModeBundle\Event\SMSReplyCallbackEvent;

/**
 * Test event listener.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\SMSModeBundle\Tests\Fixtures\EventListener
 */
class TestEventListener {

    /**
     * On delivery report callback.
     *
     * @param DeliveryReportCallbackEvent $event The event.
     * @return DeliveryReportCallbackEvent Returns the event.
     */
    public function onDeliveryReportCallback(DeliveryReportCallbackEvent $event) {
        return $event;
    }

    /**
     * On SMS reply callback.
     *
     * @param SMSReplyCallbackEvent $event The event.
     * @return SMSReplyCallbackEvent Returns the event.
     */
    public function onSMSReplyCallback(SMSReplyCallbackEvent $event) {
        return $event;
    }
}
