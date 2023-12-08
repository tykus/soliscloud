<?php

namespace Tykus\SolisCloud\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Tykus\SolisCloud\SolisCloud
 */
class SolisCloud extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'soliscloud';
    }
}
