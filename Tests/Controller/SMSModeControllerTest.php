<?php

/*
 * This file is part of the smsmode-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\SMSModeBundle\Tests\Controller;

use WBW\Bundle\SMSModeBundle\Controller\SMSModeController;
use WBW\Bundle\SMSModeBundle\Tests\AbstractWebTestCase;

/**
 * sMsmode controller test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\SMSModeBundle\Tests\Controller
 */
class SMSModeControllerTest extends AbstractWebTestCase {

    /**
     * Tests deliveryReportCallbackAction()
     *
     * @return void
     */
    public function testDeliveryReportCallbackAction(): void {

        // Create a client.
        $client = static::createClient();

        // Make a GET request with XML HTTP request.
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
     * Tests smsReplyCallbackAction()
     *
     * @return void
     */
    public function testSmsReplyCallbackAction(): void {

        // Create a client.
        $client = static::createClient();

        // Make a GET request with XML HTTP request.
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
     * Tests __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("wbw.smsmode.controller.smsmode", SMSModeController::SERVICE_NAME);
    }
}
