# IncomingRequest

Available methods:

- [isHtmx()](#ishtmx)
- [isBoosted()](#isboosted)
- [isHistoryRestoreRequest()](#ishistoryrestorerequest)
- [getCurrentUrl()](#getcurrenturl)
- [getPrompt()](#getprompt)
- [getTarget()](#gettarget)
- [getTrigger()](#gettrigger)
- [getTriggerName()](#gettriggername)
- [getTriggeringEvent()](#gettriggeringevent)

### isHtmx()

Checks if there is a `HX-Request` header in place.
Indicates that the request was fired with htmx.

```php
$this->request->isHtmx();
```

### isBoosted()

Checks if there is a `HX-Boosted` header in place.
Indicates that the request is via an element using [hx-boost](https://htmx.org/attributes/hx-boost)

```php
$this->request->isBoosted();
```

### isHistoryRestoreRequest()

Checks if there is a `HX-History-Restore-Request` header in place.
True if the request is for history restoration after a miss in the local history cache.

```php
$this->request->isHistoryRestoreRequest();
```

### getCurrentUrl()

Checks the `HX-Current-URL` header and return current URL of the browser.

```php
$this->request->getCurrentUrl();
```

### getPrompt()

Checks the `HX-Prompt` header - the user response to an [hx-prompt](https://htmx.org/attributes/hx-prompt/).

```php
$this->request->getPrompt();
```

### getTarget()

Checks the `HX-Target` header. Returns the `id` of the target element if it exists.

```php
$this->request->getTarget();
```

### getTrigger()

Checks the `HX-Trigger` header. Returns the `id` of the triggered element if it exists.

```php
$this->request->getTrigger();
```

### getTriggerName()

Checks the `HX-Trigger-Name` header. Returns the `name` of the triggered element if it exists.

```php
$this->request->getTriggerName();
```

### getTriggeringEvent()

Checks the `Triggering-Event` header. The value of the header is a JSON serialized version of the event that triggered the request.
Check the [event-header](https://htmx.org/extensions/event-header/) plugin for more information.
