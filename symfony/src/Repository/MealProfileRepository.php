<?php

namespace App\Repository;

use App\Entity\MealProfile;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class MealProfileRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, MealProfile::class);
    }

    public function findAllFull()
    {
        return $this->createQueryBuilder('m')
            //Link vers les utilisateurs
            ->innerJoin('m.utilisateur', 'u')
            ->addSelect('u')
            ->getQuery()
            ->getResult();
    }

    /*
    public function findBySomething($value)
    {
        return $this->createQueryBuilder('m')
            ->where('m.something = :value')->setParameter('value', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */
}
