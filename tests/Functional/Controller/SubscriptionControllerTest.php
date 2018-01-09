<?php

namespace CodeExperts\Functional\Controller;

use CodeExperts\FunctionalTestCase;

class SubscriptionControllerTest extends FunctionalTestCase
{
    public function testInsertNewSubscription()
    {
        $client = $this->createClient();

        $data = array(
            'name' => 'User Test',
            'emal' => 'email@test.com',
            'username' => 'userTest',
            'password' => '123456'
        );

        $response = $client->request('POST', '/users', [
            'form_params' => $data
        ]);

        $users = $client->request('GET', '/users');

        $userId = json_decode($users->getBody())[0]->id;

        $data = array(
            'title' => 'Forum php',
            'content' => 'forum php content',
            'description' => 'forum forum php',
            'venue' => 'local',
            'address' => 'endereco',
            'start_date' => '2015-11-18',
            'end_date' => '2016-11-10',
            'start_time' => '09:00',
            'end_time' => '22:00'
        );

        $response = $client->request('POST', '/events', [
            'form_params' => $data
        ]);

        $events = $client->request('GET', '/events');

        $eventId = json_decode($events->getBody())[0]->id;

        $response = $client->request('POST', '/events/'.$eventId.'/subscription', [
           'form_params' => ['user_id' => $userId]
        ]);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('Subscrition with success', json_decode($response->getBody())->msg);
    }
}