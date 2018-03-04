<?php

namespace App\DataFixtures;

use App\Entity\Recette;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class RecetteFixtures extends Fixture{
    public function load(ObjectManager $manager)
    {
        $recette1 = new Recette();
        $recette1->setName('Boule de Riz');
        $recette1->setDescription("Repas savoureux et facile à réaliser et mangeable n'importe où et n'importe quand");
        $recette1->setTimePreparation(5);
        $recette1->setTimeCuisson(15);
        $recette1->setSteps('Lorem ipsum dolor sit amet ');
        $recette1->setIllustration('13d24239605777f012d6da0c386c7212.jpeg');
        $recette1->addTag($recette1->getName());
        $recette1->addTag('sur le pouce');
        $recette1->addTag('facile à réaliser');
        $manager->persist($recette1);

        $recette2 = new Recette();
        $recette2->setName('Pates carbo');
        $recette2->setDescription("Repas savoureux mais assez gras, de nombreuses variantes sont disponibles");
        $recette2->setTimePreparation(20);
        $recette2->setTimeCuisson(15);
        $recette2->setSteps('Cuire les pâtes, faire réduire les lardons, dorer les oignons, etc...');
        $recette2->setIllustration('a29d89171542e474d7bb09dec663ef83.jpeg');
        $recette2->addTag($recette2->getName());
        $recette2->addTag('adaptable');
        $manager->persist($recette2);

        $manager->flush();
        $this->addReference('recet-bouleriz', $recette1);
        $this->addReference('recet-carbo', $recette2);
    }
}