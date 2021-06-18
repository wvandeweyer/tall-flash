<?php

namespace Wvandeweyer\Flash;

class Message
{
    public string $content;
    public string $level;
    public ?bool $dismissable;


    public function __construct(
        string $content = '',
        string $level = 'info',
        ?bool $dismissable = null,
    ) {
        $this->content = $content;
        $this->level = $level;
        $this->dismissable = $dismissable ?? config('flash.defaults.dismissable', true);
    }

    public function toArray() : array
    {
        return [
            'content' => $this->content,
            'level' => $this->level,
            'dismissable' => $this->dismissable,
        ];
    }
}
