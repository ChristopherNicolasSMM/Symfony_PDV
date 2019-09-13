<?php

namespace App\Repository;

use App\Entity\Fragmentacao;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Fragmentacao|null find($id, $lockMode = null, $lockVersion = null)
 * @method Fragmentacao|null findOneBy(array $criteria, array $orderBy = null)
 * @method Fragmentacao[]    findAll()
 * @method Fragmentacao[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FragmentacaoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Fragmentacao::class);
    }

    // /**
    //  * @return Fragmentacao[] Returns an array of Fragmentacao objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Fragmentacao
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
