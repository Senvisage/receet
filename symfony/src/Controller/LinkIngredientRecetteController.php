<?php

namespace App\Controller;

use App\Entity\LinkIngredientRecette;
use App\Form\LinkIngredientRecetteType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class LinkIngredientRecetteController extends Controller
{
    /**
     * @Route("/linkingredientrecette", name="linkingredientrecette_list")
     */
    public function linkingredientrecetteList() {
        $repo = $this->getDoctrine()->getRepository(LinkIngredientRecette::class);
        $ingredients = $repo->findAllFull();
        return $this->render('linkingredientrecette/home.html.twig', array(
            'linksingredientrecette'=>$ingredients
        ));
    }
    /**
     * @Route("/linkingredientrecette/{id}", name="linkingredientrecette_detail", requirements={"id"="\d*"})
     */
    public function linkingredientrecetteDetail($id) {
        $link = $this->getDoctrine()
            ->getRepository(LinkIngredientRecette::class)
            ->findOneByIdFull($id);
        return $this->render('linkingredientrecette/detail.html.twig', array(
            'linkingredientrecette'=>$link
        ));
    }
    /**
     * @Route("/linkingredientrecette/delete/{id}", name="linkingredientrecette_delete")
     */
    public function linkingredientrecetteDelete(LinkIngredientRecette $ingredient) {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $em = $this->getDoctrine()->getManager();
        $em->remove($ingredient);
        $em->flush();
        return $this->redirectToRoute('linkingredientrecette_list');
    }
    /**
     *@Route("/linkingredientrecette/add", name="linkingredientrecette_add")
     */
    public function linkingredientrecetteAdd( Request $request ){
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $ingredient = new LinkIngredientRecette();
        $form = $this->createForm(LinkIngredientRecetteType::class, $ingredient);
        $form->add('save', SubmitType::class);
        $form->handleRequest($request);
        $msg = "";
        if( $form->isSubmitted() ){
            if($form->isValid()) {
                $newIngredient = $form->getData();
                $manager = $this->getDoctrine()->getManager();
                $manager->persist($newIngredient);
                $manager->flush();
                $msg = 'Ingrédient ajouté en base avec succès';
            } else {
                $msg = 'Vous avez oublié de remplir un champ !';
            }
        }
        return $this->render("linkingredientrecette/form.html.twig",
            array(
                "form"=>$form->createView(),
                "message"=>$msg
            )
        );
    }
    /**
     *@Route("/linkingredientrecette/edit/{id}", name="linkingredientrecette_edit", requirements={"id"="\d*"})
     */
    public function linkingredientrecetteEdit( LinkIngredientRecette $ingredient, Request $request ){
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $form = $this->createForm(LinkIngredientRecetteType::class, $ingredient);
        $form->add('save', SubmitType::class);
        $form->handleRequest($request);
        $msg = "";
        if( $form->isSubmitted() ){
            if($form->isValid()) {
                $newIngredient = $form->getData();
                $manager = $this->getDoctrine()->getManager();
                $manager->persist($newIngredient);
                $manager->flush();
                $msg = 'Ingrédient modifié en base avec succès';
            } else {
                $msg = 'Vous avez oublié de remplir un champ !';
            }
        }
        return $this->render("linkingredientrecette/form.html.twig",
            array(
                "form"=>$form->createView(),
                "message"=>$msg
            )
        );
    }
}
