<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Directory
 * @package App\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="directory")
 */
class Directory
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
     * @var User $user
     * @ORM\ManyToOne(targetEntity="User")
     */
    protected $user;

    /**
    * @ORM\ManyToOne(targetEntity="Directory",inversedBy="id")
    * @ORM\JoinColumn(name="parent_id", referencedColumnName="id", nullable=true)
    */
    protected $parent;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Directory
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
     * @return Directory
     */
    public function setName(string $name): Directory
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @param mixed $parent
     * @return Directory
     */
    public function setParent($parent)
    {
        $this->parent = $parent;
        return $this;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param User $user
     * @return Directory
     */
    public function setUser(User $user): Directory
    {
        $this->user = $user;
        return $this;
    }
}
