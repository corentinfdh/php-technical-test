<?php

namespace App\Repository;

use App\Entity\ExitType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ExitType|null find($id, $lockMode = null, $lockVersion = null)
 * @method ExitType|null findOneBy(array $criteria, array $orderBy = null)
 * @method ExitType[]    findAll()
 * @method ExitType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExitTypeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ExitType::class);
    }

    // /**
    //  * @return ExitType[] Returns an array of ExitType objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ExitType
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
