<?php

namespace CodeExperts\Functional\Controller;

use CodeExperts\FunctionalTestCase;

class EventControllerTest extends FunctionalTestCase
{
    public function testAInsertNewEvent()
    {
        $client = $this->createClient();

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

        $response = $client->request("POST", "/events", [[
            'form_params' => $data
        ]]);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('Event created with success', json_decode($response->getBody())->msg);
    }

    public function testGetAllEvents()
    {
        $client = $this->createClient();

        $response = $client->request('GET', '/events');

        $this->assertEquals(200, $response->getStatusCode());

        $this->assertObjectHasAttribute('title', json_decode($response->getBody())[0]);
        $this->assertObjectHasAttribute('content', json_decode($response->getBody())[0]);
        $this->assertObjectHasAttribute('description', json_decode($response->getBody())[0]);
        $this->assertObjectHasAttribute('venue', json_decode($response->getBody())[0]);
        $this->assertObjectHasAttribute('address', json_decode($response->getBody())[0]);
        $this->assertObjectHasAttribute('start_date', json_decode($response->getBody())[0]);
        $this->assertObjectHasAttribute('end_date', json_decode($response->getBody())[0]);
        $this->assertObjectHasAttribute('start_time', json_decode($response->getBody())[0]);
        $this->assertObjectHasAttribute('end_time', json_decode($response->getBody())[0]);
    }

    public function testGetASpecificEvent()
    {
        $client = $this->createClient();

        $events = $client->request('GET', '/events');

        $id = json_decode($events->getBody())[0]->id;

        $response = $client->request('GET', '/events/'.$id);

        $this->assertEquals(200, $response->getStatusCode());

        $this->assertObjectHasAttribute('title', json_decode($response->getBody())[0]);
        $this->assertObjectHasAttribute('content', json_decode($response->getBody())[0]);
        $this->assertObjectHasAttribute('description', json_decode($response->getBody())[0]);
        $this->assertObjectHasAttribute('venue', json_decode($response->getBody())[0]);
        $this->assertObjectHasAttribute('address', json_decode($response->getBody())[0]);
        $this->assertObjectHasAttribute('start_date', json_decode($response->getBody())[0]);
        $this->assertObjectHasAttribute('end_date', json_decode($response->getBody())[0]);
        $this->assertObjectHasAttribute('start_time', json_decode($response->getBody())[0]);
        $this->assertObjectHasAttribute('end_time', json_decode($response->getBody())[0]);
    }

    public function testUpdateAEvent()
    {
        $client = $this->createClient();

        $events = $client->request('GET', '/events');

        $id = json_decode($events->getBody())[0]->id;

        $dataUpdate = array(
            'title' => 'Forum php updated',
            'content' => 'forum php content updated',
            'description' => 'forum forum php updated',
            'venue' => 'local updated',
            'address' => 'endereco updated',
            'start_date' => '2015-11-18',
            'end_date' => '2016-11-10',
            'start_time' => '09:00',
            'end_time' => '22:00'
        );

        $response = $client->request('PUT', '/events', [
            'form_params' => $dataUpdate
        ]);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('Event updated with success', json_decode($response->getBody())->msg);
    }

    public function testDeleteAEvent()
    {
        $client = $this->createClient();

        $events = $client->request('GET', '/events');

        $id = json_decode($events->getBody())[0]->id;

        $response = $client->request('DELETE', '/events/'.$id);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('Event deleted with success', json_decode($response->getBody())->msg);
    }
}