<?php

namespace Wvandeweyer\Flash;

use Illuminate\Contracts\Session\Session;

/** @mixin \Spatie\Flash\Message */
class Flash
{
    protected Session $session;
    public $message;

    public function __construct(Session $session, Message $message)
    {
        $this->session = $session;
        $this->message = $message;
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
        );
    }

    public function success(string $content) : Flash
    {
        $this->message->level = 'success';

        if ($content) {
            $this->message->content = $content;
        }

        return $this;
    }

    public function warning(string $content) : Flash
    {
        $this->message->level = 'warning';

        if ($content) {
            $this->message->content = $content;
        }

        return $this;
    }

    public function error(string $content) : Flash
    {
        $this->message->level = 'error';

        if ($content) {
            $this->message->content = $content;
        }

        return $this;
    }

    public function info(string $content) : Flash
    {
        $this->message->level = 'info';

        if ($content) {
            $this->message->content = $content;
        }

        return $this;
    }

    public function echo()
    {
        return $this->session->flash('laravel_flash_message', $this->message->toArray());
    }
}
