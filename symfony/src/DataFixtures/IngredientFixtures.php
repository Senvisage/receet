<?php

namespace App\DataFixtures;

use App\Entity\Ingredient;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class IngredientFixtures extends Fixture{
    public function load(ObjectManager $manager)
    {
        $ingredient01 = new Ingredient();
        $ingredient01->setName('Pates');
        $ingredient01->setDescription("Des pâtes classiques. Attention, possible présence de gluten, intolérants s'abstenir !");
        $ingredient01->setUnit('g.');
        $ingredient01->setCaloriesPerUnit(2);
        $ingredient01->setRayon('Riz & pâtes');
        $ingredient01->setIllustration('uploads/img/ingredient/14b4de8f38079939c280861ea000e23a.jpeg');
        $ingredient01->addTag($ingredient01->getName());
        $ingredient01->addTag('gluten');
        $ingredient01->addTag('feculent');
        $ingredient01->addTag('nourriture transformee');
        $manager->persist($ingredient01);

        $ingredient02 = new Ingredient();
        $ingredient02->setName('Riz');
        $ingredient02->setDescription("Céréale cultivée depuis des milliers d'années, lorem ipsum dolor sit amet non consequitur blablabla...");
        $ingredient02->setUnit('g.');
        $ingredient02->setCaloriesPerUnit(1.2);
        $ingredient02->setRayon('Riz & pâtes');
        $ingredient02->setIllustration('uploads/img/ingredient/a64acaba722b211be561061219469701.jpeg');
        $ingredient02->addTag($ingredient02->getName());
        $ingredient02->addTag('feculent');
        $manager->persist($ingredient02);

        $ingredient03 = new Ingredient();
        $ingredient03->setName('Algue Nori');
        $ingredient03->setDescription("Assez difficile à trouver sous nos latitudes, elle reste un aliment de choix dans la garniture de beaucoup de plats asiatiques. Désséchée et conditionnée sous forme de fauilles");
        $ingredient03->setUnit('g.');
        $ingredient03->setCaloriesPerUnit(4);
        $ingredient03->setRayon('Cuisine du Monde');
        $ingredient03->setIllustration('uploads/img/ingredient/45140b19331835b6f2d4e99472b8ab07.jpeg');
        $ingredient03->addTag($ingredient03->getName());
        $ingredient03->addTag('rare');
        $ingredient03->addTag('nourriture-transformee');
        $manager->persist($ingredient03);

        $ingredient04 = new Ingredient();
        $ingredient04->setName('Algue Nori');
        $ingredient04->setDescription("Assez difficile à trouver sous nos latitudes, elle reste un aliment de choix dans la garniture de beaucoup de plats asiatiques. Désséchée et conditionnée sous forme de fauilles");
        $ingredient04->setUnit('g.');
        $ingredient04->setCaloriesPerUnit(4);
        $ingredient04->setRayon('Cuisine du Monde');
        $ingredient04->setIllustration('uploads/img/ingredient/45140b19331835b6f2d4e99472b8ab07.jpeg');
        $ingredient04->addTag($ingredient04->getName());
        $ingredient04->addTag('rare');
        $ingredient04->addTag('nourriture-transformee');
        $manager->persist($ingredient04);

        $ingredient05 = new Ingredient();
        $ingredient05->setName('Algue Nori');
        $ingredient05->setDescription("Assez difficile à trouver sous nos latitudes, elle reste un aliment de choix dans la garniture de beaucoup de plats asiatiques. Désséchée et conditionnée sous forme de fauilles");
        $ingredient05->setUnit('g.');
        $ingredient05->setCaloriesPerUnit(4);
        $ingredient05->setRayon('Cuisine du Monde');
        $ingredient05->setIllustration('uploads/img/ingredient/45140b19331835b6f2d4e99472b8ab07.jpeg');
        $ingredient05->addTag($ingredient05->getName());
        $ingredient05->addTag('rare');
        $ingredient05->addTag('nourriture-transformee');
        $manager->persist($ingredient05);

        $ingredient06 = new Ingredient();
        $ingredient06->setName('Algue Nori');
        $ingredient06->setDescription("Assez difficile à trouver sous nos latitudes, elle reste un aliment de choix dans la garniture de beaucoup de plats asiatiques. Désséchée et conditionnée sous forme de fauilles");
        $ingredient06->setUnit('g.');
        $ingredient06->setCaloriesPerUnit(4);
        $ingredient06->setRayon('Cuisine du Monde');
        $ingredient06->setIllustration('uploads/img/ingredient/45140b19331835b6f2d4e99472b8ab07.jpeg');
        $ingredient06->addTag($ingredient06->getName());
        $ingredient06->addTag('rare');
        $ingredient06->addTag('nourriture-transformee');
        $manager->persist($ingredient06);

        $ingredient07 = new Ingredient();
        $ingredient07->setName('Algue Nori');
        $ingredient07->setDescription("Assez difficile à trouver sous nos latitudes, elle reste un aliment de choix dans la garniture de beaucoup de plats asiatiques. Désséchée et conditionnée sous forme de fauilles");
        $ingredient07->setUnit('g.');
        $ingredient07->setCaloriesPerUnit(4);
        $ingredient07->setRayon('Cuisine du Monde');
        $ingredient07->setIllustration('uploads/img/ingredient/45140b19331835b6f2d4e99472b8ab07.jpeg');
        $ingredient07->addTag($ingredient07->getName());
        $ingredient07->addTag('rare');
        $ingredient07->addTag('nourriture-transformee');
        $manager->persist($ingredient07);

        $ingredient08 = new Ingredient();
        $ingredient08->setName('Algue Nori');
        $ingredient08->setDescription("Assez difficile à trouver sous nos latitudes, elle reste un aliment de choix dans la garniture de beaucoup de plats asiatiques. Désséchée et conditionnée sous forme de fauilles");
        $ingredient08->setUnit('g.');
        $ingredient08->setCaloriesPerUnit(4);
        $ingredient08->setRayon('Cuisine du Monde');
        $ingredient08->setIllustration('uploads/img/ingredient/45140b19331835b6f2d4e99472b8ab07.jpeg');
        $ingredient08->addTag($ingredient08->getName());
        $ingredient08->addTag('rare');
        $ingredient08->addTag('nourriture-transformee');
        $manager->persist($ingredient08);

        $ingredient09 = new Ingredient();
        $ingredient09->setName('Algue Nori');
        $ingredient09->setDescription("Assez difficile à trouver sous nos latitudes, elle reste un aliment de choix dans la garniture de beaucoup de plats asiatiques. Désséchée et conditionnée sous forme de fauilles");
        $ingredient09->setUnit('g.');
        $ingredient09->setCaloriesPerUnit(4);
        $ingredient09->setRayon('Cuisine du Monde');
        $ingredient09->setIllustration('uploads/img/ingredient/45140b19331835b6f2d4e99472b8ab07.jpeg');
        $ingredient09->addTag($ingredient09->getName());
        $ingredient09->addTag('rare');
        $ingredient09->addTag('nourriture-transformee');
        $manager->persist($ingredient09);

        $ingredient10 = new Ingredient();
        $ingredient10->setName('Algue Nori');
        $ingredient10->setDescription("Assez difficile à trouver sous nos latitudes, elle reste un aliment de choix dans la garniture de beaucoup de plats asiatiques. Désséchée et conditionnée sous forme de fauilles");
        $ingredient10->setUnit('g.');
        $ingredient10->setCaloriesPerUnit(4);
        $ingredient10->setRayon('Cuisine du Monde');
        $ingredient10->setIllustration('uploads/img/ingredient/45140b19331835b6f2d4e99472b8ab07.jpeg');
        $ingredient10->addTag($ingredient10->getName());
        $ingredient10->addTag('rare');
        $ingredient10->addTag('nourriture-transformee');
        $manager->persist($ingredient10);

        $manager->flush();
        $this->addReference('ingre-pates', $ingredient01);
        $this->addReference('ingre-riz', $ingredient02);
        $this->addReference('ingre-nori', $ingredient03);
        $this->addReference('ingre-04', $ingredient04);
        $this->addReference('ingre-05', $ingredient05);
        $this->addReference('ingre-06', $ingredient06);
        $this->addReference('ingre-07', $ingredient07);
        $this->addReference('ingre-08', $ingredient08);
        $this->addReference('ingre-09', $ingredient09);
        $this->addReference('ingre-10', $ingredient10);
    }
}