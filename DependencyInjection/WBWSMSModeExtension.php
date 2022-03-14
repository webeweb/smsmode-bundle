<?php

/*
 * This file is part of the smsmode-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\SMSModeBundle\DependencyInjection;

use Symfony\Component\Config\Definition\ConfigurationInterface;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use WBW\Bundle\CoreBundle\Config\ConfigurationHelper;

/**
 * sMsmode extension.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\SMSModeBundle\DependencyInjection
 */
class WBWSMSModeExtension extends Extension {

    /**
     * Extension alias.
     *
     * @var string
     */
    const EXTENSION_ALIAS = "wbw_smsmode";

    /**
     * {@inheritDoc}
     */
    public function getAlias(): string {
        return self::EXTENSION_ALIAS;
    }

    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container): void {

        $fileLocator = new FileLocator(__DIR__ . "/../Resources/config");

        $serviceLoader = new YamlFileLoader($container, $fileLocator);
        $serviceLoader->load("controllers.yml");
        $serviceLoader->load("services.yml");

        /** @var ConfigurationInterface $configuration */
        $configuration = $this->getConfiguration($configs, $container);

        $config = $this->processConfiguration($configuration, $configs);

        if (true === $config["event_listeners"]) {
            $serviceLoader->load("event_listeners.yml");
        }

        if (true === array_key_exists("authentication", $config)) {
            ConfigurationHelper::registerContainerParameter($container, $config["authentication"], "smsmode", "access_token");
            ConfigurationHelper::registerContainerParameter($container, $config["authentication"], "smsmode", "pseudo");
            ConfigurationHelper::registerContainerParameter($container, $config["authentication"], "smsmode", "pass");
        }

        ConfigurationHelper::registerContainerParameter($container, $config, $this->getAlias(), "event_listeners");
    }
}
