<?php

namespace FrontEndBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;;
use FrontEndBundle\Entity\Tipo_Gusto;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GustoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomeGusto')
            ->add('colore', ChoiceType::class,  [
              'choices' => [
                'Arancione' => '#FACC2E',
                'Bianco' =>'#ffffff',
                'Celeste' =>'#00ffff',
                'Marrone' => '#463614',
                'Nocciola' => '#C9B895',
                'Rosa' => '#F5A9D0',
                'Rosso' => '#ff0040',
                'Verde' => '#80ff00',
             ]])
            ->add('tipoGusto', ChoiceType::class, [
              'choices'=>[
                'Seleziona' => 'Scegli Tipo',
                'Frutta'=> 'Frutta', //si aspetta un oggetto, non un numero, usare un servizio o una repository forse?
                'Crema'=>'Crema',
                'Altro'=>'Altro'
              ]
            ])
            ->add('INSERISCI', SubmitType::class )
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'FrontEndBundle\Entity\Gusto'
        ));
    }
}
