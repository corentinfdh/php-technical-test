<?php

namespace App\Repository;

use App\Entity\RunningOuting;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method RunningOuting|null find($id, $lockMode = null, $lockVersion = null)
 * @method RunningOuting|null findOneBy(array $criteria, array $orderBy = null)
 * @method RunningOuting[]    findAll()
 * @method RunningOuting[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RunningOutingRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, RunningOuting::class);
    }

    // /**
    //  * @return RunningOuting[] Returns an array of RunningOuting objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?RunningOuting
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
