<?php

namespace DsCorp\Empresa\EmpresaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class direccion_empresaType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('calle')
            ->add('numeroExt')
            ->add('numeroInt')
            ->add('colonia')
            ->add('codigoPostal')
            ->add('deleMuni')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'DsCorp\Empresa\EmpresaBundle\Entity\direccion_empresa'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'dscorp_empresa_empresabundle_direccion_empresa';
    }
}
