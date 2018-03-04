<?php

namespace App\Controller;

use App\Entity\Recette;
use App\Form\RecetteType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;

class RecetteController extends Controller
{
    /**
     * @Route("/recette", name="recette_list")
     */
    public function recetteList() {
        $repo = $this->getDoctrine()->getRepository(Recette::class);
        $recettes = $repo->findAll();
        return $this->render('recette/home.html.twig', array(
            'recettes'=>$recettes
        ));
    }
    /**
     * @Route("/recette/{id}", name="recette_detail", requirements={"id"="\d*"})
     */
    public function recetteDetail($id) {
        $recette = $this->getDoctrine()
            ->getRepository(Recette::class)
            ->findOneByIdFull($id);
        return $this->render('recette/detail.html.twig', array(
            'recette'=>$recette
        ));
    }
    /**
     * @Route("/recette/delete/{id}", name="recette_delete")
     */
    public function recetteDelete(Recette $recette) {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $em = $this->getDoctrine()->getManager();
        $em->remove($recette);
        $em->flush();
        return $this->redirectToRoute('recette_list');
    }
    /**
     *@Route("/recette/add", name="recette_add")
     */
    public function addRecette( Request $request ){
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $recette = new Recette();
        $form = $this->createForm(RecetteType::class, $recette);
        $form->add('save', SubmitType::class);
        $form->handleRequest($request);
        $msg = "";
        if( $form->isSubmitted() ){
            if($form->isValid()) {
                $newRecette = $form->getData();

                //Traitements Illustration
                $file = $newRecette->getIllustration();
                $definitiveFileName = $this->generateUniqueFileName().'.'.$file->guessExtension();
                $file->move($this->getParameter('upload_illustrations_directory').'/recette',$definitiveFileName);
                $newRecette->setIllustration($definitiveFileName);

                //Ajout auto d'un tag correspondant au nom
                $newRecette->addTag($newRecette->getName());

                //Enregistrement
                $manager = $this->getDoctrine()->getManager();
                $manager->persist($newRecette);
                $manager->flush();
                $msg = 'Recette ajoutée en base avec succès';
            } else {
                $msg = 'Vous avez oublié de remplir un champ !';
            }
        }
        return $this->render("recette/form.html.twig",
            array(
                "form"=>$form->createView(),
                "message"=>$msg
            )
        );
    }
    /**
     *@Route("/recette/edit/{id}", name="recette_edit", requirements={"id"="\d*"})
     */
    public function recetteEdit( Recette $recette, Request $request ){
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $form = $this->createForm(RecetteType::class, $recette);
        $form->add('save', SubmitType::class);
        $form->handleRequest($request);
        $msg = "";
        if( $form->isSubmitted() ){
            if($form->isValid()) {
                $newRecette = $form->getData();

                //Traitements Illustration
                $file = $newRecette->getIllustration();
                $definitiveFileName = $this->generateUniqueFileName().'.'.$file->guessExtension();
                $file->move($this->getParameter('upload_illustrations_directory').'/recette',$definitiveFileName);
                $newRecette->setIllustration($definitiveFileName);

                //Ajout auto d'un tag correspondant au nom
                $newRecette->addTag($newRecette->getName());

                //Enregistrement
                $manager = $this->getDoctrine()->getManager();
                $manager->persist($newRecette);
                $manager->flush();
                $msg = 'Recette modifiée en base avec succès';
            } else {
                $msg = 'Vous avez oublié de remplir un champ !';
            }
        }
        return $this->render("recette/form.html.twig",
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
