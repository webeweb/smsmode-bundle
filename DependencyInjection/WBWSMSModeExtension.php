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

/**
 * sMsmode extension.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\SMSModeBundle\DependencyInjection
 */
class WBWSMSModeExtension extends Extension {

    /**
     * {@inheritDoc}
     */
    public function getAlias(){
        return "wbw_smsmode";
    }

    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container) {

        $fileLocator = new FileLocator(__DIR__ . "/../Resources/config");

        $serviceLoader = new YamlFileLoader($container, $fileLocator);
        $serviceLoader->load("services.yml");

        /** @var ConfigurationInterface $configuration */
        $configuration = $this->getConfiguration($configs, $container);

        $config = $this->processConfiguration($configuration, $configs);

        if (true === array_key_exists("authentication", $config)) {
            if (true === array_key_exists("access_token", $config["authentication"])) {
                $container->setParameter("smsmode.access_token", $config["authentication"]["access_token"]);
            }
            if (true === array_key_exists("pseudo", $config["authentication"])) {
                $container->setParameter("smsmode.pseudo", $config["authentication"]["pseudo"]);
            }
            if (true === array_key_exists("pass", $config["authentication"])) {
                $container->setParameter("smsmode.pass", $config["authentication"]["pass"]);
            }
        }

        if (true === $config["event_listeners"]) {
            $serviceLoader->load("event_listeners.yml");
        }
    }
}
