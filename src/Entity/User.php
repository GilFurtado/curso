<?php

namespace CodeExperts\Entity;

use CodeExperts\Entity\Contract\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping AS ORM;
use JMS\Serializer\Annotation AS JMS;

/**
 * @ORM\Table("users")
 * @ORM\Entity
 */

class User implements Entity
{
    /**
     * @JMS\Groups({"list"})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @JMS\Groups({"list"})
     * @ORM\Column(type="string")
     */
    private $name;
    /**
     * @JMS\Groups({"list"})
     * @ORM\Column(type="string")
     */
    private $email;
    /**
     * @ORM\Column(type="string")
     */
    private $password;
    /**
     * @JMS\Groups({"list"})
     * @ORM\Column(type="string")
     */
    private $username;
    /**
     * @ORM\Column(type="boolean")
     */
    private $IsActive;
    /**
     * @JMS\Groups({"list"})
     * @ORM\Column(type="datetime")
     */
    private $CreatedAt;
    /**
     * @JMS\Groups({"list"})
     * @ORM\Column(type="datetime")
     */
    private $UpdatedAt;

    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="Event", mappedBy="userCollection")
     */
    private $eventCollection;

    public function __construct()
    {
        $this->eventCollection = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getIsActive()
    {
        return $this->IsActive;
    }

    /**
     * @param mixed $IsActive
     */
    public function setIsActive($IsActive)
    {
        $this->IsActive = $IsActive;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->CreatedAt;
    }

    /**
     * @param mixed $CreatedAt
     */
    public function setCreatedAt($CreatedAt)
    {
        $this->CreatedAt = $CreatedAt;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->UpdatedAt;
    }

    /**
     * @param mixed $UpdatedAt
     */
    public function setUpdatedAt($UpdatedAt)
    {
        $this->UpdatedAt = $UpdatedAt;
    }

    /**
     * @return ArrayCollection
     */
    public function getEventCollection()
    {
        return $this->eventCollection;
    }

    /**
     * @param ArrayCollection $eventCollection
     * @return ArrayCollection/User
     */
    public function setEventCollection($eventCollection)
    {
        if($this->eventCollection->contains($eventCollection)){
            return;
        }

        $this->eventCollection->add($eventCollection);

        return $this;
    }

}