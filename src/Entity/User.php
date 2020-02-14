<?php


namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class User
 * @package App\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User implements UserInterface
{
    const USER_INACTIVE   = 0;
    const USER_ACTIVE     = 1;

    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="string", length=32)
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class="App\Service\UniqStringGenerator")
     */
    protected $id;

    /**
     * @var string $firstName
     * @ORM\Column(type="string")
     */
    protected $firstName;

    /**
     * @var string $lastName
     * @ORM\Column(type="string")
     */
    protected $lastName;

    /**
     * @var string $email
     * @ORM\Column(type="string", unique=true)
     */
    protected $email;

    /**
     * @var string $password
     * @ORM\Column(type="string")
     */
    protected $password;

    /**
     * @var int $status
     * @ORM\Column(type="integer")
     */
    protected $status = self::USER_ACTIVE;

    /**
     * @var Group[] $groups
     * @ORM\ManyToMany(targetEntity="Group", inversedBy="user", fetch="EAGER")
     * @ORM\JoinTable(name="user_has_group")
     */
    protected $groups;

    /**
     * @var bool
     * @ORM\Column(type="boolean")
     */
    protected $isAdmin = false;

    /**
     * User constructor.
     */
    public function __construct()
    {
        $this->groups = new ArrayCollection();
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
     * @return User
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     * @return User
     */
    public function setFirstName(string $firstName): User
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     * @return User
     */
    public function setLastName(string $lastName): User
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return User
     */
    public function setEmail(string $email): User
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return User
     */
    public function setPassword(string $password): User
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @param int $status
     * @return User
     */
    public function setStatus(int $status): User
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return Object
     */
    public function getGroups(): Object
    {
        return $this->groups;
    }

    /**
     * @param Object $groups
     * @return User
     */
    public function setGroups(Object $groups): User
    {
        $this->groups = $groups;
        return $this;
    }

    /**
     * @return bool
     */
    public function isAdmin(): bool
    {
        return $this->isAdmin;
    }

    /**
     * @param bool $isAdmin
     * @return User
     */
    public function setIsAdmin(bool $isAdmin): User
    {
        $this->isAdmin = $isAdmin;
        return $this;
    }

    public function getRoles()
    {
        return ['ROLE_USER'];
    }

    public function getSalt()
    {
        // TODO: Implement getSalt() method.
    }

    public function getUsername()
    {
        return $this->email;
    }

    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }

}
