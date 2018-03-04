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
        $link1->setRecette($this->getReference('recet-carbo'));
        $manager->persist($link1);

        $link2 = new LinkIngredientRecette();
        $link2->setQuantity(400);
        $link2->setIngredient($this->getReference('ingre-riz'));
        $link2->setRecette($this->getReference('recet-bouleriz'));
        $manager->persist($link2);

        $link3 = new LinkIngredientRecette();
        $link3->setQuantity(400);
        $link3->setIngredient($this->getReference('ingre-nori'));
        $link3->setRecette($this->getReference('recet-bouleriz'));
        $manager->persist($link3);

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