<?php

/*
 * This file is part of the smsmode-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\SMSModeBundle\Entity;

/**
 * Sent SMS message list interface.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\SMSModeBundle\Entity
 */
interface SentSMSMessageListInterface extends SMSModeEntityInterface {

    /**
     * Get the offset.
     *
     * @return int Returns the offset.
     */
    public function getSMSModeOffset();
}
