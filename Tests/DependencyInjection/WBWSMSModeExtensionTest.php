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
use WBW\Bundle\SMSModeBundle\Controller\DefaultController;
use WBW\Bundle\SMSModeBundle\DependencyInjection\Configuration;
use WBW\Bundle\SMSModeBundle\DependencyInjection\WBWSMSModeExtension;
use WBW\Bundle\SMSModeBundle\EventListener\DefaultEventListener;
use WBW\Bundle\SMSModeBundle\Tests\AbstractTestCase;

/**
 * sMsmode extension test.
 *
 * @author webeweb <https://github.com/webeweb>
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
    protected function setUp(): void {
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
     * Tests getAlias()
     *
     * @return void
     */
    public function testGetAlias(): void {

        $obj = new WBWSMSModeExtension();

        $this->assertEquals(WBWSMSModeExtension::EXTENSION_ALIAS, $obj->getAlias());
    }

    /**
     * Tests getConfiguration()
     *
     * @return void
     */
    public function testGetConfiguration(): void {

        $obj = new WBWSMSModeExtension();

        $this->assertInstanceOf(Configuration::class, $obj->getConfiguration([], $this->containerBuilder));
    }

    /**
     * Tests load()
     *
     * @return void
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testLoad(): void {

        $obj = new WBWSMSModeExtension();

        $this->assertNull($obj->load($this->configs, $this->containerBuilder));

        // Controllers
        $this->assertInstanceOf(DefaultController::class, $this->containerBuilder->get(DefaultController::SERVICE_NAME));

        // Event listeners
        $this->assertInstanceOf(DefaultEventListener::class, $this->containerBuilder->get(DefaultEventListener::SERVICE_NAME));
    }

    /**
     * Tests load()
     *
     * @return void
     */
    public function testLoadWithoutEventListeners(): void {

        // Set the configs mock.
        $this->configs[WBWSMSModeExtension::EXTENSION_ALIAS]["event_listeners"] = false;

        $obj = new WBWSMSModeExtension();

        $this->assertNull($obj->load($this->configs, $this->containerBuilder));

        try {

            $this->containerBuilder->get(DefaultEventListener::SERVICE_NAME);
        } catch (Exception $ex) {

            $this->assertInstanceOf(ServiceNotFoundException::class, $ex);
            $this->assertStringContainsString(DefaultEventListener::SERVICE_NAME, $ex->getMessage());
        }
    }

    /**
     * Tests __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("wbw_smsmode", WBWSMSModeExtension::EXTENSION_ALIAS);
    }
}
