<?php

/*
 * This file is part of the smsmode-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\SMSModeBundle\Tests;

use WBW\Bundle\SMSModeBundle\DependencyInjection\WBWSMSModeExtension;
use WBW\Bundle\SMSModeBundle\WBWSMSModeBundle;

/**
 * sMsmode bundle test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\SMSModeBundle\Tests
 */
class WBWSMSModeBundleTest extends AbstractTestCase {

    /**
     * Tests the getContainerExtension() method.
     *
     * @return void
     */
    public function testGetContainerExtension() {

        $obj = new WBWSMSModeBundle();

        $res = $obj->getContainerExtension();
        $this->assertInstanceOf(WBWSMSModeExtension::class, $res);
    }
}
