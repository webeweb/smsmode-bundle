<?php

/*
 * This file is part of the smsmode-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\SMSModeBundle\Tests\DependencyInjection;

use Exception;
use Symfony\Component\DependencyInjection\Exception\ServiceNotFoundException;
use WBW\Bundle\SMSModeBundle\DependencyInjection\Configuration;
use WBW\Bundle\SMSModeBundle\DependencyInjection\WBWSMSModeExtension;
use WBW\Bundle\SMSModeBundle\EventListener\SMSModeEventListener;
use WBW\Bundle\SMSModeBundle\Tests\AbstractTestCase;

/**
 * sMsmode extension test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\SMSModeBundle\Tests\DependencyInjection
 */
class WBWSMSModeExtensionTest extends AbstractTestCase {

    /**
     * Configs.
     *
     * @var array
     */
    private $configs;

    /**
     * {@inheritDoc}
     */
    protected function setUp() {
        parent::setUp();

        // Set a configs array mock.
        $this->configs = [
            WBWSMSModeExtension::EXTENSION_ALIAS => [
                "authentication"  => [
                    "access_token" => null,
                    "pseudo"       => null,
                    "pass"         => null,
                ],
                "event_listeners" => true,
            ],
        ];
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function test__construct() {

        $this->assertEquals("wbw_smsmode", WBWSMSModeExtension::EXTENSION_ALIAS);
    }

    /**
     * Tests the getAlias() method.
     *
     * @return void
     */
    public function testGetAlias() {

        $obj = new WBWSMSModeExtension();

        $this->assertEquals(WBWSMSModeExtension::EXTENSION_ALIAS, $obj->getAlias());
    }

    /**
     * Tests the getConfiguration() method.
     *
     * @return void
     */
    public function testGetConfiguration() {

        $obj = new WBWSMSModeExtension();

        $this->assertInstanceOf(Configuration::class, $obj->getConfiguration([], $this->containerBuilder));
    }

    /**
     * Tests the load() method.
     *
     * @return void
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testLoad() {

        $obj = new WBWSMSModeExtension();

        $this->assertNull($obj->load($this->configs, $this->containerBuilder));

        // Event listeners
        $this->assertInstanceOf(SMSModeEventListener::class, $this->containerBuilder->get(SMSModeEventListener::SERVICE_NAME));
    }

    /**
     * Tests the load() method.
     *
     * @return void
     */
    public function testLoadWithoutEventListeners() {

        // Set the configs mock.
        $this->configs[WBWSMSModeExtension::EXTENSION_ALIAS]["event_listeners"] = false;

        $obj = new WBWSMSModeExtension();

        $this->assertNull($obj->load($this->configs, $this->containerBuilder));

        try {

            $this->containerBuilder->get(SMSModeEventListener::SERVICE_NAME);
        } catch (Exception $ex) {

            $this->assertInstanceOf(ServiceNotFoundException::class, $ex);
            $this->assertContains(SMSModeEventListener::SERVICE_NAME, $ex->getMessage());
        }
    }
}
