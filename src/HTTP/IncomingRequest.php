<?php

namespace Michalsn\CodeIgniterHtmx\HTTP;

use CodeIgniter\HTTP\IncomingRequest as BaseIncomingRequest;

class IncomingRequest extends BaseIncomingRequest
{
    /**
     * Indicates that the request is triggered by Htmx.
     */
    public function isHtmx(): bool
    {
        return $this->getHtmxHeaderToBool('HX-Request');
    }

    /**
     * Indicates that the request is via an element using hx-boost.
     */
    public function isBoosted(): bool
    {
        return $this->getHtmxHeaderToBool('HX-Boosted');
    }

    /**
     * True if the request is for history restoration
     * after a miss in the local history cache.
     */
    public function isHistoryRestoreRequest(): bool
    {
        return $this->getHtmxHeaderToBool('HX-History-Restore-Request');
    }

    /**
     * The current URL of the browser.
     */
    public function getCurrentUrl(): ?string
    {
        return $this->getHtmxHeader('HX-Current-Url');
    }

    /**
     * The user response to an hx-prompt.
     */
    public function getPrompt(): ?string
    {
        return $this->getHtmxHeader('HX-Prompt');
    }

    /**
     * The id of the target element if it exists.
     */
    public function getTarget(): ?string
    {
        return $this->getHtmxHeader('HX-Target');
    }

    /**
     * The id of the triggered element if it exists.
     */
    public function getTrigger(): ?string
    {
        return $this->getHtmxHeader('HX-Trigger');
    }

    /**
     * The name of the triggered element if it exists.
     */
    public function getTriggerName(): ?string
    {
        return $this->getHtmxHeader('HX-Trigger-Name');
    }

    /**
     * The value of the header is a JSON serialized
     * version of the event that triggered the request.
     *
     * @see https://htmx.org/extensions/event-header/
     *
     * @return array|object|null
     */
    public function getTriggeringEvent(bool $toArray = true)
    {
        if (! $this->hasHeader('Triggering-Event')) {
            return null;
        }

        return json_decode($this->header('Triggering-Event')->getValueLine(), $toArray);
    }

    /**
     * Helper method to get the Htmx header value
     */
    private function getHtmxHeader(string $header): ?string
    {
        if (! $this->hasHeader($header)) {
            return null;
        }

        return $this->header($header)->getValueLine();
    }

    /**
     * Helper method to cast Htmx header to bool
     */
    private function getHtmxHeaderToBool(string $header): bool
    {
        return $this->hasHeader($header)
            && $this->header($header)->getValueLine() === 'true';
    }
}
