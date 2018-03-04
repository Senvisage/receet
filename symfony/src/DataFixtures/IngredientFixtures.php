<?php

namespace App\DataFixtures;

use App\Entity\Ingredient;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class IngredientFixtures extends Fixture{
    public function load(ObjectManager $manager)
    {
        $ingredient1 = new Ingredient();
        $ingredient1->setName('Pates');
        $ingredient1->setDescription("Des pâtes classiques. Attention, possible présence de gluten, intolérants s'abstenir !");
        $ingredient1->setUnit('g.');
        $ingredient1->setCaloriesPerUnit(2);
        $ingredient1->setRayon('Riz & pâtes');
        $ingredient1->setIllustration('uploads/img/ingredient/14b4de8f38079939c280861ea000e23a.jpeg');
        $ingredient1->addTag($ingredient1->getName());
        $ingredient1->addTag('gluten');
        $ingredient1->addTag('feculent');
        $ingredient1->addTag('nourriture transformee');
        $manager->persist($ingredient1);

        $ingredient2 = new Ingredient();
        $ingredient2->setName('Riz');
        $ingredient2->setDescription("Céréale cultivée depuis des milliers d'années, lorem ipsum dolor sit amet non consequitur blablabla...");
        $ingredient2->setUnit('g.');
        $ingredient2->setCaloriesPerUnit(1.2);
        $ingredient2->setRayon('Riz & pâtes');
        $ingredient2->setIllustration('uploads/img/ingredient/a64acaba722b211be561061219469701.jpeg');
        $ingredient2->addTag($ingredient2->getName());
        $ingredient2->addTag('feculent');
        $manager->persist($ingredient2);

        $ingredient3 = new Ingredient();
        $ingredient3->setName('Algue Nori');
        $ingredient3->setDescription("Assez difficile à trouver sous nos latitudes, elle reste un aliment de choix dans la garniture de beaucoup de plats asiatiques. Désséchée et conditionnée sous forme de fauilles");
        $ingredient3->setUnit('g.');
        $ingredient3->setCaloriesPerUnit(4);
        $ingredient3->setRayon('Cuisine du Monde');
        $ingredient3->setIllustration('uploads/img/ingredient/45140b19331835b6f2d4e99472b8ab07.jpeg');
        $ingredient3->addTag($ingredient3->getName());
        $ingredient3->addTag('rare');
        $ingredient3->addTag('nourriture-transformee');
        $manager->persist($ingredient3);

        $manager->flush();
        $this->addReference('ingre-pates', $ingredient1);
        $this->addReference('ingre-riz', $ingredient2);
        $this->addReference('ingre-nori', $ingredient3);
    }
}