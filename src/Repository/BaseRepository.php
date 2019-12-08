<?php

namespace App\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;

class BaseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry, $entityClass)
    {
        parent::__construct($registry, $entityClass);
    }

    /**
     * Persist data of an entity
     *
     * @param $model
     * @throws ORMException
     * @throws OptimisticLockException
     */
    protected function persistDatabase($model){
        $em = $this->getEntityManager();
        $em->persist($model);

        return $em->flush();
    }
}