<?php
/**
 * Created by PhpStorm.
 * User: RSH
 * Date: 21/03/2019
 * Time: 09:37 AM
 */

return [
    'FlintstoneDatabaseName' => (is_string(env('FlintstoneDatabaseName'))
        && strlen(env('FlintstoneDatabaseName')) > 0)?
             env('FlintstoneDatabaseName') : 'Flintston_DB',

    'FlintstoneConfig'=>[
        "dir" => (is_string(env('FlintstoneConfig_dir'))
            && strlen(env('FlintstoneConfig_dir')) > 0) ?
                base_path(env('FlintstoneConfig_dir')): base_path('/storage/app'),

        "ext"=> (
            is_string(env('FlintstoneConfig_ext'))
            && strlen(env('FlintstoneConfig_ext')) > 0) ?
                env('FlintstoneConfig_ext'):'.dat',

        "gzip"=> (is_bool(env('FlintstoneConfig_gzip'))) ?
                env('FlintstoneConfig_gzip'):false ,

        "cache"=>(is_bool(env('FlintstoneConfig_cache'))) ?
                env('FlintstoneConfig_cache'):true ,
        "formatter"=>null
    ],

];