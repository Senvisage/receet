<?php

namespace App\Tests\Controller;

use App\Entity\Recette;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\Persistence\ObjectRepository;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;


class RecetteControllerTest extends WebTestCase {
    private function _getMockedRecettes() {
        $recipes = array();

        $recipe = new Recette();
        $recipe->setTimePreparation(15);
        $recipe->setIllustration('illus');
        $recipe->setTimeCuisson(15);
        $recipe->setSteps('15 steps');
        $recipe->setDescription('15 flavours');
        $recipe->setName('15 Shades of Food');
        $recipe->setId(1);

        $recipes[]=$recipe;

        $recipe = new Recette();
        $recipe->setTimePreparation(25);
        $recipe->setIllustration('illus 2');
        $recipe->setTimeCuisson(25);
        $recipe->setSteps('25 steps');
        $recipe->setDescription('25 flavours');
        $recipe->setName('25 Shades of Food');
        $recipe->setId(2);

        $recipes[]=$recipe;

        return $recipes;
    }
    private function _getMockedManager() {
        $rep = $this->createMock(ObjectRepository::class);
        $rep->expects($this->any())
            ->method('findAll')
            ->willReturn($this->_getMockedRecettes());
        $man = $this->createMock(ObjectManager::class);
        $man->expects($this->any())
            ->method('getRepository')
            ->willReturn($rep);

        return $man;
    }

    public function testIndex()
    {
        $browser = static::createClient();
        $container = $browser->getContainer();
        $container->set(
            'doctrine.orm.default_entity_manager',
            $this->_getMockedManager()
        );
        $crawler = $browser->request('GET', '/recette');

        $this->assertEquals(
            200,
            $browser->getResponse()->getStatusCode()
        );


        $this->assertEquals(
            2,
            $crawler->filter("a:contains('Shades of Food')")->count()   //Nombre de balises "a" contenant "Shades of Food"
        );
    }

}