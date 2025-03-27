<?php

declare(strict_types=1);

namespace App\form\type;

use App\Entity\Author;
use App\Entity\Book;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class bookType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre', null, [
                'required' => true,
                'attr' => ['class' => 'form-control', 'placeholder' => 'Entrez le titre']
            ])
            ->add('author', EntityType::class, [
                'class' => Author::class,
                'choice_label' => function(Author $author) {
                    return $author->getNom() . ' ' . $author->getPrenom();
                },
                'placeholder' => 'Sélectionnez un auteur',
                'attr' => ['class' => 'form-control']
            ])
            ->add('valider', SubmitType::class, [
            'attr' => ['class' => 'btn btn-success my-3'],
            'label' => 'Enregistrer'
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Book::class,
        ]);
    }
}
