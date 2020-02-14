<?php


namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class File
 * @package App\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="file")
 */
class File
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
    protected $filename;

    /**
     * @var string $extension
     * @ORM\Column(type="string")
     */
    protected $extension;

    /**
     * @var float $size
     * @ORM\Column(type="float")
     */
    protected $size;

    /**
     * @var string $storage
     * @ORM\Column(type="string")
     */
    protected $storage;

    /**
     * @var User $user
     * @ORM\ManyToOne(targetEntity="User")
     */
    protected $user;

    /**
     * @ORM\ManyToOne(targetEntity="Directory",inversedBy="id")
     * @ORM\JoinColumn(name="directory", referencedColumnName="id", nullable=true)
     */
    protected $directory;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return File
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getFilename(): string
    {
        return $this->filename;
    }

    /**
     * @param string $filename
     * @return File
     */
    public function setFilename(string $filename): File
    {
        $this->filename = $filename;
        return $this;
    }

    /**
     * @return string
     */
    public function getExtension(): string
    {
        return $this->extension;
    }

    /**
     * @param string $extension
     * @return File
     */
    public function setExtension(string $extension): File
    {
        $this->extension = $extension;
        return $this;
    }

    /**
     * @return float
     */
    public function getSize(): float
    {
        return $this->size;
    }

    /**
     * @param float $size
     * @return File
     */
    public function setSize(float $size): File
    {
        $this->size = $size;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDirectory()
    {
        return $this->directory;
    }

    /**
     * @param mixed $directory
     * @return File
     */
    public function setDirectory($directory)
    {
        $this->directory = $directory;
        return $this;
    }

    /**
     * @return string
     */
    public function getStorage(): string
    {
        return $this->storage;
    }

    /**
     * @param string $storage
     * @return File
     */
    public function setStorage(string $storage): File
    {
        $this->storage = $storage;
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
     * @return File
     */
    public function setUser(User $user): File
    {
        $this->user = $user;
        return $this;
    }
}
