<?php

namespace App\Form;

use App\Entity\Circuit;
use App\Entity\Ville;
use App\Entity\VilleEtape;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VillEtapeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('duree_etape')
            ->add('ordre_etape')
            ->add('ville_etape',EntityType::class,[
                'class'=>Ville::class,
                'choice_label'=>'des_ville',
                'label'=>'Ville'
            ])
            ->add('circuit_etape',EntityType::class,[
                'class'=>Circuit::class,
                'choice_label'=>'des_circuit',
                'label'=>'Circuit'
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => VilleEtape::class,
        ]);
    }
}
