<?php

namespace DsCorp\Equipo\EquipoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class equipoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numeroSerie')
            ->add('fechaInstalacion')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'DsCorp\Equipo\EquipoBundle\Entity\equipo'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'dscorp_equipo_equipobundle_equipo';
    }
}
