DOCUMENTATION
=============

1° Authentication
---

Add this parameters in the `app/config/config.yml` file of your project:

```yml
# Set a couple login/password
smsmode.pseudo: "pseudo"
smsmode.pass:   "pass"

# or use an access token
#smsmode.token:  "token"
```

Creating an API key :

Add the following code in a command or controller class:

```php
// Creates a creating API key event.
$event = new CreatingAPIKeyEvent();

// Get the event dispatcher and dispatch the event.
$this->get("event_dispatcher")->dispatch($event->getEventName(), $event);

// Handle the response.
$response = $event->getResponse();

$response->getCode();
$response->getDescription();

$response->getId();
$response->getAccessToken();
$response->getAccount();
$response->getCreationDate();
$response->getExpiration();
$response->getState();
```


2° Sending SMS message
---

Add the following code in a command or controller class:

```php
// Creates a sending SMS message event.
$event = new SendingSMSMessageEvent($model); // $model must be a SendingSMSMessageInterface

// Get the event dispatcher and dispatch the event.
$this->get("event_dispatcher")->dispatch($event->getEventName(), $event);

// Handle the response.
$response = $event->getResponse();

$response->getCode();
$response->getDescription();

$response->getSmsID();
```

3° Delivery report
---

Add the following code in a command or controller class:

```php
// Creates a delivery report event.
$event = new DeliveryReportEvent($model); // $model must be a DeliveryReportInterface

// Get the event dispatcher and dispatch the event.
$this->get("event_dispatcher")->dispatch($event->getEventName(), $event);

// Handle the response.
$response = $event->getResponse();

$response->getCode();
$response->getDescription();

foreach($response->getDeliveryReports() as $current) {
    $current->getCode();
    $current->getNumero();
}
```

4° Account balance
---

Add the following code in a command or controller class:

```php
// Creates a account balance event.
$event = new AccountBalanceEvent();

// Get the event dispatcher and dispatch the event.
$this->get("event_dispatcher")->dispatch($event->getEventName(), $event);

// Handle the response.
$response = $event->getResponse();

$response->getCode();
$response->getDescription();

$response->getAccountBalance();
```

5° Creating sub-account
---

Add the following code in a command or controller class:

```php
// Creates a creating sub-account event.
$event = new CreatingSubAccountEvent($model); // $model must be a CreatingSubAccountInterface

// Get the event dispatcher and dispatch the event.
$this->get("event_dispatcher")->dispatch($event->getEventName(), $event);

// Handle the response.
$response = $event->getResponse();

$response->getCode();
$response->getDescription();
```

Deleting sub-account :

```php
// Creates a deleting sub-account API key event.
$event = new DeletingSubAccountEvent($model); // $model must be a DeletingSubAccountInterface

// Get the event dispatcher and dispatch the event.
$this->get("event_dispatcher")->dispatch($event->getEventName(), $event);

// Handle the response.
$response = $event->getResponse();

$response->getCode();
$response->getDescription();
```

6° Transferring credits from one account to another
---

Add the following code in a command or controller class:

```php
// Creates a transferring credits event.
$event = new TransferringCreditsEvent($model); // $model must be a TransferringCreditsInterface

// Get the event dispatcher and dispatch the event.
$this->get("event_dispatcher")->dispatch($event->getEventName(), $event);

// Handle the response.
$response = $event->getResponse();

$response->getCode();
$response->getDescription();
```

7° Adding contacts
---

Add the following code in a command or controller class:

```php
// Creates an adding contact event.
$event = new AddingContactEvent($model); // $model must be a AddingContactInterface

// Get the event dispatcher and dispatch the event.
$this->get("event_dispatcher")->dispatch($event->getEventName(), $event);

// Handle the response.
$response = $event->getResponse();

$response->getCode();
$response->getDescription();
```

8° Deleting SMS
---

Add the following code in a command or controller class:

```php
// Creates a deleting SMS event.
$event = new DeletingSMSEvent($model); // $model must be a DeletingSMSInterface

// Get the event dispatcher and dispatch the event.
$this->get("event_dispatcher")->dispatch($event->getEventName(), $event);

// Handle the response.
$response = $event->getResponse();

$response->getCode();
$response->getDescription();
```

9° Sent SMS message list
---

Add the following code in a command or controller class:

```php
// Creates a sent SMS message list event.
$event = new SentSMSMessageListEvent($model); // $model must be a SentSMSMessageListInterface

// Get the event dispatcher and dispatch the event.
$this->get("event_dispatcher")->dispatch($event->getEventName(), $event);

// Handle the response.
$response = $event->getResponse();

$response->getCode();
$response->getDescription();

foreach($response->getSentSMSMessages() as $current) {
    $current->getSmsID();
    $current->getSendDate();
    $current->getMessage();
    $current->getNumero();
    $current->getCostCredits();
    $current->getRecipientCount();
}
```

10° Checking SMS message status
---

Add the following code in a command or controller class:

```php
// Creates a checking SMS message status event.
$event = new CheckingSMSMessageStatusEvent($model); // $model must be a CheckingSMSMessageStatusInterface

// Get the event dispatcher and dispatch the event.
$this->get("event_dispatcher")->dispatch($event->getEventName(), $event);

// Handle the response.
$response = $event->getResponse();

$response->getCode();
$response->getDescription();
```

11° Retrieving SMS replies
---

Add the following code in a command or controller class:

```php
// Creates a retrieving SMS reply event.
$event = new RetrievingSMSReplyEvent($model); // $model must be a RetrievingSMSReplyInterface

// Get the event dispatcher and dispatch the event.
$this->get("event_dispatcher")->dispatch($event->getEventName(), $event);

// Handle the response.
$response = $event->getResponse();

$response->getCode();
$response->getDescription();

foreach($response->getSMSReplies() as $current) {
    $current->getResponseID();
    $current->getReceptionDate();
    $current->getFrom();
    $current->getText();
    $current->getTo();
    $current->getMessageID();
}
```

12° Sending text-to-speech SMS
---

Add the following code in a command or controller class:

```php
// Creates a sending text-to-speech SMS event.
$event = new SendingTextToSpeechSMSEvent($model); // $model must be a SendingTextToSpeechSMSInterface

// Get the event dispatcher and dispatch the event.
$this->get("event_dispatcher")->dispatch($event->getEventName(), $event);

// Handle the response.
$response = $event->getResponse();

$response->getCode();
$response->getDescription();

$response->getSmsID();
```

13° Sending unicode SMS
---

Add the following code in a command or controller class:

```php
// Creates a sending unicode SMS event.
$event = new SendingUnicodeSMSEvent($model); // $model must be a SendingUnicodeSMSInterface

// Get the event dispatcher and dispatch the event.
$this->get("event_dispatcher")->dispatch($event->getEventName(), $event);

// Handle the response.
$response = $event->getResponse();

$response->getCode();
$response->getDescription();

$response->getSmsID();
```

14° Sending SMS in batch mode (attached file)
---

Add the following code in a command or controller class:

```php
// Creates a sending SMS batch event.
$event = new SendingSMSBatchEvent($model); // $model must be a SendingSMSBatchInterface

// Get the event dispatcher and dispatch the event.
$this->get("event_dispatcher")->dispatch($event->getEventName(), $event);

// Handle the response.
$response = $event->getResponse();

$response->getCode();
$response->getDescription();

$response->getCampagneID();
```
