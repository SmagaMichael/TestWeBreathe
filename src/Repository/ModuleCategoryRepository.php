<?php

namespace App\Repository;

use App\Entity\ModuleCategory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ModuleCategory|null find($id, $lockMode = null, $lockVersion = null)
 * @method ModuleCategory|null findOneBy(array $criteria, array $orderBy = null)
 * @method ModuleCategory[]    findAll()
 * @method ModuleCategory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ModuleCategoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ModuleCategory::class);
    }

    // /**
    //  * @return ModuleCategory[] Returns an array of ModuleCategory objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ModuleCategory
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
