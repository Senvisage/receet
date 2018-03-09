<?php

namespace App\Controller;

use App\Entity\Recette;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class ApiRecetteController extends Controller
{
    /**
     * @Route("/api/recette", name="recette_list_api")
     * @Method("GET")
     */
    public function recetteList(Request $request) {
        $repo = $this->getDoctrine()->getRepository(Recette::class);
        $recettes = $repo->findAll();
        foreach($recettes as &$cur_recette) {
            $cur_recette->setIllustration($request->getUriForPath('/'.$cur_recette->getIllustration()));
        }

        $encoder = new JsonEncoder();
        $normalizer = new ObjectNormalizer();
        $serializer = new Serializer(array($normalizer), array($encoder));
        $normalizer->setCircularReferenceHandler(
            function ($object) {
                return $object->getId();
            }
        );

        // Choisir la liste des champs à afficher dans la serialisation
        // $options = array("attributes"=>array('id','title','img','additionnal'));
        $rep = new Response($serializer->serialize($recettes, 'json'));
        $rep->headers->set('Access-Control-Allow-Origin','*');
        return $rep;
    }
    /**
     * @Route("/api/recette/{id}", name="recette_detail_api", requirements={"id"="\d*"})
     * @Method("GET")
     */
    public function recetteDetail($id, Request $request) {
        $recette = $this->getDoctrine()
            ->getRepository(Recette::class)
            ->findOneByIdFull($id);
        $recette->setIllustration($request->getUriForPath('/'.$recette->getIllustration()));

        $encoder = new JsonEncoder();
        $normalizer = new ObjectNormalizer();
        $serializer = new Serializer(array($normalizer), array($encoder));
        $normalizer->setCircularReferenceHandler(
            function ($object) {
                return $object->getId();
            }
        );

        $rep = new Response($serializer->serialize($recette, 'json'));
        $rep->headers->set('Access-Control-Allow-Origin','*');
        return $rep;
    }
    /**
     * @Route("/api/recette/random", name="recette_random_api")
     * @Method("GET")
     */
    public function recetteRandom(Request $request) {
        $recette = $this->getDoctrine()
            ->getRepository(Recette::class)
            ->findOneByRandom();
        $recette->setIllustration($request->getUriForPath('/'.$recette->getIllustration()));

        $encoder = new JsonEncoder();
        $normalizer = new ObjectNormalizer();
        $serializer = new Serializer(array($normalizer), array($encoder));
        $normalizer->setCircularReferenceHandler(
            function ($object) {
                return $object->getId();
            }
        );

        $rep = new Response($serializer->serialize($recette, 'json'));
        $rep->headers->set('Access-Control-Allow-Origin','*');
        return $rep;
    }




}