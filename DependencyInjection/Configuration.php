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

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;
use WBW\Bundle\CoreBundle\Config\ConfigurationHelper;

/**
 * Configuration
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\SMSModeBundle\DependencyInjection
 */
class Configuration implements ConfigurationInterface {

    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder(): TreeBuilder {

        $treeBuilder = new TreeBuilder(WBWSMSModeExtension::EXTENSION_ALIAS);

        $rootNode = ConfigurationHelper::getRootNode($treeBuilder, WBWSMSModeExtension::EXTENSION_ALIAS);
        $rootNode
            ->children()
                ->arrayNode("authentication")->children()
                    ->scalarNode("access_token")->defaultNull()->end()
                    ->scalarNode("pseudo")->defaultNull()->end()
                    ->scalarNode("pass")->defaultNull()->end()
                ->end()
            ->end()
                ->booleanNode("event_listeners")->defaultTrue()->info("Load event listeners")->end()
            ->end();

        return $treeBuilder;
    }

}
