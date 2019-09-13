<?php

namespace App\Repository;

use App\Entity\NaturezaDeOperacao;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method NaturezaDeOperacao|null find($id, $lockMode = null, $lockVersion = null)
 * @method NaturezaDeOperacao|null findOneBy(array $criteria, array $orderBy = null)
 * @method NaturezaDeOperacao[]    findAll()
 * @method NaturezaDeOperacao[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NaturezaDeOperacaoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NaturezaDeOperacao::class);
    }

    // /**
    //  * @return NaturezaDeOperacao[] Returns an array of NaturezaDeOperacao objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('n.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?NaturezaDeOperacao
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
