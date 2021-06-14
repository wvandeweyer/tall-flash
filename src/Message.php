<?php

namespace Wvandeweyer\Flash;

class Message
{
    public function __construct(
        public string $content = '',
        public string $level = 'info',
    ) {
    }

    public function toArray() : array
    {
        return [
            'content' => $this->content,
            'level' => $this->level,
        ];
    }
}
