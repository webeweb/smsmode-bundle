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

use DateTime;

/**
 * Sending text-to-speech SMS interface.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\SMSModeBundle\Entity
 */
interface SendingTextToSpeechSMSInterface {

    /**
     * Get the date envoi.
     *
     * @return DateTime Returns the date envoi.
     */
    public function getSMSModeDateEnvoi();

    /**
     * Get the language.
     *
     * @return string Returns the language.
     */
    public function getSMSModeLanguage();

    /**
     * Get the message.
     *
     * @return string Returns the message.
     */
    public function getSMSModeMessage();

    /**
     * Get the numero.
     *
     * @return string[] Returns the numero.
     */
    public function getSMSModeNumero();

    /**
     * Get the title.
     *
     * @return string Returns the title.
     */
    public function getSMSModeTitle();
}
