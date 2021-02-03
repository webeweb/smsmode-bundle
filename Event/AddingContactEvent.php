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

use WBW\Bundle\SMSModeBundle\WBWSMSModeEvents;
use WBW\Library\SMSMode\Entity\AddingContactInterface;
use WBW\Library\SMSMode\Model\Request\AddingContactRequest;
use WBW\Library\SMSMode\Model\Response\AddingContactResponse;

/**
 * Adding contact event.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\SMSModeBundle\Event
 */
class AddingContactEvent extends AbstractEvent {

    /**
     * Constructor.
     *
     * @param AddingContactInterface $addingContact The adding contact.
     */
    public function __construct(AddingContactInterface $addingContact) {
        parent::__construct(WBWSMSModeEvents::ADDING_CONTACT, $addingContact);
    }

    /**
     * Get the adding contact.
     *
     * @return AddingContactInterface|null Returns the adding contact.
     */
    public function getAddingContact(): ?AddingContactInterface {
        return $this->getEntity();
    }

    /**
     * Get the adding contact request.
     *
     * @return AddingContactRequest|null Returns the adding contact request.
     */
    public function getRequest(): ?AddingContactRequest {
        return parent::getRequest();
    }

    /**
     * Get the adding contact response.
     *
     * @return AddingContactResponse|null Returns the adding contact response.
     */
    public function getResponse(): ?AddingContactResponse {
        return parent::getResponse();
    }
}
