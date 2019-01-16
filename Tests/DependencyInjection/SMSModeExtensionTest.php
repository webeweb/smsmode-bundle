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

use WBW\Bundle\SMSModeBundle\DependencyInjection\SMSModeExtension;
use WBW\Bundle\SMSModeBundle\Tests\AbstractTestCase;

/**
 * sMsmode extension test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\SMSModeBundle\Tests\DependencyInjection
 */
class SMSModeExtensionTest extends AbstractTestCase {

    /**
     * Tests the load() method.
     *
     * @return void
     */
    public function testLoad() {

        $obj = new SMSModeExtension();

        $this->assertNull($obj->load([], $this->containerBuilder));
    }
}
