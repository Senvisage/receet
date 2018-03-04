<?php

namespace App\DataFixtures;

use App\Entity\LinkIngredientRecette;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LinkIngredientRecetteFixtures extends Fixture implements DependentFixtureInterface{
    public function load(ObjectManager $manager)
    {
        $link1 = new LinkIngredientRecette();
        $link1->setQuantity(400);
        $link1->setIngredient($this->getReference('ingre-pates'));
        $link1->setRecette($this->getReference('recet-07'));
        $manager->persist($link1);

        $link2 = new LinkIngredientRecette();
        $link2->setQuantity(400);
        $link2->setIngredient($this->getReference('ingre-03'));
        $link2->setRecette($this->getReference('recet-06'));
        $manager->persist($link2);

        $link3 = new LinkIngredientRecette();
        $link3->setQuantity(400);
        $link3->setIngredient($this->getReference('ingre-04'));
        $link3->setRecette($this->getReference('recet-05'));
        $manager->persist($link3);

        $link4 = new LinkIngredientRecette();
        $link4->setQuantity(400);
        $link4->setIngredient($this->getReference('ingre-05'));
        $link4->setRecette($this->getReference('recet-04'));
        $manager->persist($link4);

        $link5 = new LinkIngredientRecette();
        $link5->setQuantity(400);
        $link5->setIngredient($this->getReference('ingre-06'));
        $link5->setRecette($this->getReference('recet-03'));
        $manager->persist($link5);

        $link6 = new LinkIngredientRecette();
        $link6->setQuantity(400);
        $link6->setIngredient($this->getReference('ingre-07'));
        $link6->setRecette($this->getReference('recet-10'));
        $manager->persist($link6);

        $link7 = new LinkIngredientRecette();
        $link7->setQuantity(400);
        $link7->setIngredient($this->getReference('ingre-08'));
        $link7->setRecette($this->getReference('recet-08'));
        $manager->persist($link7);

        $link8 = new LinkIngredientRecette();
        $link8->setQuantity(400);
        $link8->setIngredient($this->getReference('ingre-09'));
        $link8->setRecette($this->getReference('recet-06'));
        $manager->persist($link8);

        $link9 = new LinkIngredientRecette();
        $link9->setQuantity(400);
        $link9->setIngredient($this->getReference('ingre-10'));
        $link9->setRecette($this->getReference('recet-04'));
        $manager->persist($link9);

        $link10 = new LinkIngredientRecette();
        $link10->setQuantity(400);
        $link10->setIngredient($this->getReference('ingre-03'));
        $link10->setRecette($this->getReference('recet-09'));
        $manager->persist($link10);

        $link11 = new LinkIngredientRecette();
        $link11->setQuantity(400);
        $link11->setIngredient($this->getReference('ingre-04'));
        $link11->setRecette($this->getReference('recet-07'));
        $manager->persist($link11);

        $link12 = new LinkIngredientRecette();
        $link12->setQuantity(400);
        $link12->setIngredient($this->getReference('ingre-05'));
        $link12->setRecette($this->getReference('recet-05'));
        $manager->persist($link12);

        $link13 = new LinkIngredientRecette();
        $link13->setQuantity(400);
        $link13->setIngredient($this->getReference('ingre-06'));
        $link13->setRecette($this->getReference('recet-03'));
        $manager->persist($link13);

        $link14 = new LinkIngredientRecette();
        $link14->setQuantity(400);
        $link14->setIngredient($this->getReference('ingre-07'));
        $link14->setRecette($this->getReference('recet-10'));
        $manager->persist($link14);

        $link15 = new LinkIngredientRecette();
        $link15->setQuantity(400);
        $link15->setIngredient($this->getReference('ingre-08'));
        $link15->setRecette($this->getReference('recet-09'));
        $manager->persist($link15);

        $link16 = new LinkIngredientRecette();
        $link16->setQuantity(400);
        $link16->setIngredient($this->getReference('ingre-09'));
        $link16->setRecette($this->getReference('recet-08'));
        $manager->persist($link16);

        $link17 = new LinkIngredientRecette();
        $link17->setQuantity(400);
        $link17->setIngredient($this->getReference('ingre-10'));
        $link17->setRecette($this->getReference('recet-07'));
        $manager->persist($link17);

        $link18 = new LinkIngredientRecette();
        $link18->setQuantity(400);
        $link18->setIngredient($this->getReference('ingre-03'));
        $link18->setRecette($this->getReference('recet-06'));
        $manager->persist($link18);

        $link19 = new LinkIngredientRecette();
        $link19->setQuantity(400);
        $link19->setIngredient($this->getReference('ingre-05'));
        $link19->setRecette($this->getReference('recet-05'));
        $manager->persist($link19);

        $link20 = new LinkIngredientRecette();
        $link20->setQuantity(400);
        $link20->setIngredient($this->getReference('ingre-07'));
        $link20->setRecette($this->getReference('recet-04'));
        $manager->persist($link20);

        $link21 = new LinkIngredientRecette();
        $link21->setQuantity(400);
        $link21->setIngredient($this->getReference('ingre-09'));
        $link21->setRecette($this->getReference('recet-03'));
        $manager->persist($link21);

        $link22 = new LinkIngredientRecette();
        $link22->setQuantity(400);
        $link22->setIngredient($this->getReference('ingre-04'));
        $link22->setRecette($this->getReference('recet-10'));
        $manager->persist($link22);

        $link23 = new LinkIngredientRecette();
        $link23->setQuantity(400);
        $link23->setIngredient($this->getReference('ingre-06'));
        $link23->setRecette($this->getReference('recet-09'));
        $manager->persist($link23);

        $link24 = new LinkIngredientRecette();
        $link24->setQuantity(400);
        $link24->setIngredient($this->getReference('ingre-08'));
        $link24->setRecette($this->getReference('recet-08'));
        $manager->persist($link24);

        $link25 = new LinkIngredientRecette();
        $link25->setQuantity(400);
        $link25->setIngredient($this->getReference('ingre-10'));
        $link25->setRecette($this->getReference('recet-07'));
        $manager->persist($link25);

        $link26 = new LinkIngredientRecette();
        $link26->setQuantity(400);
        $link26->setIngredient($this->getReference('ingre-03'));
        $link26->setRecette($this->getReference('recet-06'));
        $manager->persist($link26);

        $link27 = new LinkIngredientRecette();
        $link27->setQuantity(400);
        $link27->setIngredient($this->getReference('ingre-04'));
        $link27->setRecette($this->getReference('recet-05'));
        $manager->persist($link27);

        $link28 = new LinkIngredientRecette();
        $link28->setQuantity(400);
        $link28->setIngredient($this->getReference('ingre-05'));
        $link28->setRecette($this->getReference('recet-04'));
        $manager->persist($link28);

        $link29 = new LinkIngredientRecette();
        $link29->setQuantity(400);
        $link29->setIngredient($this->getReference('ingre-06'));
        $link29->setRecette($this->getReference('recet-03'));
        $manager->persist($link29);

        $manager->flush();
        $this->addReference('lnkIR-1', $link1);
        $this->addReference('lnkIR-2', $link2);
        $this->addReference('lnkIR-3', $link3);
    }

    public function getDependencies()
    {
        return array(
            IngredientFixtures::class,
            RecetteFixtures::class,
        );
    }
}