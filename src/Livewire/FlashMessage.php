<?php

namespace Wvandeweyer\Flash\Livewire;

use Livewire\Component;

class FlashMessage extends Component
{
    public string $content;
    public string $level = 'info';
    public bool $dismissable = true;

    protected $listeners = ['flashMessageAdded'];

    public function mount()
    {
        // grab any normal flash messages and render them
        $this->content = flash()->content ?? '';
        $this->level = flash()->level ?? 'info';
        $this->dismissable = flash()->dismissable ?? true;

        session()->forget(config('flash.sessionKey'));
    }

    public function render()
    {
        return view('flash::livewire.flash-message');
    }

    public function flashMessageAdded($message)
    {
        $this->content = $message['content'];
        $this->level = $message['level'];
        $this->dismissable = $message['dismissable'];
    }
}
