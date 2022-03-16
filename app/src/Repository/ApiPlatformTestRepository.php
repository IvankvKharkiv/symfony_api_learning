<?php

namespace App\Repository;

use App\Entity\ApiPlatformTest;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ApiPlatformTest|null find($id, $lockMode = null, $lockVersion = null)
 * @method ApiPlatformTest|null findOneBy(array $criteria, array $orderBy = null)
 * @method ApiPlatformTest[]    findAll()
 * @method ApiPlatformTest[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ApiPlatformTestRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ApiPlatformTest::class);
    }

    // /**
    //  * @return ApiPlatformTest[] Returns an array of ApiPlatformTest objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ApiPlatformTest
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
