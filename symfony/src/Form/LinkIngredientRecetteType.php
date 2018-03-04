<?php
namespace App\Form;
use App\Entity\Ingredient;
use App\Entity\LinkIngredientRecette;
use App\Entity\Recette;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
class LinkIngredientRecetteType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => LinkIngredientRecette::class,
        ));
    }
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
            ->add('ingredient', EntityType::class, array(
                'class'        => Ingredient::class,
                'choice_label' => 'name',
                'multiple'     => false,
            ))
            ->add("quantity",
                NumberType::class,
                [
                    'attr'=>["placeholder"=>"Entrez la quantité"],
                    'required'=>true
                ]
            )
            ->add("recette",EntityType::class, array(
                'class'        => Recette::class,
                'choice_label' => 'name',
                'multiple'     => false,
            ));
    }
}