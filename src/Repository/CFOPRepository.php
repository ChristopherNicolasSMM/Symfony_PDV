<?php

namespace App\Repository;

use App\Entity\CFOP;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method CFOP|null find($id, $lockMode = null, $lockVersion = null)
 * @method CFOP|null findOneBy(array $criteria, array $orderBy = null)
 * @method CFOP[]    findAll()
 * @method CFOP[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CFOPRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CFOP::class);
    }

    // /**
    //  * @return CFOP[] Returns an array of CFOP objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CFOP
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
