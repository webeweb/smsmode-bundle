<?php

/*
 * This file is part of the smsmode-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\SMSModeBundle\Event;

use WBW\Bundle\SMSModeBundle\Entity\AddingContactInterface;
use WBW\Library\SMSMode\Model\AddingContactResponse;

/**
 * Adding contact event
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\SMSModeBundle\Event
 */
class AddingContactEvent extends AbstractResponseEvent {

    /**
     * Adding contact.
     *
     * @var AddingContactInterface
     */
    private $addingContact;

    /**
     * Constructor.
     *
     * @param AddingContactInterface $addingContact The adding contact.
     */
    public function __construct(AddingContactInterface $addingContact) {
        parent::__construct(SMSModeEvents::ADDING_CONTACT);
    }

    /**
     * Get the adding contact.
     *
     * @return AddingContactInterface Returns the adding contact.
     */
    public function getAddingContact() {
        return $this->addingContact;
    }

    /**
     * Get the adding contact response.
     *
     * @return AddingContactResponse Returns the adding contact response.
     */
    public function getResponse() {
        return parent::getResponse();
    }

    /**
     * Set the adding contact.
     *
     * @param AddingContactInterface $addingContact The adding contact.
     * @return AddingContactEvent Returns this adding contact event.
     */
    protected function setAddingContact(AddingContactInterface $addingContact) {
        $this->addingContact = $addingContact;
        return $this;
    }
}
