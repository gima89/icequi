<?php

namespace FrontEndBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use FrontEndBundle\Form\CittaRepository;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


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
            ->add('idCitta', EntityType::class, array(
              'class'=>'FrontEndBundle:Citta',
              'choice_label'=>'nomeCitta',
              'query_builder' => function (EntityRepository $er) {
                  return $er->createQueryBuilder('c')->orderBy('c.nomeCitta', 'ASC');
                } ) )
            ->add('gusti', EntityType::class, array(
              'class'=>'FrontEndBundle:Gusto',
              'choice_label'=>'nomeGusto',
              'multiple'=>true,
              'expanded'=>true))
            ->add('INSERISCI', SubmitType::class)
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
