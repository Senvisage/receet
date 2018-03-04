<?php

namespace App\DataFixtures;

use App\Entity\MealProfile;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class MealProfileFixtures extends Fixture implements DependentFixtureInterface{
    public function load(ObjectManager $manager)
    {
        $mealprofile1 = new MealProfile();
        $mealprofile1->setDinner(1);
        $mealprofile1->setLunch(1);
        $mealprofile1->setNbJours(7);
        $mealprofile1->setNbPersonnes(2);
        $mealprofile1->setUtilisateur($this->getReference('utili-admin'));
        $mealprofile1->setDinner(1);
        $mealprofile1->setDinner(1);
        $manager->persist($mealprofile1);

        $manager->flush();
        $this->addReference('mealprofile-admin', $mealprofile1);
    }
    public function getDependencies()
    {
        return array(
            IngredientFixtures::class,
            RecetteFixtures::class,
        );
    }

}