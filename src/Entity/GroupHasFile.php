<?php


namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class GroupHasFile
 * @package App\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="group_has_file")
 */
class GroupHasFile
{
    /**
     * @var Group $user
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Group", inversedBy="group_has_file")
     * @ORM\JoinColumn(name="group_id", referencedColumnName="id")
     */
    protected $user;

    /**
     * @var File $file
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="File", inversedBy="group_has_file")
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
