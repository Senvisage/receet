<?php
namespace App\Form;

use App\Entity\Recette;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
class RecetteType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Recette::class,
        ));
    }
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
            ->add("name",
                TextType::class,
                [
                    'attr'=>["placeholder"=>"Entrez un nom"],
                    'required'=>true
                ]
            )
            ->add("timePreparation",
                NumberType::class,
                [
                    'attr'=>["placeholder"=>"Entrez le temps de préparation (en minutes)"],
                    'required'=>true
                ]
            )
            ->add("timeCuisson",
                NumberType::class,
                [
                    'attr'=>["placeholder"=>"Entrez le temps de cuisson (en minutes)"],
                    'required'=>true
                ]
            )
            ->add("description" ,
                TextType::class,
                [
                    'attr'=>["placeholder"=>"Entrez une description"],
                    'required'=>true
                ]
            )
            ->add("steps" ,
                TextType::class,
                [
                    'attr'=>["placeholder"=>"Entrez les différentes étapes"],
                    'required'=>true
                ]
            )
            ->add("illustration",
                FileType::class,
                [
                    'attr'=>["placeholder"=>"Choisissez une image"],
                    'required'=>true,
                    'data_class'=>null
                ]
            );
    }
}