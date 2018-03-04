<?php
namespace App\Form;
use App\Entity\MealProfile;
use App\Entity\Utilisateur;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
class MealProfileType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => MealProfile::class,
        ));
    }
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
            ->add("nbPersonnes",
                NumberType::class,
                [
                    'attr'=>["placeholder"=>"Entrez un nombre de personnes à nourrir"],
                    'required'=>true
                ]
            )
            ->add("nbJours",
                NumberType::class,
                [
                    'attr'=>["placeholder"=>"Entrez la durée du menu à générer"],
                    'required'=>true
                ]
            )
            ->add("lunch",
                CheckboxType ::class,
                [
                    'attr'=>["placeholder"=>"Générer les repas de midi"],
                    'required'=>false
                ]
            )
            ->add("dinner" ,
                CheckboxType ::class,
                [
                    'attr'=>["placeholder"=>"Générer les repas du soir"],
                    'required'=>false
                ]
            )
            ->add('utilisateur', EntityType::class, array(
                'class'        => Utilisateur::class,
                'choice_label' => 'username',
                'multiple'     => false,
            ))

        ;
    }
}