<?php

namespace App\Repository;

use App\Entity\Ingredient;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class IngredientRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Ingredient::class);
    }
    public function findOneByIdFull($id)
    {
        return $this->createQueryBuilder('i')
            //Link vers les LiensIngredientRecette
            ->leftJoin('i.linksingredientrecette', 'l')
            ->addSelect('l')
            //Link vers les recettes
            ->leftJoin('l.recette', 'r')
            ->addSelect('r')
            ->andWhere('i.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getOneOrNullResult();
    }
    /*
    public function findBySomething($value)
    {
        return $this->createQueryBuilder('i')
            ->where('i.something = :value')->setParameter('value', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */
}
