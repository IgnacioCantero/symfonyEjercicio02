<?php

namespace App\Form;

use App\Entity\Citas;
use App\Entity\Clientes;
use App\Entity\Servicios;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CitaType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
           'data_class' => Citas::class,
        ]);
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('fechaHora', DateTimeType::class, [
                'widget'=>'single_text',
                'format'=>'dd-MM-yyyy HH:mm:ss',
                'html5'=>false
            ])
            ->add('cliente', EntityType::class, ['class'=>Clientes::class])
            ->add('servicio', EntityType::class, ['class'=>Servicios::class])
        ;
    }

    public function getBlockPrefix()
    {
        return "";
    }

    public function getName()
    {
        return "";
    }
}
