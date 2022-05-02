DOCUMENTATION
=============

Create an event listener in the `src/AppBundle/EventListener` directory of your project:

```php
namespace AppBundle\EventListener;

use WBW\Bundle\SmsModeBundle\Event\DeliveryReportCallbackEvent;
use WBW\Bundle\SmsModeBundle\Event\SmsReplyCallbackEvent;

class SmsEventListener {

    /**
     * On delivery report callback.
     *
     * @param DeliveryReportCallbackEvent $event The event.
     * @return DeliveryReportCallbackEvent Returns the event.
     */
    public function onDeliveryReportCallback(DeliveryReportCallbackEvent $event) {

        $deliveryReportCallback = $event->getDeliveryReportCallback();

        // YOUR CODE HERE 

        return $event;
    }

    /**
     * On SMS reply callback.
     *
     * @param SmsReplyCallbackEvent $event The event.
     * @return SmsReplyCallbackEvent Returns the event.
     */
    public function onSmsReplyCallback(SmsReplyCallbackEvent $event) {

        $smsReplyCallback = $event->getSmsReplyCallback();

        // YOUR CODE HERE 

        return $event;
    }
}
```

Add this event listener in `app/config/services.yml` file of your project:

```yml
services:

    app.smsmode.event_listener:
        class: AppBundle\EventListener\SmsEventListener
        tags:
            - { name: "kernel.event_listener", event: "wbw.smsmode.event.delivery_report_callback", method: "onDeliveryReportCallback" }
            - { name: "kernel.event_listener", event: "wbw.smsmode.event.sms_reply_callback",       method: "onSmsReplyCallback" }
```

1) Authentication

Add this parameters in the `app/config/config.yml` file of your project:

```yml
parameters:

    # Set a couple login/password
    smsmode.pseudo: "pseudo"
    smsmode.pass:   "pass"
    
    # or use an access token
    #smsmode.token:  "token"
```

Creating an API key :

Add the following code in a command or controller class:

```php
// Create a creating API key event.
$event = new CreatingApiKeyEvent();

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

2) Sending SMS message

Add the following code in a command or controller class:

> IMPORTANT NOTICE:
>
> The following $model must implement SendingSmsMessageInterface.
>
> $model->getSmsModeNotificationUrl() must return the generated route 'wbw_smsmode_delivery_report_callback'
> if you want receive callback into the event listener.
>
> $model->getSmsModeNotificationUrlReponse() must return the generated route 'wbw_smsmode_reply_callback'
> if you want receive callback into the event listener.

```php
// Create a sending SMS message event.
$event = new SendingSmsMessageEvent($model); 

// Get the event dispatcher and dispatch the event.
$this->get("event_dispatcher")->dispatch($event->getEventName(), $event);

// Handle the response.
$response = $event->getResponse();

$response->getCode();
$response->getDescription();

$response->getSmsID();
```

3) Delivery report

Add the following code in a command or controller class:

> IMPORTANT NOTICE:
>
> The following $model must implement DeliveryReportInterface.

```php
// Create a delivery report event.
$event = new DeliveryReportEvent($model); 

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

4) Account balance

Add the following code in a command or controller class:

```php
// Create a account balance event.
$event = new AccountBalanceEvent();

// Get the event dispatcher and dispatch the event.
$this->get("event_dispatcher")->dispatch($event->getEventName(), $event);

// Handle the response.
$response = $event->getResponse();

$response->getCode();
$response->getDescription();

$response->getAccountBalance();
```

5) Creating sub-account

Add the following code in a command or controller class:

> IMPORTANT NOTICE:
>
> The following $model must implement CreatingSubAccountInterface.

```php
// Create a creating sub-account event.
$event = new CreatingSubAccountEvent($model);

// Get the event dispatcher and dispatch the event.
$this->get("event_dispatcher")->dispatch($event->getEventName(), $event);

// Handle the response.
$response = $event->getResponse();

$response->getCode();
$response->getDescription();
```

Deleting sub-account :

> IMPORTANT NOTICE:
>
> The following $model must implement DeletingSubAccountInterface.

```php
// Create a deleting sub-account API key event.
$event = new DeletingSubAccountEvent($model);

// Get the event dispatcher and dispatch the event.
$this->get("event_dispatcher")->dispatch($event->getEventName(), $event);

// Handle the response.
$response = $event->getResponse();

$response->getCode();
$response->getDescription();
```

6) Transferring credits from one account to another

Add the following code in a command or controller class:

> IMPORTANT NOTICE:
>
> The following $model must implement TransferringCreditsInterface.

```php
// Create a transferring credits event.
$event = new TransferringCreditsEvent($model);

// Get the event dispatcher and dispatch the event.
$this->get("event_dispatcher")->dispatch($event->getEventName(), $event);

// Handle the response.
$response = $event->getResponse();

$response->getCode();
$response->getDescription();
```

