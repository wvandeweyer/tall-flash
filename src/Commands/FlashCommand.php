<?php

namespace Wvandeweyer\Flash\Commands;

use Illuminate\Console\Command;

class FlashCommand extends Command
{
    public $signature = 'tall-flash';

    public $description = 'My command';

    public function handle()
    {
        $this->comment('All done');
    }
}
