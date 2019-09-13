<?php

namespace App\Repository;

use App\Entity\Composicao;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Composicao|null find($id, $lockMode = null, $lockVersion = null)
 * @method Composicao|null findOneBy(array $criteria, array $orderBy = null)
 * @method Composicao[]    findAll()
 * @method Composicao[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ComposicaoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Composicao::class);
    }

    // /**
    //  * @return Composicao[] Returns an array of Composicao objects
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
    public function findOneBySomeField($value): ?Composicao
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
