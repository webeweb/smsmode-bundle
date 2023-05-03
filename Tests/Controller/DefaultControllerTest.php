<?php

/*
 * This file is part of the smsmode-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\SmsModeBundle\Tests\Controller;

use WBW\Bundle\SmsModeBundle\Controller\DefaultController;
use WBW\Bundle\SmsModeBundle\Tests\AbstractWebTestCase;

/**
 * Default controller test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\SmsModeBundle\Tests\Controller
 */
class DefaultControllerTest extends AbstractWebTestCase {

    /**
     * Test deliveryReportCallbackAction()
     *
     * @return void
     */
    public function testDeliveryReportCallbackAction(): void {

        $client = $this->client;

        $client->request("GET", "/delivery-report-callback?numero=33601020304&date_reception=2010-03-25+09%3A52%3A17&statut=11&smsID=S7EpYZ5kmS87&refClient=12azer34&mcc_mnc=20801");
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertEquals("application/json", $client->getResponse()->headers->get("Content-Type"));

        // Check the JSON response.
        $res = json_decode($client->getResponse()->getContent(), true);

        $this->assertArrayHasKey("code", $res);
        $this->assertArrayHasKey("message", $res);

        $this->assertEquals(200, $res["code"]);
        $this->assertEquals("OK", $res["message"]);
    }

    /**
     * Test smsReplyCallbackAction()
     *
     * @return void
     */
    public function testSmsReplyCallbackAction(): void {

        $client = $this->client;

        $client->request("GET", "/sms-reply-callback?numero=36034&message=bonjour&emetteur=33601020304&date_reception=01012013-122233&smsID=abcd1234&refClient=monclient123&responseID=azertyu123");
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertEquals("application/json", $client->getResponse()->headers->get("Content-Type"));

        // Check the JSON response.
        $res = json_decode($client->getResponse()->getContent(), true);

        $this->assertArrayHasKey("code", $res);
        $this->assertArrayHasKey("message", $res);

        $this->assertEquals(200, $res["code"]);
        $this->assertEquals("OK", $res["message"]);
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("wbw.smsmode.controller.default", DefaultController::SERVICE_NAME);
    }
}
