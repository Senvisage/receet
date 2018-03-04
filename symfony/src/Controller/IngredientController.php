<?php

namespace App\Controller;

use App\Entity\Ingredient;
use App\Form\IngredientType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;

class IngredientController extends Controller
{
    /**
     * @Route("/ingredient", name="ingredient_list")
     */
    public function ingredientList() {
        $repo = $this->getDoctrine()->getRepository(Ingredient::class);
        $ingredients = $repo->findAll();
        return $this->render('ingredient/home.html.twig', array(
            'ingredients'=>$ingredients
        ));
    }
    /**
     * @Route("/ingredient/{id}", name="ingredient_detail", requirements={"id"="\d*"})
     */
    public function ingredientDetail($id) {
        $ingredient = $this->getDoctrine()
            ->getRepository(Ingredient::class)
            ->findOneByIdFull($id);
        return $this->render('ingredient/detail.html.twig', array(
            'ingredient'=>$ingredient
        ));
    }
    /**
     * @Route("/ingredient/delete/{id}", name="ingredient_delete")
     */
    public function ingredientDelete(Ingredient $ingredient) {
        $em = $this->getDoctrine()->getManager();
        $em->remove($ingredient);
        $em->flush();
        return $this->redirectToRoute('ingredient_list');
    }
    /**
     *@Route("/ingredient/add", name="ingredient_add")
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

                //Traitements Illustration
                $file = $newIngredient->getIllustration();
                $definitiveFileName = $this->generateUniqueFileName().'.'.$file->guessExtension();
                $file->move($this->getParameter('upload_illustrations_directory').'/ingredient',$definitiveFileName);
                $newIngredient->setIllustration($definitiveFileName);

                //Ajout auto d'un tag correspondant au nom
                $newIngredient->addTag($newIngredient->getName());

                //Enregistrement
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
    /**
     *@Route("/ingredient/edit/{id}", name="ingredient_edit", requirements={"id"="\d*"})
     */
    public function ingredientEdit( Ingredient $ingredient, Request $request ){
        $form = $this->createForm(IngredientType::class, $ingredient);
        $form->add('save', SubmitType::class);
        $form->handleRequest($request);
        $msg = "";
        if( $form->isSubmitted() ){
            if($form->isValid()) {
                $newIngredient = $form->getData();

                //Traitements Illustration
                $file = $newIngredient->getIllustration();
                $definitiveFileName = $this->generateUniqueFileName().'.'.$file->guessExtension();
                $file->move($this->getParameter('upload_illustrations_directory').'/ingredient',$definitiveFileName);
                $newIngredient->setIllustration($definitiveFileName);

                //Ajout auto d'un tag correspondant au nom
                $newIngredient->addTag($newIngredient->getName());

                //Enregistrement
                $manager = $this->getDoctrine()->getManager();
                $manager->persist($newIngredient);
                $manager->flush();
                $msg = 'Ingrédient modifié en base eavec succès';
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
    /**
     * @return string
     */
    private function generateUniqueFileName(){
        return md5(uniqid());
    }
}
