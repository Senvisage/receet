<?php

namespace App\Repository;

use App\Entity\Recette;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class RecetteRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Recette::class);
    }
    public function findOneByIdFull($id)
    {
        return $this->createQueryBuilder('r')
            //Link vers les LiensIngredientRecette
            ->leftJoin('r.linksingredientrecette', 'l')
            ->addSelect('l')
            //Link vers les ingredients
            ->leftJoin('l.ingredient', 'i')
            ->addSelect('i')
            ->andWhere('r.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function findOneByRandom() {
        $result = $this->createQueryBuilder('r')
            ->getQuery()
            ->getArrayResult();
        shuffle($result);
        //var_dump($result);die();
        return $result[0];
    }
    /*
    public function findBySomething($value)
    {
        return $this->createQueryBuilder('r')
            ->where('r.something = :value')->setParameter('value', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */
}
