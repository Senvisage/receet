<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use App\Form\UtilisateurType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;

class UtilisateurController extends Controller
{
    /**
     * @Route("/utilisateur", name="utilisateur_list")
     */
    public function utilisateurList() {
        $repo = $this->getDoctrine()->getRepository(Utilisateur::class);
        $utilisateurs = $repo->findAll();
        return $this->render('utilisateur/home.html.twig', array(
            'utilisateurs'=>$utilisateurs
        ));
    }
    /**
     * @Route("/utilisateur/{id}", name="utilisateur_detail", requirements={"id"="\d*"})
     */
    public function utilisateurDetail($id) {
        $utilisateur = $this->getDoctrine()
            ->getRepository(Utilisateur::class)
            ->findOneByIdFull($id);
        return $this->render('utilisateur/detail.html.twig', array(
            'utilisateur'=>$utilisateur
        ));
    }
    /**
     * @Route("/utilisateur/delete/{id}", name="utilisateur_delete")
     */
    public function utilisateurDelete(Utilisateur $utilisateur) {
        $em = $this->getDoctrine()->getManager();
        $em->remove($utilisateur);
        $em->flush();
        return $this->redirectToRoute('utilisateur_list');
    }
    /**
     *@Route("/utilisateur/add", name="utilisateur_add")
     */
    public function utilisateurAdd( Request $request ){
        $utilisateur = new Utilisateur();
        $form = $this->createForm(UtilisateurType::class, $utilisateur);
        $form->add('save', SubmitType::class);
        $form->handleRequest($request);
        $msg = "";
        if( $form->isSubmitted() ){
            if($form->isValid()) {
                $newUtilisateur = $form->getData();
                $file = $newUtilisateur->getIllustration();
                $definitiveFileName = $this->generateUniqueFileName().'.'.$file->guessExtension();
                $file->move($this->getParameter('upload_illustrations_directory').'/utilisateur',$definitiveFileName);
                $newUtilisateur->setIllustration($definitiveFileName);
                $manager = $this->getDoctrine()->getManager();
                $manager->persist($newUtilisateur);
                $manager->flush();
                $msg = 'Ingrédient ajouté en base avec succès';
            } else {
                $msg = 'Vous avez oublié de remplir un champ !';
            }
        }
        return $this->render("utilisateur/form.html.twig",
            array(
                "form"=>$form->createView(),
                "message"=>$msg
            )
        );
    }
    /**
     *@Route("/utilisateur/edit/{id}", name="utilisateur_edit", requirements={"id"="\d*"})
     */
    public function utilisateurEdit( Utilisateur $utilisateur, Request $request ){
        $form = $this->createForm(UtilisateurType::class, $utilisateur);
        $form->add('save', SubmitType::class);
        $form->handleRequest($request);
        $msg = "";
        if( $form->isSubmitted() ){
            if($form->isValid()) {
                $newUtilisateur = $form->getData();
                $file = $newUtilisateur->getIllustration();
                $definitiveFileName = $this->generateUniqueFileName().'.'.$file->guessExtension();
                $file->move($this->getParameter('upload_illustrations_directory').'/utilisateur',$definitiveFileName);
                $newUtilisateur->setIllustration($definitiveFileName);
                $manager = $this->getDoctrine()->getManager();
                $manager->persist($newUtilisateur);
                $manager->flush();
                $msg = 'Ingrédient modifié en base eavec succès';
            } else {
                $msg = 'Vous avez oublié de remplir un champ !';
            }
        }
        return $this->render("utilisateur/form.html.twig",
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
