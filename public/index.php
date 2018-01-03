<?php

require __DIR__ .'/../vendor/autoload.php';

use Silex\Application;
use CodeExperts\Provider\ControllerServiceProvider;
use CodeExperts\Provider\RouterServiceProvider;

$app = new Application();

$app['debug'] = true;

$app->register(new Silex\Provider\ServiceControllerServiceProvider());
$app->register(new ControllerServiceProvider());
$app->register(new RouterServiceProvider());

/*
$app->get('/', function(){
  return "Hello World com silex";
});
*/

$app->run();
