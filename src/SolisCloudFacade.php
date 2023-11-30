<?php

namespace Tykus\SoliscloudClient;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Tykus\SoliscloudClient\Skeleton\SkeletonClass
 */
class SolisCloudClientFacade extends Facade
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
