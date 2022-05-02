<?php

/*
 * This file is part of the smsmode-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\SmsModeBundle\Tests;

use WBW\Bundle\SmsModeBundle\DependencyInjection\WBWSmsModeExtension;
use WBW\Bundle\SmsModeBundle\WBWSmsModeBundle;

/**
 * sMsmode bundle test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\SmsModeBundle\Tests
 */
class WBWSmsModeBundleTest extends AbstractTestCase {

    /**
     * Tests getContainerExtension()
     *
     * @return void
     */
    public function testGetContainerExtension(): void {

        $obj = new WBWSmsModeBundle();

        $res = $obj->getContainerExtension();
        $this->assertInstanceOf(WBWSmsModeExtension::class, $res);
    }
}
