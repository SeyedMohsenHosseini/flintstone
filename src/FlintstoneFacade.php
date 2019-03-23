<?php
/**
 * Created by PhpStorm.
 * User: RSH
 * Date: 22/03/2019
 * Time: 06:29 AM
 */

namespace smh\Flintstone;


use Illuminate\Support\Facades\Facade;

class FlintstoneFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'Flintstone';
    }
}