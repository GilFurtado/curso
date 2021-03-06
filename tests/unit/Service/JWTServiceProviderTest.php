<?php

use CodeExperts\Service\JWTServiceProvider;
use Silex\Application;

class JWTServiceProviderTest extends \PHPUnit_Framework_TestCase
{
    public function testIfProviderHasWorking(){
        $app = new Application();
        $app->register(new JWTServiceProvider(), [
            'iss' => 'http://exemple.com',
            'secret' => 'xyzxyz',
            'exprires' => 3600,
            'signer' => 'HMACS',
            'jti' => '4f1g23a12aa'
        ]);

        $this->assertInstanceOf('CodeExperts\Security\Token', $app['jwt']);
    }
}