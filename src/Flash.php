<?php

namespace Wvandeweyer\Flash;

use Illuminate\Contracts\Session\Session;

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
        $flashedMessageProperties = $this->session->get('laravel_flash_message');

        if (! $flashedMessageProperties) {
            return null;
        }

        return new Message(
            $flashedMessageProperties['content'],
            $flashedMessageProperties['level'],
            $flashedMessageProperties['dismissable'],
        );
    }

    public function success(string $content) : Flash
    {
        $this->message->level = 'success';

        if ($content) {
            $this->message->content = $content;
        }

        $this->saveToSession();

        return $this;
    }

    public function warning(string $content) : Flash
    {
        $this->message->level = 'warning';

        if ($content) {
            $this->message->content = $content;
        }

        $this->saveToSession();

        return $this;
    }

    public function error(string $content) : Flash
    {
        $this->message->level = 'error';

        if ($content) {
            $this->message->content = $content;
        }

        $this->saveToSession();

        return $this;
    }

    public function info(string $content) : Flash
    {
        $this->message->level = 'info';

        if ($content) {
            $this->message->content = $content;
        }

        $this->saveToSession();

        return $this;
    }

    public function dismissable()
    {
        $this->message->dismissable = true;
        $this->saveToSession();

        return $this;
    }

    public function saveToSession()
    {
        return $this->session->flash('laravel_flash_message', $this->message->toArray());
    }
}
