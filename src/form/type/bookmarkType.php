<?php

declare(strict_types=1);

namespace App\form\type;

use App\Entity\BookMark;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use function Sodium\add;

class bookmarkType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('url', null, [
                'required' => true,
                'attr' => ['class' => 'form-control', 'placeholder' => 'Entrez l’URL']
            ])
            ->add('commentaire', null, [
                'required' => true,
                'attr' => ['class' => 'form-control', 'placeholder' => 'Entrez un commentaire']
            ])
            ->add('valider', SubmitType::class, [
                'attr' => ['class' => 'btn btn-primary my-3'],
                'label' => 'Enregistrer'
            ]);
    }


    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Bookmark::class,
        ]);
    }
}
