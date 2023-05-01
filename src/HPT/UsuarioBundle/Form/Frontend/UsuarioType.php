<?php
/**
 * Created by PhpStorm.
 * User: ramon
 * Date: 13/05/14
 * Time: 23:14
 */

// src/HPT/UsuarioBundle/Form/Frontend/UsuarioType.php
namespace HPT\UsuarioBundle\Form\Frontend;

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
            ->add('fechaNacimiento', 'birthday', array(
                'format'          => 'yyyy-MM-dd',
                'years'           => range(date('Y')-80, date('Y')),
                'empty_value'     => array('year' => '----', 'month' => '----', 'day' => '----')
            ))
            ->add('pais')
//            ->add('pais', 'choice', array(
//                'required' => false,
//                'choices' => array('Cuba' => 'Cuba', 'Venezuela' => 'Venezuela', 'España' => 'España'),
//                'empty_value'  => '----'
//            ))
            ->add('email','email')
            ->add('password', 'repeated', array(
                'type' => 'password',
                'invalid_message' => 'Las dos contraseñas deben coincidir'))
            ->add('direccion')
            ->add('sexo', 'choice', array(
                    'choices' => array(
                        'm' => 'Masculino',
                        'f' => 'Femenino'
                    ),
                    'required'    => false,
                    'empty_value'  => '----'
                ))
            ->add('ciudad')
            ->add('telefono')
            ->add('fax')
            ->add('epicrisis')
            ->add('tratamiento')
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
        return 'HPT_usuariobundle_usuariotype';
    }
}