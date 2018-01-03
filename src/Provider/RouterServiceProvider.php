<?php

namespace CodeExperts\Provider;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class RouterServiceProvider implements ServiceProviderInterface
{
    public function register(Container $app)
    {
        /**
         * User Routes
         */
        $app->get('/users/', 'user:index');
        $app->get('/users/{id}', 'user:get');
        $app->post('/users', 'user:save');
        $app->put('/users', 'user:update');
        $app->delete('/users/{id}', 'user:delete');

        /**
         * Event Routes
         */
        $app->get('/events/', 'event:index');
        $app->get('/events/{id}', 'event:get');
        $app->post('/events', 'event:save');
        $app->put('/events', 'event:update');
        $app->delete('/events/{id}', 'event:delete');


    }

}