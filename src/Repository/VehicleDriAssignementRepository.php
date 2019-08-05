<?php

namespace App\Repository;

use App\Entity\VehicleAssignement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method VehicleAssignement|null find($id, $lockMode = null, $lockVersion = null)
 * @method VehicleAssignement|null findOneBy(array $criteria, array $orderBy = null)
 * @method VehicleAssignement[]    findAll()
 * @method VehicleAssignement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VehicleAssignementRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, VehicleAssignement::class);
    }

    // /**
    //  * @return VehicleAssignement[] Returns an array of VehicleAssignement objects
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
    public function findOneBySomeField($value): ?VehicleAssignement
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
