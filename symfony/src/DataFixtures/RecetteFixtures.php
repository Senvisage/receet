<?php

namespace App\DataFixtures;

use App\Entity\Recette;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class RecetteFixtures extends Fixture{
    public function load(ObjectManager $manager)
    {
        $recette01 = new Recette();
        $recette01->setName('Boule de Riz');
        $recette01->setDescription("Repas savoureux, facile à réaliser et mangeable n'importe où et n'importe quand");
        $recette01->setTimePreparation(5);
        $recette01->setTimeCuisson(15);
        $recette01->setSteps('Lorem ipsum dolor sit amet ');
        $recette01->setIllustration('13d24239605777f012d6da0c386c7212.jpeg');
        $recette01->addTag($recette01->getName());
        $recette01->addTag('sur le pouce');
        $recette01->addTag('facile à réaliser');
        $manager->persist($recette01);

        $recette02 = new Recette();
        $recette02->setName('Pates carbo');
        $recette02->setDescription("Repas savoureux mais assez gras, de nombreuses variantes sont disponibles");
        $recette02->setTimePreparation(20);
        $recette02->setTimeCuisson(15);
        $recette02->setSteps('Cuire les pâtes, faire réduire les lardons, dorer les oignons, etc...');
        $recette02->setIllustration('a29d89171542e474d7bb09dec663ef83.jpeg');
        $recette02->addTag($recette02->getName());
        $recette02->addTag('adaptable');
        $manager->persist($recette02);

        $recette03 = new Recette();
        $recette03->setName('Recette 03');
        $recette03->setDescription("Repas savoureux mais assez gras, de nombreuses variantes sont disponibles");
        $recette03->setTimePreparation(20);
        $recette03->setTimeCuisson(15);
        $recette03->setSteps('Cuire les pâtes, faire réduire les lardons, dorer les oignons, etc...');
        $recette03->setIllustration('a29d89171542e474d7bb09dec663ef83.jpeg');
        $recette03->addTag($recette03->getName());
        $recette03->addTag('adaptable');
        $manager->persist($recette03);

        $recette04 = new Recette();
        $recette04->setName('Recette 04');
        $recette04->setDescription("Repas savoureux mais assez gras, de nombreuses variantes sont disponibles");
        $recette04->setTimePreparation(20);
        $recette04->setTimeCuisson(15);
        $recette04->setSteps('Cuire les pâtes, faire réduire les lardons, dorer les oignons, etc...');
        $recette04->setIllustration('a29d89171542e474d7bb09dec663ef83.jpeg');
        $recette04->addTag($recette04->getName());
        $recette04->addTag('adaptable');
        $manager->persist($recette04);

        $recette05 = new Recette();
        $recette05->setName('Recette 05');
        $recette05->setDescription("Repas savoureux mais assez gras, de nombreuses variantes sont disponibles");
        $recette05->setTimePreparation(20);
        $recette05->setTimeCuisson(15);
        $recette05->setSteps('Cuire les pâtes, faire réduire les lardons, dorer les oignons, etc...');
        $recette05->setIllustration('a29d89171542e474d7bb09dec663ef83.jpeg');
        $recette05->addTag($recette05->getName());
        $recette05->addTag('adaptable');
        $manager->persist($recette05);

        $recette06 = new Recette();
        $recette06->setName('Recette 06');
        $recette06->setDescription("Repas savoureux mais assez gras, de nombreuses variantes sont disponibles");
        $recette06->setTimePreparation(20);
        $recette06->setTimeCuisson(15);
        $recette06->setSteps('Cuire les pâtes, faire réduire les lardons, dorer les oignons, etc...');
        $recette06->setIllustration('a29d89171542e474d7bb09dec663ef83.jpeg');
        $recette06->addTag($recette06->getName());
        $recette06->addTag('adaptable');
        $manager->persist($recette06);

        $recette07 = new Recette();
        $recette07->setName('Recette 07');
        $recette07->setDescription("Repas savoureux mais assez gras, de nombreuses variantes sont disponibles");
        $recette07->setTimePreparation(20);
        $recette07->setTimeCuisson(15);
        $recette07->setSteps('Cuire les pâtes, faire réduire les lardons, dorer les oignons, etc...');
        $recette07->setIllustration('a29d89171542e474d7bb09dec663ef83.jpeg');
        $recette07->addTag($recette07->getName());
        $recette07->addTag('adaptable');
        $manager->persist($recette07);

        $recette08 = new Recette();
        $recette08->setName('Recette 08');
        $recette08->setDescription("Repas savoureux mais assez gras, de nombreuses variantes sont disponibles");
        $recette08->setTimePreparation(20);
        $recette08->setTimeCuisson(15);
        $recette08->setSteps('Cuire les pâtes, faire réduire les lardons, dorer les oignons, etc...');
        $recette08->setIllustration('a29d89171542e474d7bb09dec663ef83.jpeg');
        $recette08->addTag($recette08->getName());
        $recette08->addTag('adaptable');
        $manager->persist($recette08);

        $recette09 = new Recette();
        $recette09->setName('Recette 09');
        $recette09->setDescription("Repas savoureux mais assez gras, de nombreuses variantes sont disponibles");
        $recette09->setTimePreparation(20);
        $recette09->setTimeCuisson(15);
        $recette09->setSteps('Cuire les pâtes, faire réduire les lardons, dorer les oignons, etc...');
        $recette09->setIllustration('a29d89171542e474d7bb09dec663ef83.jpeg');
        $recette09->addTag($recette09->getName());
        $recette09->addTag('adaptable');
        $manager->persist($recette09);

        $recette10 = new Recette();
        $recette10->setName('Recette 10');
        $recette10->setDescription("Repas savoureux mais assez gras, de nombreuses variantes sont disponibles");
        $recette10->setTimePreparation(20);
        $recette10->setTimeCuisson(15);
        $recette10->setSteps('Cuire les pâtes, faire réduire les lardons, dorer les oignons, etc...');
        $recette10->setIllustration('a29d89171542e474d7bb09dec663ef83.jpeg');
        $recette10->addTag($recette10->getName());
        $recette10->addTag('adaptable');
        $manager->persist($recette10);

        $manager->flush();
        $this->addReference('recet-bouleriz', $recette01);
        $this->addReference('recet-carbo', $recette02);
        $this->addReference('recet-03', $recette03);
        $this->addReference('recet-04', $recette04);
        $this->addReference('recet-05', $recette05);
        $this->addReference('recet-06', $recette06);
        $this->addReference('recet-07', $recette07);
        $this->addReference('recet-08', $recette08);
        $this->addReference('recet-09', $recette09);
        $this->addReference('recet-10', $recette10);
    }
}