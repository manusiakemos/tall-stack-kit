<?php

namespace Manusiakemos\TallStackKit\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Manusiakemos\TallStackKit\TallStackKit
 */
class TallStackKit extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'tall-stack-kit';
    }
}
