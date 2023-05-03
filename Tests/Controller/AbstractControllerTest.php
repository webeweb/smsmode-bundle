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

use Symfony\Component\HttpFoundation\Request;
use WBW\Bundle\SmsModeBundle\Tests\AbstractTestCase;
use WBW\Bundle\SmsModeBundle\Tests\Fixtures\Controller\TestController;
use WBW\Library\SmsMode\Model\DeliveryReportCallback;
use WBW\Library\SmsMode\Model\SmsReplyCallback;

/**
 * Abstract controller test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\SmsModeBundle\Tests\Controller
 */
class AbstractControllerTest extends AbstractTestCase {

    /**
     * Test newSmsReplyCallback()
     *
     * @return void
     */
    public function testNewDeliveryReportCallback(): void {

        // Set a Request mock.
        $request = new Request([
            "numero"         => "33601020304",
            "date_reception" => "2010-03-25 09:52:17",
            "statut"         => "11",
            "smsID"          => "S7EpYZ5kmS87",
            "refClient"      => "12azer34",
            "mcc_mnc"        => "20801",
        ]);

        $obj = new TestController();

        $res = $obj->newDeliveryReportCallback($request);
        $this->assertInstanceOf(DeliveryReportCallback::class, $res);

        $this->assertEquals("2010-03-25 09:52:17", $res->getDateReception()->format("Y-m-d H:i:s"));
        $this->assertEquals("20801", $res->getMccMnc());
        $this->assertEquals("33601020304", $res->getNumero());
        $this->assertEquals("12azer34", $res->getRefClient());
        $this->assertEquals("S7EpYZ5kmS87", $res->getSmsID());
        $this->assertEquals(11, $res->getStatus());
    }

    /**
     * Test newSmsReplyCallback()
     *
     * @return void
     */
    public function testNewSmsReplyCallback(): void {

        // Set a Request mock.
        $request = new Request([
            "numero"         => "36034",
            "message"        => "bonjour",
            "emetteur"       => "33601020304",
            "date_reception" => "01012013-122233",
            "smsID"          => "abcd1234",
            "refClient"      => "monclient123",
            "responseID"     => "azertyu123",
        ]);

        $obj = new TestController();

        $res = $obj->newSmsReplyCallback($request);
        $this->assertInstanceOf(SmsReplyCallback::class, $res);

        $this->assertEquals("2013-01-01 12:22:33", $res->getDateReception()->format("Y-m-d H:i:s"));
        $this->assertEquals("33601020304", $res->getEmetteur());
        $this->assertEquals("bonjour", $res->getMessage());
        $this->assertEquals("36034", $res->getNumero());
        $this->assertEquals("monclient123", $res->getRefClient());
        $this->assertEquals("azertyu123", $res->getResponseID());
    }
}
