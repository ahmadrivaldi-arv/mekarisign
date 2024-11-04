<?php

namespace Ahmdrv\MekariSign\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Ahmdrv\MekariSign\MekariSign
 */
class MekariSign extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Ahmdrv\MekariSign\MekariSign::class;
    }
}
