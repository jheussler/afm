<?php


namespace App\Service;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Class UserManager
 * @package App\Service
 */
class UserManager
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
    public function getUsers($offset = 0, $limit = 20, $search = null)
    {
        $queryBuilder = $this->entityManager->getRepository(User::class)
            ->createQueryBuilder('u');

        $query = $queryBuilder->select('u')
            ->setMaxResults($limit)
            ->setFirstResult($offset);
        if (!is_null($search)) {
            $query
                ->where($queryBuilder->expr()->orX(
                    $queryBuilder->expr()->like('u.firstName', ':value'),
                    $queryBuilder->expr()->like('u.lastName', ':value'),
                    $queryBuilder->expr()->like('u.email', ':value')
                ))
                ->setParameter(':value', '%'.$search.'%');
        }

        return $query->getQuery()->getResult();
    }
}
