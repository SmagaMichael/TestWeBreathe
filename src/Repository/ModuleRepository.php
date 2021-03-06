<?php

namespace App\Repository;

use App\Entity\Module;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Module|null find($id, $lockMode = null, $lockVersion = null)
 * @method Module|null findOneBy(array $criteria, array $orderBy = null)
 * @method Module[]    findAll()
 * @method Module[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ModuleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Module::class);
    }


    public function FindCategory($id){
        //On selectionne tout les champs de la table module
        //Select * FROM Module

        //comme on est dans le repository de Module on choppe la table module automatiquement 
        //en lui donnant l'alias "m"
        $qb = $this->createQueryBuilder('m') // m = module
                    ->innerJoin('m.Category', 'mc') //On prend le champ Category de l'entité Module , 
                    //en lui donnant l'alias "mc"
                    ->andWhere('mc = :id') 
                    ->setParameter('id', $id);
    
        dump($qb->getQuery()->getResult());
        return $qb->getQuery()->getResult();
    
     }
    

   


    // /**
    //  * @return Module[] Returns an array of Module objects
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
    public function findOneBySomeField($value): ?Module
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
