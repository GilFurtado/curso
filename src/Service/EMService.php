<?php

namespace CodeExperts\Service;

use CodeExperts\Entity\Contract\Entity;
use CodeExperts\Entity\User;
use CodeExperts\Entity\Event;
use Doctrine\ORM\EntityManager;

class EMService
{
    /**
     * @var EntityManager
     */
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function create($entity)
    {
        if(!$entity instanceof Entity)
            throw new \InvalidArgumentException('Parameter Invalid must be a CodeExperts\Entity\Contract\Entity instance');
        $this->em->persist($entity);
        $this->em->flush();

        return $entity;

    }

    public function update($entity)
    {
        if(!$entity instanceof Entity)
            throw new \InvalidArgumentException('Parameter Invalid must be a CodeExperts\Entity\Contract\Entity instance');
        $this->em->merge($entity);
        $this->em->flush();

        return $entity;

    }

    public function delete($entity)
    {
        if(!$entity instanceof Entity)
            throw new \InvalidArgumentException('Parameter Invalid must be a CodeExperts\Entity\Contract\Entity instance');
        $this->em->remove($entity);
        $this->em->flush();

        return true;

    }

//    public function addSubscription($user = null, $event = null)
//    {
//        if(is_null($user) || is_null($event)){
//            throw new \Exception('Invalid Parameter');
//        }
//
//        $user->setEventsCollection($event);
//        $event->setusersCollection($user);
//
//        $this->em->persist($user);
//        $this->em->persist($event);
//
//        $this->em->flush();
//
//        return true;
//    }
}