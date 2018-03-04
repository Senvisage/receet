<?php

namespace App\Controller;

use App\Entity\Ingredient;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class ApiIngredientController extends Controller
{
    /**
     * @Route("/api/ingredient", name="ingredient_list_api")
     * @Method("GET")
     */
    public function ingredientList(Request $request) {
        $repo = $this->getDoctrine()->getRepository(Ingredient::class);
        $ingredients = $repo->findAll();
        foreach($ingredients as &$cur_ingredient) {
            $cur_ingredient->setIllustration($request->getUriForPath('/'.$cur_ingredient->getIllustration()));
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
        $rep = new Response($serializer->serialize($ingredients, 'json'));
        $rep->headers->set('Access-Control-Allow-Origin','*');
        return $rep;
    }
    /**
     * @Route("/api/ingredient/{id}", name="ingredient_detail_api", requirements={"id"="\d*"})
     * @Method("GET")
     */
    public function ingredientDetail($id, Request $request) {
        $ingredient = $this->getDoctrine()
            ->getRepository(Ingredient::class)
            ->findOneByIdFull($id);
        $ingredient->setIllustration($request->getUriForPath('/'.$ingredient->getIllustration()));

        $encoder = new JsonEncoder();
        $normalizer = new ObjectNormalizer();
        $serializer = new Serializer(array($normalizer), array($encoder));
        $normalizer->setCircularReferenceHandler(
            function ($object) {
                return $object->getId();
            }
        );

        $rep = new Response($serializer->serialize($ingredient, 'json'));
        $rep->headers->set('Access-Control-Allow-Origin','*');
        return $rep;
    }
    /**
     * @Route("/api/ingredient/{id}", name="ingredient_delete_api")
     * @Method("DELETE")
     */
    public function ingredientDelete(Ingredient $ingredient) {
        $em = $this->getDoctrine()->getManager();
        $em->remove($ingredient);
        $em->flush();
        return new Response('{"msg":"ok"}', 200);
    }
    /**
     * @Route("/api/ingredient/", name="ingredient_add_api")
     * @Method("POST")
     */
    public function ingredientAdd( Request $request ){
        $ingredient = new Ingredient();
        $form = $this->createForm(IngredientType::class, $ingredient);
        $form->add('save', SubmitType::class);
        $form->handleRequest($request);
        $msg = "";
        if( $form->isSubmitted() ){
            if($form->isValid()) {
                $newIngredient = $form->getData();
                $file = $newIngredient->getIllustration();
                $definitiveFileName = $this->generateUniqueFileName().'.'.$file->guessExtension();
                $file->move($this->getParameter('upload_illustrations_directory').'/ingredient',$definitiveFileName);
                $newIngredient->setIllustration($definitiveFileName);
                $manager = $this->getDoctrine()->getManager();
                $manager->persist($newIngredient);
                $manager->flush();
                $msg = 'Ingrédient ajouté en base avec succès';
            } else {
                $msg = 'Vous avez oublié de remplir un champ !';
            }
        }
        return $this->render("ingredient/form.html.twig",
            array(
                "form"=>$form->createView(),
                "message"=>$msg
            )
        );
    }


}
