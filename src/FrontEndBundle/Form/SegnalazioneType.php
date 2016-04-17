<?php

namespace FrontEndBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SegnalazioneType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomeGelateriaSegnalata')
            ->add('cittaSegnalazione')
            ->add('provinciaSegnalazione')
            ->add('regioneSegnalazione')
            ->add('testoSegnalazione')
            ->add('telefonoSegnalazione')
            ->add('idUtente')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'FrontEndBundle\Entity\Segnalazione'
        ));
    }
}
