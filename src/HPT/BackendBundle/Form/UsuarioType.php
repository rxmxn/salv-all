<?php
/**
 * Created by PhpStorm.
 * User: ramon
 * Date: 13/05/14
 * Time: 23:14
 */

// src/HPT/UsuarioBundle/Form/Frontend/UsuarioType.php
namespace HPT\BackendBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UsuarioType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('apellidos')
            ->add('ci')
            ->add('fechaNacimiento', 'birthday')
            ->add('pais')
            ->add('email','email')
            ->add('password', 'repeated', array(
                    'type' => 'password',
                    'invalid_message' => 'Las dos contraseñas deben coincidir'))
            ->add('direccion')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
                'data_class' => 'HPT\UsuarioBundle\Entity\Usuario'
            ));
    }

    public function getName()
    {
        return 'HPT_backendbundle_usuariotype';
    }
}