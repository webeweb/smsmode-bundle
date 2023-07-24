<?php

/*
 * This file is part of the smsmode-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\SmsModeBundle\Tests\Fixtures\Controller;

use Symfony\Component\HttpFoundation\Request;
use WBW\Bundle\SmsModeBundle\Controller\AbstractController;
use WBW\Library\SmsMode\Model\DeliveryReportCallback;
use WBW\Library\SmsMode\Model\SmsReplyCallback;

/**
 * Test controller.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\SmsModeBundle\Tests\Fixtures\Controller
 */
class TestController extends AbstractController {

    /**
     * {@inheritDoc}
     */
    public function newDeliveryReportCallback(Request $request): DeliveryReportCallback {
        return parent::newDeliveryReportCallback($request);
    }

    /**
     * {@inheritDoc}
     */
    public function newSmsReplyCallback(Request $request): SmsReplyCallback {
        return parent::newSmsReplyCallback($request);
    }
}
