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
 * Deleting SMS interface.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\SMSModeBundle\Entity
 */
interface DeletingSMSInterface extends SMSModeEntityInterface {

    /**
     * Get the numero.
     *
     * @return string Returns the numero.
     */
    public function getSMSModeNumero();

    /**
     * Get the SMS ID.
     *
     * @return string Returns the SMS ID.
     */
    public function getSMSModeSmsID();
}
