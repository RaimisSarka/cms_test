<?php

namespace App\Repository;

use App\Entity\MenuItemsTop;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method MenuItemsTop|null find($id, $lockMode = null, $lockVersion = null)
 * @method MenuItemsTop|null findOneBy(array $criteria, array $orderBy = null)
 * @method MenuItemsTop[]    findAll()
 * @method MenuItemsTop[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MenuItemsTopRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, MenuItemsTop::class);
    }

    // /**
    //  * @return MenuItemsTop[] Returns an array of MenuItemsTop objects
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
    public function findOneBySomeField($value): ?MenuItemsTop
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
