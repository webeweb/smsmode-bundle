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
 * Deleting sub-account interface.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\SMSModeBundle\Entity
 */
interface DeletingSubAccountInterface {

    /**
     * Get the pseudo to delete.
     *
     * @return string Returns the pseudo to delete.
     */
    public function getSMSModePseudoToDelete();
}
