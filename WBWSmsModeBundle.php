<?php

/*
 * This file is part of the smsmode-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\SmsModeBundle;

use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use WBW\Bundle\SmsModeBundle\DependencyInjection\WBWSmsModeExtension;

/**
 * sMsmode bundle.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\SmsModeBundle
 */
class WBWSmsModeBundle extends Bundle {

    /**
     * {@inheritdoc}
     */
    public function getContainerExtension(): Extension {
        return new WBWSmsModeExtension();
    }
}
