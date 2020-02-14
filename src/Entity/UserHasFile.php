<?php


namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class UserHasFile
 * @package App\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="user_has_file")
 */
class UserHasFile
{
    /**
     * @var User $user
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="User", inversedBy="user_has_file")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $user;

    /**
     * @var File $file
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="File", inversedBy="user_has_file")
     * @ORM\JoinColumn(name="file_id", referencedColumnName="id")
     */
    protected $file;

    /**
     * @var bool $read
     * @ORM\Column(type="boolean")
     */
    protected $read;

    /**
     * @var bool $write
     * @ORM\Column(type="boolean")
     */
    protected $write;
}
