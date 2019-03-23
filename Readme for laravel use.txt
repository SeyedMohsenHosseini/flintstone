/**
 * Created Laravel package by Seyedmohsen Hosseini.
 * User: smh
 * email : h.hosseini.sm@outlook.com
 * Date: 23/03/2019
 * Time: 01:36 AM
 */


To use this Laravel Package Add the following line to app.php on config folder:

providers -> smh\Flintstone\FlintstoneServiceProvider::class, 

aliases -> 'Flintstone' => \smh\Flintstone\FlintstoneFacade::class,

then run command php artisan vendor:publish

you can set flintstone config on .env or not

for example enter to .env:

FlintstoneDatabaseName=flientstoneDB
FlintstoneConfig_dir=/storage/app
FlintstoneConfig_ext=.dat
FlintstoneConfig_gzip=true
FlintstoneConfig_cache=true
 
if you don't set env, flintstone set by default with confif\flintstone.php 
also if you need to database formatter set this property in confif\flintstone.php
for example
"formatter"=>new Json_formatter(); 

example to use:

 F = new Flintstone();
 F->set('key','value');
 echo F->get('key');

or 

F = new Flintstone('filename',$option=[
	"dir" => base_path('/storage/app'),
        "ext"=>".dat",
        "gzip"=>"false",
        "cache"=>"ture",
        "formatter"=>"null",
]);
 F->set('key','value');
 echo F->get('key');

to more example see : https://www.xeweb.net/flintstone

best regard.