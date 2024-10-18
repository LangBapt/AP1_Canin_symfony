<?php

namespace App\Form;

use App\Entity\Contact;
use App\Entity\utilisateur;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TelType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomContact', TextType::class, [
                'label' => 'Nom',
                'attr' => ['placeholder' => 'Entrez votre nom']
            ])
            ->add('prenomContact', TextType::class, [
                'label' => 'Prenom',
                'attr' => ['placeholder' => 'Entrez votre prenom']
            ])
            ->add('adresseContact', TextType::class, [
                'label' => 'Adresse',
                'attr' => ['placeholder' => 'Entrez votre adresse']
            ])
            ->add('cpContact', TextType::class, [
                'label' => 'Code postal',
                'attr' => ['placeholder' => 'Entrez votre code postal']
            ])
            ->add('villeContact', TextType::class, [
                'label' => 'Ville',
                'attr' => ['placeholder' => 'Entrez votre ville']
            ])
            ->add('mailContact', EmailType::class, [
                'label' => 'Email',
                'attr' => ['placeholder' => 'Entrez votre email']
                ])
            ->add('numTelContact', TelType::class, [
                'label' => 'Numéro de téléphone',
                'attr' => ['placeholder' => 'Entrez votre numéro']
                ])
            ->add('messageContact', TextareaType::class, [
                'label' => 'Message',
                'attr' => ['placeholder' => 'Entrez votre message']
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
