<?php
/**
 * Created by PhpStorm.
 * User: ramon
 * Date: 13/05/14
 * Time: 23:14
 */

// src/HPT/UsuarioBundle/Form/Extranet/AdminType.php
namespace HPT\BackendBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AdminType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('apellidos')
            ->add('ci')
            ->add('email','email')
            ->add('username')
            ->add('password', 'repeated', array(
                'type' => 'password',
                'invalid_message' => 'Las dos contraseñas deben coincidir'))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'HPT\UsuarioBundle\Entity\Admin'
        ));
    }

    public function getName()
    {
        return 'HPT_backendbundle_admintype';
    }
}