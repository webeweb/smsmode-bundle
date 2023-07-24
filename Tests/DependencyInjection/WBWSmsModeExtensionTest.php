<?php

/*
 * This file is part of the smsmode-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\SmsModeBundle\Tests\DependencyInjection;

use Symfony\Component\DependencyInjection\Exception\ServiceNotFoundException;
use Throwable;
use WBW\Bundle\SmsModeBundle\Controller\DefaultController;
use WBW\Bundle\SmsModeBundle\DependencyInjection\Configuration;
use WBW\Bundle\SmsModeBundle\DependencyInjection\WBWSmsModeExtension;
use WBW\Bundle\SmsModeBundle\EventListener\DefaultEventListener;
use WBW\Bundle\SmsModeBundle\Tests\AbstractTestCase;

/**
 * sMsmode extension test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\SmsModeBundle\Tests\DependencyInjection
 */
class WBWSmsModeExtensionTest extends AbstractTestCase {

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
            WBWSmsModeExtension::EXTENSION_ALIAS => [
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
     * Test getAlias()
     *
     * @return void
     */
    public function testGetAlias(): void {

        $obj = new WBWSmsModeExtension();

        $this->assertEquals(WBWSmsModeExtension::EXTENSION_ALIAS, $obj->getAlias());
    }

    /**
     * Test getConfiguration()
     *
     * @return void
     */
    public function testGetConfiguration(): void {

        $obj = new WBWSmsModeExtension();

        $this->assertInstanceOf(Configuration::class, $obj->getConfiguration([], $this->containerBuilder));
    }

    /**
     * Test load()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testLoad(): void {

        $obj = new WBWSmsModeExtension();

        $this->assertNull($obj->load($this->configs, $this->containerBuilder));

        // Controllers
        $this->assertInstanceOf(DefaultController::class, $this->containerBuilder->get(DefaultController::SERVICE_NAME));

        // Event listeners
        $this->assertInstanceOf(DefaultEventListener::class, $this->containerBuilder->get(DefaultEventListener::SERVICE_NAME));
    }

    /**
     * Test load()
     *
     * @return void
     */
    public function testLoadWithoutEventListeners(): void {

        // Set the configs mock.
        $this->configs[WBWSmsModeExtension::EXTENSION_ALIAS]["event_listeners"] = false;

        $obj = new WBWSmsModeExtension();

        $this->assertNull($obj->load($this->configs, $this->containerBuilder));

        try {

            $this->containerBuilder->get(DefaultEventListener::SERVICE_NAME);
        } catch (Throwable $ex) {

            $this->assertInstanceOf(ServiceNotFoundException::class, $ex);
            $this->assertStringContainsString(DefaultEventListener::SERVICE_NAME, $ex->getMessage());
        }
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("wbw_smsmode", WBWSmsModeExtension::EXTENSION_ALIAS);
    }
}
