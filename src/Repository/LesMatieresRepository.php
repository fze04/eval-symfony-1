<?php

namespace App\Repository;

use App\Entity\LesMatieres;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<LesMatieres>
 *
 * @method LesMatieres|null find($id, $lockMode = null, $lockVersion = null)
 * @method LesMatieres|null findOneBy(array $criteria, array $orderBy = null)
 * @method LesMatieres[]    findAll()
 * @method LesMatieres[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LesMatieresRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LesMatieres::class);
    }

//    /**
//     * @return LesMatieres[] Returns an array of LesMatieres objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('l.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?LesMatieres
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
