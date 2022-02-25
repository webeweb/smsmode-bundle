<?php

/*
 * This file is part of the smsmode-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\SMSModeBundle;

use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use WBW\Bundle\SMSModeBundle\DependencyInjection\WBWSMSModeExtension;

/**
 * sMsmode bundle.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\SMSModeBundle
 */
class WBWSMSModeBundle extends Bundle {

    /**
     * {@inheritDoc}
     */
    public function getContainerExtension(): Extension {
        return new WBWSMSModeExtension();
    }
}
