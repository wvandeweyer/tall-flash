<?php

use Wvandeweyer\Flash\Flash;

function flash(): Flash
{
    /** @var \Wvandeweyer\Flash\Flash $flash */
    return app(Flash::class);
}
