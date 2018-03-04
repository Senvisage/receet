<?php
namespace App\Form;

use App\Entity\Utilisateur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UtilisateurType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Utilisateur::class,
        ));
    }
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
            ->add("username",
                TextType::class,
                [
                    'attr'=>["placeholder"=>"Entrez un nom"],
                    'required'=>true
                ]
            )
            ->add("email",
                EmailType::class,
                [
                    'attr'=>["placeholder"=>"Entrez une adresse mail"],
                    'required'=>true
                ]
            )
            ->add("isActive",
                CheckboxType::class,
                [
                    'attr'=>["placeholder"=>"Utilisateur actif ?"],
                    'required'=>true
                ]
            )
            ->add("role" ,
                TextType::class,
                [
                    'attr'=>["placeholder"=>"Entrez un rôle"],
                    'required'=>true
                ]
            );
    }
}