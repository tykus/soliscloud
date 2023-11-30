<?php

namespace Tykus\SolisCloud;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Tykus\SolisCloud\SolisCloud
 */
class SolisCloudFacade extends Facade
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
