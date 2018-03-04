<?php

namespace App\DataFixtures;

use App\Entity\Utilisateur;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class UtilisateurFixtures extends Fixture{
    public function load(ObjectManager $manager)
    {
        $utilisateur1 = new Utilisateur();
        $utilisateur1->setEmail('123654@receet.com');
        $utilisateur1->setIsActive(1);
        $utilisateur1->setUsername('admin');
        $utilisateur1->setPassword('$2y$12$H2xBIDvrD5H4xb1nB5o9N.2Ctq343r7VGoeDrzI2CAGQkQDYTjazq');
        $utilisateur1->setRole('ROLE_ADMIN');

        $manager->persist($utilisateur1);
        $manager->flush();
        $this->addReference('utili-admin', $utilisateur1);

        $utilisateur2 = new Utilisateur();
        $utilisateur2->setEmail('123@receet.com');
        $utilisateur2->setIsActive(1);
        $utilisateur2->setUsername('customer');
        $utilisateur2->setPassword('$2y$12$Xnm6udQCcTD4TZVMp8.CzeGtrUTW2t1utHSon5.Ft1VDkdkd.dYFC');
        $utilisateur2->setRole('ROLE_USER');

        $manager->persist($utilisateur2);
        $manager->flush();
        $this->addReference('utili-customer', $utilisateur2);
    }
}