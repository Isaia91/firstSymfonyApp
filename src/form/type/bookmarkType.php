<?php

declare(strict_types=1);

namespace App\form\type;

use App\Entity\BookMark;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Tag;


class bookmarkType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
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
            ->add('tags', EntityType::class, [
                'class' => Tag::class,
                'choice_label' => 'name',
                'multiple' => true,
                'expanded' => true,
                'label' => 'Tags',
                'required' => false,
                'attr' => ['class' => 'form-check']
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => BookMark::class,
        ]);
    }
}
