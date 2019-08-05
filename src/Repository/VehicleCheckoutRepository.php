<?php

namespace App\Repository;

use App\Entity\VehicleCheckout;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method VehicleCheckout|null find($id, $lockMode = null, $lockVersion = null)
 * @method VehicleCheckout|null findOneBy(array $criteria, array $orderBy = null)
 * @method VehicleCheckout[]    findAll()
 * @method VehicleCheckout[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VehicleCheckoutRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, VehicleCheckout::class);
    }

    // /**
    //  * @return VehicleCheckout[] Returns an array of VehicleCheckout objects
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
    public function findOneBySomeField($value): ?VehicleCheckout
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
