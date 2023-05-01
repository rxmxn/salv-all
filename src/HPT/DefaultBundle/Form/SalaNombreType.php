<?php

namespace HPT\DefaultBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SalaNombreType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre','text',array('required'=>true,'invalid_message'=>'Debe introducir un nombre'))   //Obligatorio
              ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'HPT\DefaultBundle\Entity\Sala'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'hpt_defaultbundle_sala';
    }
}
