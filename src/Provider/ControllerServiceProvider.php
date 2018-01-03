<?php

namespace CodeExperts\Provider;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use CodeExperts\Controller\UserController;
use CodeExperts\Controller\EventController;

class ControllerServiceProvider implements ServiceProviderInterface
{
	public function register(Container $app)
	{
		$app["user"] = function(Container $app){
			return new UserController($app);
		};

		$app["event"] = function(Container $app){
			return new EventController($app);
		};
	}
}