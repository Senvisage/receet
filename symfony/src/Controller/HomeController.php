<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        /**/
            //$this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'Unable to access this page !');
        /**/
        return $this->render('home/home.html.twig');
    }
}
