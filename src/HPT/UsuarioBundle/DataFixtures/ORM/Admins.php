<?php
/**
 * Created by PhpStorm.
 * User: Ramon
 * Date: 08/04/2015
 * Time: 4:37
 */

namespace HPT\adminBundle\DataFixtures\ORM;

use Symfony\Component\Security\Acl\Domain\ObjectIdentity,
    Symfony\Component\Security\Acl\Domain\UserSecurityIdentity,
    Symfony\Component\Security\Acl\Permission\MaskBuilder;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Security\Core\SecurityContext;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use HPT\DefaultBundle\Entity\Reservacion;
use HPT\UsuarioBundle\Entity\Admin;

/**
 * Fixtures de la entidad admin.
 * Crea 500 admins de prueba con información muy realista.
 */
//la siguiente se pone si se quiere ordenado

//class admins implements FixtureInterface, ContainerAwareInterface
class Admins extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    //Si se quiere ordenado
    public function getOrder()
    {
        return 70;
    }

    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {
        for ($i=1; $i<=5; $i++) {
            $admin = new Admin();

            $admin->setNombre($this->getNombre());
            $admin->setApellidos($this->getApellidos());
            $admin->setEmail('admin'.$i.'@localhost.com');

            $admin->setUsername('admin'.$i);

            $admin->setSalt(base_convert(sha1(uniqid(mt_rand(), true)), 16, 36));

            $passwordEnClaro = 'admin'.$i;
            $encoder = $this->container->get('security.encoder_factory')->getEncoder($admin);
            $passwordCodificado = $encoder->encodePassword($passwordEnClaro, $admin->getSalt());
            $admin->setPassword($passwordCodificado);

            $ci = substr(rand(), 0, 11);
            $admin->setCI($ci.substr("TRWAGMYFPDXBNJZSQVHLCKE", strtr($ci, "XYZ", "012")%23, 1));

            $manager->persist($admin);
        }

        $manager->flush();
    }

    /**
     * Generador aleatorio de nombres de personas.
     * Aproximadamente genera un 50% de hombres y un 50% de mujeres.
     *
     * @return string Nombre aleatorio generado para el admin.
     */
    private function getNombre()
    {
        // Los nombres más populares en España según el INE

        $hombres = array(
            'Antonio', 'José', 'Manuel', 'Francisco', 'Juan', 'David',
            'José Antonio', 'José Luis', 'Jesús', 'Javier', 'Francisco Javier',
            'Carlos', 'Daniel', 'Miguel', 'Rafael', 'Pedro', 'José Manuel',
            'Ángel', 'Alejandro', 'Miguel Ángel', 'José María', 'Fernando',
            'Luis', 'Sergio', 'Pablo', 'Jorge', 'Alberto'
        );
        $mujeres = array(
            'María Carmen', 'María', 'Carmen', 'Josefa', 'Isabel', 'Ana María',
            'María Dolores', 'María Pilar', 'María Teresa', 'Ana', 'Francisca',
            'Laura', 'Antonia', 'Dolores', 'María Angeles', 'Cristina', 'Marta',
            'María José', 'María Isabel', 'Pilar', 'María Luisa', 'Concepción',
            'Lucía', 'Mercedes', 'Manuela', 'Elena', 'Rosa María'
        );

        if (rand() % 2) {
            return $hombres[array_rand($hombres)];
        } else {
            return $mujeres[array_rand($mujeres)];
        }
    }

    /**
     * Generador aleatorio de apellidos de personas.
     *
     * @return string Apellido aleatorio generado para el admin.
     */
    private function getApellidos()
    {
        // Los apellidos más populares en España según el INE

        $apellidos = array(
            'García', 'González', 'Rodríguez', 'Fernández', 'López', 'Martínez',
            'Sánchez', 'Pérez', 'Gómez', 'Martín', 'Jiménez', 'Ruiz',
            'Hernández', 'Díaz', 'Moreno', 'Álvarez', 'Muñoz', 'Romero',
            'Alonso', 'Gutiérrez', 'Navarro', 'Torres', 'Domínguez', 'Vázquez',
            'Ramos', 'Gil', 'Ramírez', 'Serrano', 'Blanco', 'Suárez', 'Molina',
            'Morales', 'Ortega', 'Delgado', 'Castro', 'Ortíz', 'Rubio', 'Marín',
            'Sanz', 'Iglesias', 'Nuñez', 'Medina', 'Garrido'
        );

        return $apellidos[array_rand($apellidos)].' '.$apellidos[array_rand($apellidos)];
    }

}
