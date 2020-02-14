<?php


namespace App\Service;

use App\Entity\Directory;
use App\Entity\File;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Class FileManager
 * @package App\Service
 */
class FileManager
{
    /**
     * @var EntityManagerInterface $entityManager
     */
    protected $entityManager;

    /**
     * FileManager constructor.
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(
        EntityManagerInterface $entityManager
    ) {
        $this->entityManager = $entityManager;
    }

    /**
     * @param $name
     * @param User $user
     * @param Directory|null $parent
     */
    public function createDirectory($name, User $user, Directory $parent = null)
    {
        $directory = (new Directory())
            ->setName($name)
            ->setUser($user)
            ->setParent($parent);

        $this->entityManager->persist($directory);
        $this->entityManager->flush();
    }

    /**
     * @param User $user
     * @param null $root
     * @return mixed
     */
    public function getUserDirectories(User $user, $root = null)
    {
        $queryBuilder = $this->entityManager->getRepository(Directory::class)
            ->createQueryBuilder('d');

        $exp = is_null($root) ?
            $queryBuilder->expr()->isNull('d.parent') :
            $queryBuilder->expr()->eq('d.parent', ':root');

        $query = $queryBuilder->select('d');
        $query
            ->where($queryBuilder->expr()->andX(
                $exp,
                $queryBuilder->expr()->eq('d.user', ':user'),
            ))
            ->setParameter(':user', $user->getId())
        ;

        if (!is_null($root)) {
            $query->setParameter(':root', $root);
        }

        $query->orderBy('d.name', 'ASC');

        return $query->getQuery()->getResult();
    }

    public function getUserFiles(User $user, $root = null)
    {
        $queryBuilder = $this->entityManager->getRepository(File::class)
            ->createQueryBuilder('f');

        $exp = is_null($root) ?
            $queryBuilder->expr()->isNull('f.directory') :
            $queryBuilder->expr()->eq('f.directory', ':root');

        $query = $queryBuilder->select('f');
        $query
            ->where($queryBuilder->expr()->andX(
                $exp,
                $queryBuilder->expr()->eq('f.user', ':user'),
                ))
            ->setParameter(':user', $user->getId())
        ;

        if (!is_null($root)) {
            $query->setParameter(':root', $root);
        }

        $query->orderBy('f.filename', 'ASC');

        return $query->getQuery()->getResult();
    }
}
