<?php

namespace App\Form;

use App\Entity\Choices;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ChoicesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('Advisor', EntityType::class, [
                'class' => 'App\Entity\Advisors',
                'placeholder' => "Sélectionnez un conseiller",
            ])
            ->add('Category', EntityType::class, [
                'class' => 'App\Entity\Categories',
                'placeholder' => 'Sélectionnez une catégorie',

            ])
        ;

        $builder->get('Category')->addEventListener(
            FormEvents::POST_SUBMIT,
            function (FormEvent $event)
            {
                $form = $event->getForm();

                $form->getParent()->add('SubCategory', EntityType::class, [
                    'class' => 'App\Entity\SubCategories',
                    'placeholder' => 'Sélectionner un sous catégorie',
                    'choices' => $form->getData()->getSubCategories(),
                ]);

            }
        );

        $builder->get('Category')->addEventListener(
            FormEvents::PRE_SET_DATA,
            function (FormEvent $event)
            {
                $form = $event->getForm();
                $data = $event->getData();
                $sub_category = $data->getSubCategories();
                $form->get('Category')->setData($sub_category->getCategory());
            }
        );

        $builder
            ->add('User', EntityType::class, [
                'class' => "App\Entity\Users",
                'placeholder' => 'nom du support terrain',

            ])
            ->add('Comments');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Choices::class,
        ]);
    }
}
