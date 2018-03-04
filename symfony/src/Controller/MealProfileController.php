<?php

namespace App\Controller;

use App\Entity\MealProfile;
use App\Form\MealProfileType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class MealProfileController extends Controller
{
    /**
     * @Route("/mealprofile", name="mealprofile_list")
     */
    public function mealprofileList() {
        $repo = $this->getDoctrine()->getRepository(MealProfile::class);
        $mealProfiles = $repo->findAllFull();
        return $this->render('mealprofile/home.html.twig', array(
            'mealprofiles'=>$mealProfiles
        ));
    }
    /**
     * @Route("/mealprofile/{id}", name="mealprofile_detail", requirements={"id"="\d*"})
     */
    public function mealprofileDetail($id) {
        $mealprofile = $this->getDoctrine()
            ->getRepository(MealProfile::class)
            ->findOneById($id);
        return $this->render('mealprofile/detail.html.twig', array(
            'mealprofile'=>$mealprofile
        ));
    }
    /**
     * @Route("/mealprofile/delete/{id}", name="mealprofile_delete")
     */
    public function mealprofileDelete(MealProfile $mealprofile) {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $em = $this->getDoctrine()->getManager();
        $em->remove($mealprofile);
        $em->flush();
        return $this->redirectToRoute('mealprofile_list');
    }
    /**
     *@Route("/mealprofile/add", name="mealprofile_add")
     */
    public function addMealprofile( Request $request ){
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $mealprofile = new MealProfile();
        $form = $this->createForm(MealProfileType::class, $mealprofile);
        $form->add('save', SubmitType::class);
        $form->handleRequest($request);
        $msg = "";
        if( $form->isSubmitted() ){
            if($form->isValid()) {
                $newMealprofile = $form->getData();
                $manager = $this->getDoctrine()->getManager();
                $manager->persist($newMealprofile);
                $manager->flush();
                $msg = 'MealProfile ajouté en base avec succès';
            } else {
                $msg = 'Vous avez oublié de remplir un champ !';
            }
        }
        return $this->render("mealprofile/form.html.twig",
            array(
                "form"=>$form->createView(),
                "message"=>$msg
            )
        );
    }
    /**
     *@Route("/mealprofile/edit/{id}", name="mealprofile_edit", requirements={"id"="\d*"})
     */
    public function mealprofileEdit( MealProfile $mealprofile, Request $request ){
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $form = $this->createForm(MealProfileType::class, $mealprofile);
        $form->add('save', SubmitType::class);
        $form->handleRequest($request);
        $msg = "";
        if( $form->isSubmitted() ){
            if($form->isValid()) {
                $newMealprofile = $form->getData();
                $manager = $this->getDoctrine()->getManager();
                $manager->persist($newMealprofile);
                $manager->flush();
                $msg = 'MealProfile modifié en base eavec succès';
            } else {
                $msg = 'Vous avez oublié de remplir un champ !';
            }
        }
        return $this->render("mealprofile/form.html.twig",
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
