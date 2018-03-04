<?php

namespace App\Form;

use App\Entity\Ingredient;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class IngredientType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Ingredient::class,
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
            ->add("description" ,
                TextType::class,
                [
                    'attr'=>["placeholder"=>"Entrez une description"],
                    'required'=>true
                ]
            )
            ->add("unit" ,
                TextType::class,
                [
                    'attr'=>["placeholder"=>"Entrez une unité par défaut"],
                    'required'=>true
                ]
            )
            ->add("caloriesPerUnit",
                NumberType::class,
                [
                    'attr'=>["placeholder"=>"Entrez le nombre de calories par unité"],
                    'required'=>true
                ]
            )
            ->add("rayon",
                TextType::class,
                [
                    'attr'=>["placeholder"=>"Entrez le rayon où l'acheter"],
                    'required'=>true
                ]
            )
            ->add("tags",
                TagsType::class,
                [
                    'attr'=>["placeholder"=>"Entrez les tags à associer à l'ingrdeient"],
                    'required'=>false
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