<?php

namespace App\Repository;

use App\Entity\VilleEtape;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method VilleEtape|null find($id, $lockMode = null, $lockVersion = null)
 * @method VilleEtape|null findOneBy(array $criteria, array $orderBy = null)
 * @method VilleEtape[]    findAll()
 * @method VilleEtape[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VilleEtapeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, VilleEtape::class);
    }

     /**
      * @return VilleEtape[] Returns an array of VilleEtape objects
      */

    public function findByCircuit($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.circuit_etape = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }


    /*
    public function findOneBySomeField($value): ?VilleEtape
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
