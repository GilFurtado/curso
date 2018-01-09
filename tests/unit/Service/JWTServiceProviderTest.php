<?php

use CodeExperts\Service\JWTServiceProvider;
use Silex\Application;

class JWTServiceProviderTest
{
    public function testIfProviderHasWorking(){
        $app = new Application();
        $app->register(new JWTServiceProvider(), [
            'iss' => 'http://exemple.com',
            'secret' => 'xyzxyz',
            'exprire' => 'HMACS',
            'jti' => '4f1g23a12aa'
        ]);

        $this->assertInstaceOf('CodeExperts\Security\Token', $app['jwt']);
    }
}