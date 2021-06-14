<?php

namespace Wvandeweyer\Flash;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Wvandeweyer\Flash\Flash
 */
class FlashFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'flash';
    }
}
