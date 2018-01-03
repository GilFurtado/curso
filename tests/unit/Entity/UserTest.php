<?php

namespace CodeExperts\Entity;

class UserTest extends \PHPUnit_Framework_TestCase
{
    public function assertPreConditions()
    {
       $this->assertTrue(class_exists($class = 'CodeExperts\Entity\user'),
           'Class not found: ' . $class);
    }

    public function testIfGettersAndSetterHasWorking()
    {
        $user = new User();

        $user->setName('Name Test');
        $user->setEmail('email@test.com');
        $user->setPassword('123345');
        $user->setUsername('test');
        $user->setIsActive(true);
        $user->setCreatedAt(new \DateTime("now", new \DateTimeZone("America/Sao_Paulo")));
        $user->setUpdatedAt(new \DateTime("now", new \DateTimeZone("America/Sao_Paulo")));

        $this->assertEquals("Name Test", $user->getName());
        $this->assertEquals("email@test.com", $user->getEmail());
        $this->assertEquals("123345", $user->getPassword());
        $this->assertEquals("test", $user->getUsername());
        $this->assertTrue($user->getIsActive());

        $this->assertInstanceOf("\\DateTime", $user->getCreatedAt());
        $this->assertInstanceOf("\\DateTime", $user->getUpdatedAt());
    }
}