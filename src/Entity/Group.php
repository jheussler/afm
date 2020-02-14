<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Group
 * @package App\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="`group`")
 */
class Group
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="string", length=32)
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class="App\Service\UniqStringGenerator")
     */
    protected $id;

    /**
     * @var string $name
     * @ORM\Column(type="string")
     */
    protected $name;

    /**
     * @var User[] $users
     * @ORM\ManyToMany(targetEntity="User", mappedBy="group")
     */
    protected $users;

    /**
     * Group constructor.
     */
    public function __construct()
    {
        $this->users = new ArrayCollection();
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
     * @return Group
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Group
     */
    public function setName(string $name): Group
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return User[]
     */
    public function getUsers(): Object
    {
        return $this->users;
    }

    /**
     * @param User[] $users
     * @return Group
     */
    public function setUsers(Object $users): Group
    {
        $this->users = $users;
        return $this;
    }



}
