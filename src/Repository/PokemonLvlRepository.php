<?php

namespace App\Repository;

use App\Entity\PokemonLvl;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PokemonLvl>
 *
 * @method PokemonLvl|null find($id, $lockMode = null, $lockVersion = null)
 * @method PokemonLvl|null findOneBy(array $criteria, array $orderBy = null)
 * @method PokemonLvl[]    findAll()
 * @method PokemonLvl[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PokemonLvlRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PokemonLvl::class);
    }

//    /**
//     * @return PokemonLvl[] Returns an array of PokemonLvl objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?PokemonLvl
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
