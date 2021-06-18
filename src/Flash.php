<?php

namespace Wvandeweyer\Flash;

use BadMethodCallException;
use Illuminate\Contracts\Session\Session;
use Livewire\Component;

/** @mixin \Wvandeweyer\Flash\Flash */
class Flash
{
    public function __construct(protected Session $session, public Message $message)
    {
    }

    public function __get(string $name)
    {
        return $this->getMessage()->$name ?? null;
    }

    public function getMessage(): ?Message
    {
        $flashedMessageProperties = $this->session->get(config('flash.sessionKey'));

        if (! $flashedMessageProperties) {
            return null;
        }

        return new Message(
            $flashedMessageProperties['content'],
            $flashedMessageProperties['level'],
            $flashedMessageProperties['dismissable'],
        );
    }

    public function dismissable() : Flash
    {
        $this->message->dismissable = true;
        $this->saveToSession();

        return $this;
    }

    public function saveToSession()
    {
        return $this->session->flash(config('flash.sessionKey'), $this->message->toArray());
    }

    public function livewire(Component $livewire) : Flash
    {
        $livewire->emit('flashMessageAdded', $this->message->toArray());

        return $this;
    }

    /**
     * Magic __call: pass the method name called as the message type if it is configured
     */
    public function __call(mixed $method, mixed $arguments) : Flash
    {
        if (! in_array($method, array_keys(config('flash.styles')))) {
            throw new BadMethodCallException();
        }

        $this->message->level = $method;

        if ($arguments[0]) {
            $this->message->content = $arguments[0];
        }

        $this->saveToSession();

        return $this;
    }
}
