<?php

namespace CodeExperts\Entity;

use CodeExperts\Entity\Contract\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping AS ORM;
use JMS\Serializer\Annotation AS JMS;

/**
 * @ORM\Table("events")
 * @ORM\Entity
 */

class Event implements Entity
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
    private $Title;
    /**
     * @JMS\Groups({"list"})
     * @ORM\Column(type="string")
     */
    private $Description;
    /**
     * @JMS\Groups({"list"})
     * @ORM\Column(type="text")
     */
    private $Content;
    /**
     * @JMS\Groups({"list"})
     * @ORM\Column(type="string")
     */
    private $Venue;
    /**
     * @JMS\Groups({"list"})
     * @ORM\Column(type="string")
     */
    private $Address;
    /**
     * @JMS\Groups({"list"})
     * @ORM\Column(type="string")
     */
    private $StartDate;
    /**
     * @JMS\Groups({"list"})
     * @ORM\Column(type="string")
     */
    private $EndDate;
    /**
     * @JMS\Groups({"list"})
     * @ORM\Column(type="string")
     */
    private $StartTime;
    /**
     * @JMS\Groups({"list"})
     * @ORM\Column(type="string")
     */
    private $EndTime;
    /**
     * @ORM\Column(type="boolean")
     */
    private $IsActive;
    /**@JMS\Groups({"list"})
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
     * @ORM\ManyToMany(targetEntity="User", inversedBy="eventCollection", cascade={"ALL"})
     */

    private $userCollection;

    public function __construct()
    {
        $this->userCollection = new ArrayCollection();
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
    public function getTitle()
    {
        return $this->Title;
    }

    /**
     * @param mixed $Title
     */
    public function setTitle($Title)
    {
        $this->Title = $Title;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->Description;
    }

    /**
     * @param mixed $Description
     */
    public function setDescription($Description)
    {
        $this->Description = $Description;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->Content;
    }

    /**
     * @param mixed $Content
     */
    public function setContent($Content)
    {
        $this->Content = $Content;
    }

    /**
     * @return mixed
     */
    public function getVenue()
    {
        return $this->Venue;
    }

    /**
     * @param mixed $Venue
     */
    public function setVenue($Venue)
    {
        $this->Venue = $Venue;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->Address;
    }

    /**
     * @param mixed $Address
     */
    public function setAddress($Address)
    {
        $this->Address = $Address;
    }

    /**
     * @return mixed
     */
    public function getStartDate()
    {
        return $this->StartDate;
    }

    /**
     * @param mixed $StartDate
     */
    public function setStartDate($StartDate)
    {
        $this->StartDate = $StartDate;
    }

    /**
     * @return mixed
     */
    public function getEndDate()
    {
        return $this->EndDate;
    }

    /**
     * @param mixed $EndDate
     */
    public function setEndDate($EndDate)
    {
        $this->EndDate = $EndDate;
    }

    /**
     * @return mixed
     */
    public function getStartTime()
    {
        return $this->StartTime;
    }

    /**
     * @param mixed $StartTime
     */
    public function setStartTime($StartTime)
    {
        $this->StartTime = $StartTime;
    }

    /**
     * @return mixed
     */
    public function getEndTime()
    {
        return $this->EndTime;
    }

    /**
     * @param mixed $EndTime
     */
    public function setEndTime($EndTime)
    {
        $this->EndTime = $EndTime;
    }

    /**
     * @return mixed
     */
    public function getisActive()
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
    public function getUserCollection()
    {
        return $this->userCollection;
    }

    /**
     * @param ArrayCollection $userCollection
     * @return ArrayCollection/Event
     */
    public function setUserCollection($userCollection)
    {
        if ($this->userCollection->contains($userCollection)){
            return;
        }

        $this->userCollection->add($userCollection);

        return $this;
    }
}