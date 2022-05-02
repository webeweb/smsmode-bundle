<?php

/*
 * This file is part of the smsmode-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use WBW\Bundle\CoreBundle\Tests\AbstractKernel;

/**
 * Test kernel.
 *
 * @author webeweb <https://github.com/webeweb>
 */
class TestKernel extends AbstractKernel {

    /**
     * {@inheritdoc}
     */
    public function registerBundles() {
        $bundles = [
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new WBW\Bundle\SmsModeBundle\WBWSmsModeBundle(),
        ];
        return $bundles;
    }
}
