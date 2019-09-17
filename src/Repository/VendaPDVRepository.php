<?php

namespace App\Repository;

use App\Entity\VendaPDV;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method VendaPDV|null find($id, $lockMode = null, $lockVersion = null)
 * @method VendaPDV|null findOneBy(array $criteria, array $orderBy = null)
 * @method VendaPDV[]    findAll()
 * @method VendaPDV[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VendaPDVRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, VendaPDV::class);
    }

    // /**
    //  * @return VendaPDV[] Returns an array of VendaPDV objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?VendaPDV
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
