<?php

namespace App\Repository;

use App\Entity\LinkIngredientRecette;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class LinkIngredientRecetteRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, LinkIngredientRecette::class);
    }
    public function findOneByIdFull($id)
    {
        return $this->createQueryBuilder('l')
            //Link vers les ingredients
            ->innerJoin('l.ingredient', 'i')
            ->addSelect('i')
            //Link vers les recettes
            ->innerJoin('l.recette', 'r')
            ->addSelect('r')
            ->andWhere('l.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getOneOrNullResult();
    }
    public function findAllFull()
    {
        return $this->createQueryBuilder('l')
            //Link vers les ingredients
            ->innerJoin('l.ingredient', 'i')
            ->addSelect('i')
            //Link vers les recettes
            ->innerJoin('l.recette', 'r')
            ->addSelect('r')
            ->getQuery()
            ->getResult();
    }
    /*
    public function findBySomething($value)
    {
        return $this->createQueryBuilder('l')
            ->where('l.something = :value')->setParameter('value', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */
}
