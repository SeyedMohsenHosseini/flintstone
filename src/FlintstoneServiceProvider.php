<?php
/**
 * Created by PhpStorm.
 * User: RSH
 * Date: 21/03/2019
 * Time: 09:24 AM
 */

namespace smh\Flintstone;

use \Illuminate\Support\ServiceProvider;

class FlintstoneServiceProvider extends ServiceProvider
{
    public function register()
    {
		$this->app->bind('Flintstone',function (){
            return new Flintstone();
        });

        // add config file
        $this->mergeConfigFrom(__DIR__.'/Config/main.php','flintstone');
    }

    public function boot(){

        // add config file to laravel/config with vendor:publishes command

        $this->publishes([
            __DIR__.'/Config/main.php'=>config_path('flintstone.php')
        ],'config');
    }
}