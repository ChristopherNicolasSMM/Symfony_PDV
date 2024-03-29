<?php

namespace App\Repository;

use App\Entity\TipoDeEndereco;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method TipoDeEndereco|null find($id, $lockMode = null, $lockVersion = null)
 * @method TipoDeEndereco|null findOneBy(array $criteria, array $orderBy = null)
 * @method TipoDeEndereco[]    findAll()
 * @method TipoDeEndereco[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TipoDeEnderecoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TipoDeEndereco::class);
    }

    // /**
    //  * @return TipoDeEndereco[] Returns an array of TipoDeEndereco objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TipoDeEndereco
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
