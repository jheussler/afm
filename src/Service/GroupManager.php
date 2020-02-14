<?php


namespace App\Service;

use App\Entity\Group;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Class GroupManager
 * @package App\Service
 */
class GroupManager
{
    /**
     * @var EntityManagerInterface $entityManager
     */
    protected $entityManager;

    /**
     * UserManager constructor.
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(
        EntityManagerInterface $entityManager
    ) {
        $this->entityManager = $entityManager;
    }

    /**
     * @param int $offset
     * @param int $limit
     * @param null $search
     * @return object[]
     */
    public function getGroups($offset = 0, $limit = 20, $search = null)
    {
        $queryBuilder = $this->entityManager->getRepository(Group::class)
            ->createQueryBuilder('q');

        $query = $queryBuilder->select('q')
            ->setMaxResults($limit)
            ->setFirstResult($offset);
        if (!is_null($search)) {
            $query
                ->where($queryBuilder->expr()->orX(
                    $queryBuilder->expr()->like('u.name', ':value'),
                ))
                ->setParameter(':value', '%'.$search.'%');
        }

        return $query->getQuery()->getResult();
    }
}
