<?php
/**
 * Created by PhpStorm.
 * User: gilsi
 * Date: 09/01/2018
 * Time: 11:14
 */

namespace CodeExperts\Functional\Controller;

use CodeExperts\FunctionalTestCase;

class AuthControllerTest extends FunctionalTestCase
{
    public function testIfAuthenticationWithSuccess()
    {
        $response = $this->makeLogin();

        $this->assertEquals(200, $response->getStatusCode());

        $this->assertObjectHasAttribute('token', \GuzzleHttp\json_decode($response->getBody()));
    }

    public function testSendTokenToAccessSpecificRouteNotAlowedWithoutToken()
    {
        $response = $this->makeLogin();

        $token = json_decode($response->getBody())->token;

        $client = $this->createClient();

        $data = array(
          'name' => 'User Test',
          'email' => 'email@email.com',
          'username' => 'userTest',
          'password' => '123456'
        );

        $response = $client->request('POST', '/users', [
            'form_params' => $data,
            'headers' => [
                'Authorization' => 'Bearer' . $token
            ]
        ]);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('User created success', json_decode($response->getBody())->msg);
    }

    public function testSendOfInvalidToken()
    {
        $token = "";

        $client = $this->createClient();

        $data = array(
            'name' => 'User Test',
            'email' => 'email@email.com',
            'username' => 'userTest',
            'password' => '123456'
        );

        $response = $client->request('POST', '/users', [
            'form_params' => $data,
            'headers' => [
                'Authorization' => 'Bearer' . $token
            ]
        ]);

        $this->assertEquals(401, $response->getStatusCode());
        $this->assertEquals('Invalid Token!', json_decode($response->getBody())->msg);
    }
}