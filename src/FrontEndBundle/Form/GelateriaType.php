<?php

namespace FrontEndBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GelateriaType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomeGelateria')
            ->add('indirizzo')
            ->add('telefono')
            ->add('isLunedi')
            ->add('isMartedi')
            ->add('isMercoledi')
            ->add('isGiovedi')
            ->add('isVenerdi')
            ->add('isSabato')
            ->add('isDomenica')
            ->add('idCitta')
            ->add('utenti')
            ->add('gusti')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'FrontEndBundle\Entity\Gelateria'
        ));
    }
}
