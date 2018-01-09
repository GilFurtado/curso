<?php

namespace CodeExperts;

use CodeExperts\Entity\Event;
use CodeExperts\Entity\User;
use CodeExperts\Service\EMService;
use CodeExperts\Service\PasswordService;
use Doctrine\ORM\Tools\SchemaTool;
use GuzzleHttp\Client;

class FunctionalTestCase extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $em = $this->getEntityManagerTest();

        $tool = new SchemaTool($em);

        $classes = $em->getMetadataFactory()->getAllMetadata();

        $tool->createSchema($classes);

        parent::setup();
    }

    public function tearDown()
    {
        $em = $this->getEntityManagerTest();

        $tool = new SchemaTool($em);

        $classes = $em->getMetadataFactory()->getAllMetadata();

        $tool->dropSchema($classes);

        parent::tearDown();
    }

    public function getEntityManagerTest()
    {
        $entity = require __DIR__ . '/../tests/bootstrap.php';

        return $entity;
    }

    public function createUser()
    {
        $password = new PasswordService();
        $password = $password->setPassword('123456')
                             ->generate();

        $user = new User();

        $user->setName('Name Test');
        $user->setEmail('email@test.com');
        $user->setPassword($password);
        $user->setUsername('test');
        $user->setIsActive(true);
        $user->setCreatedAt(new \DateTime("now", new \DateTimeZone("America/Sao_Paulo")));
        $user->setUpdatedAt(new \DateTime("now", new \DateTimeZone("America/Sao_Paulo")));

        $emService = new EMService($this->getEntityManagerTest());

        return $emService->create($user);

    }

    public function createEvent()
    {

        $event = new Event();

        $event->setTitle('Event');
        $event->setDescription('Description Event');
        $event->setContent('Content Event');
        $event->setVenue('Las Vegas');
        $event->setAddress('Address');
        $event->setStartDate('2017-10-10');
        $event->setEndDate('2017-10-10');
        $event->setStartTime('09:00');
        $event->setEndTime('22:00');
        $event->setIsActive(true);
        $event->setCreatedAt(new \DateTime("now", new \DateTimeZone("America/Sao_Paulo")));
        $event->setUpdatedAt(new \DateTime("now", new \DateTimeZone("America/Sao_Paulo")));

        $emService = new EMService($this->getEntityManagerTest());

        return $emService->create($event);
    }

    public function createClient()
    {
        $client = new Client(array(
           'base_uri' => 'http://localhost:8000',
           'request.options' => array(
               'exceptions' => false,
           ),
           'http_errors' => false
        ));

        return $client;
    }

    protected function makeLogin()
    {
        $client = $this->createClient();

        $credentials = [
          'email' => 'emailTest@gmail.com',
          'password' => '123456'
        ];

        $reponse = $client->request('POST', '/auth/login', [
            'form_params' => $credentials
        ]);

        return $reponse;
    }
}