7) Adding contacts

Add the following code in a command or controller class:

> IMPORTANT NOTICE:
>
> The following $model must implement AddingContactInterface.

```php
// Create an adding contact event.
$event = new AddingContactEvent($model);

// Get the event dispatcher and dispatch the event.
$this->get("event_dispatcher")->dispatch($event->getEventName(), $event);

// Handle the response.
$response = $event->getResponse();

$response->getCode();
$response->getDescription();
```

8) Deleting SMS

Add the following code in a command or controller class:

> IMPORTANT NOTICE:
>
> The following $model must implement DeletingSmsInterface.

```php
// Create a deleting SMS event.
$event = new DeletingSmsEvent($model);

// Get the event dispatcher and dispatch the event.
$this->get("event_dispatcher")->dispatch($event->getEventName(), $event);

// Handle the response.
$response = $event->getResponse();

$response->getCode();
$response->getDescription();
```

9) Sent SMS message list

Add the following code in a command or controller class:

> IMPORTANT NOTICE:
>
> The following $model must implement SentSmsMessageListInterface.

```php
// Create a sent SMS message list event.
$event = new SentSmsMessageListEvent($model);

// Get the event dispatcher and dispatch the event.
$this->get("event_dispatcher")->dispatch($event->getEventName(), $event);

// Handle the response.
$response = $event->getResponse();

$response->getCode();
$response->getDescription();

foreach($response->getSentSmsMessages() as $current) {
    $current->getSmsID();
    $current->getSendDate();
    $current->getMessage();
    $current->getNumero();
    $current->getCostCredits();
    $current->getRecipientCount();
}
```

10) Checking SMS message status

Add the following code in a command or controller class:

> IMPORTANT NOTICE:
>
> The following $model must implement CheckingSmsMessageStatusInterface.

```php
// Create a checking SMS message status event.
$event = new CheckingSmsMessageStatusEvent($model);

// Get the event dispatcher and dispatch the event.
$this->get("event_dispatcher")->dispatch($event->getEventName(), $event);

// Handle the response.
$response = $event->getResponse();

$response->getCode();
$response->getDescription();
```

11) Retrieving SMS replies

Add the following code in a command or controller class:

> IMPORTANT NOTICE:
>
> The following $model must implement RetrievingSmsReplyInterface.

```php
// Create a retrieving SMS reply event.
$event = new RetrievingSmsReplyEvent($model);

// Get the event dispatcher and dispatch the event.
$this->get("event_dispatcher")->dispatch($event->getEventName(), $event);

// Handle the response.
$response = $event->getResponse();

$response->getCode();
$response->getDescription();

foreach($response->getSmsReplies() as $current) {
    $current->getResponseID();
    $current->getReceptionDate();
    $current->getFrom();
    $current->getText();
    $current->getTo();
    $current->getMessageID();
}
```

12) Sending text-to-speech SMS

Add the following code in a command or controller class:

> IMPORTANT NOTICE:
>
> The following $model must implement SendingTextToSpeechSmsInterface.

```php
// Create a sending text-to-speech SMS event.
$event = new SendingTextToSpeechSmsEvent($model);

// Get the event dispatcher and dispatch the event.
$this->get("event_dispatcher")->dispatch($event->getEventName(), $event);

// Handle the response.
$response = $event->getResponse();

$response->getCode();
$response->getDescription();

$response->getSmsID();
```

13) Sending unicode SMS

Add the following code in a command or controller class:

> IMPORTANT NOTICE:
>
> The following $model must implement SendingUnicodeSmsInterface.
>
> $model->getSmsModeNotificationUrl() must return the generated route 'wbw_smsmode_delivery_report_callback'
> if you want receive callback into the event listener.
>
> $model->getSmsModeNotificationUrlReponse() must return the generated route 'wbw_smsmode_reply_callback'
> if you want receive callback into the event listener.

```php
// Create a sending unicode SMS event.
$event = new SendingUnicodeSmsEvent($model);

// Get the event dispatcher and dispatch the event.
$this->get("event_dispatcher")->dispatch($event->getEventName(), $event);

// Handle the response.
$response = $event->getResponse();

$response->getCode();
$response->getDescription();

$response->getSmsID();
```

14) Sending SMS in batch mode (attached file)

Add the following code in a command or controller class:

> IMPORTANT NOTICE:
>
> The following $model must implement SendingSmsBatchInterface.
>
> $model->getSmsModeNotificationUrl() must return the generated route 'wbw_smsmode_delivery_report_callback'
> if you want receive callback into the event listener.

```php
// Create a sending SMS batch event.
$event = new SendingSmsBatchEvent($model);

// Get the event dispatcher and dispatch the event.
$this->get("event_dispatcher")->dispatch($event->getEventName(), $event);

// Handle the response.
$response = $event->getResponse();

$response->getCode();
$response->getDescription();

$response->getCampagneID();
```
