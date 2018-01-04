<?php

namespace CodeExperts\Controller;

use CodeExperts\Entity\User;
use CodeExperts\Service\EMService;
use CodeExperts\Service\PasswordService;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerBuilder;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class SubscriptionController extends BaseController
{
    public function index($event_id, Request $request)
    {
        $doctrine = $this->app['orm.em'];

        $userId = $request->request->get('user_id');

        $user = $doctrine
                ->getRepository('CodeExperts\Entity\User')
                ->find($userId);

        $event = $doctrine
                ->getRepository('CodeExperts\Entity\User')
                ->find($event_id);

        $event->setUserCollection($user);
        $user->setEventCollection($event);

        $doctrine->persist($event);
        $doctrine->persist($user);

        $doctrine->flush();

        return $this->app->json(['msg' => 'Subscrition with success']);

    }
}