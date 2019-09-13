<?php

namespace App\Repository;

use App\Entity\CategoriaPDV;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method CategoriaPDV|null find($id, $lockMode = null, $lockVersion = null)
 * @method CategoriaPDV|null findOneBy(array $criteria, array $orderBy = null)
 * @method CategoriaPDV[]    findAll()
 * @method CategoriaPDV[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategoriaPDVRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CategoriaPDV::class);
    }

    // /**
    //  * @return CategoriaPDV[] Returns an array of CategoriaPDV objects
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
    public function findOneBySomeField($value): ?CategoriaPDV
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
