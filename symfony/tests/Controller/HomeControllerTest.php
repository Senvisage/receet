<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class HomeControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $client->request('GET', '/');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testRecettes()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');

        $this->assertEquals(
            200,                                        //Valeur attendue
            $client->getResponse()->getStatusCode()     //Expression testée
        );
        $this->assertEquals(
            1,
            $crawler->filter('html:contains("Receet")')->count()
        );
    }

}