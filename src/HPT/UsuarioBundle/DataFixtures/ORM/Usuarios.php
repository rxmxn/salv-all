<?php

namespace HPT\UsuarioBundle\DataFixtures\ORM;

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
use HPT\UsuarioBundle\Entity\Usuario;

/**
 * Fixtures de la entidad Usuario.
 * Crea 500 usuarios de prueba con información muy realista.
 */
//la siguiente se pone si se quiere ordenado

//class Usuarios implements FixtureInterface, ContainerAwareInterface
class Usuarios extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    //Si se quiere ordenado
    public function getOrder()
    {
        return 50;
    }

    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {
        // Obtener todas las ciudades de la base de datos
        //$ciudades = $manager->getRepository('CiudadBundle:Ciudad')->findAll();

        $ciudades = ["Habana", "Madrid", "New York", "Tokio", "Paris"];

        for ($i=1; $i<=5; $i++) {
            $usuario = new Usuario();

            $usuario->setNombre($this->getNombre());
            $usuario->setApellidos($this->getApellidos());
            $usuario->setEmail('usuario'.$i.'@localhost.com');

            $usuario->setUsername('usuario'.$i);

            $usuario->setSalt(base_convert(sha1(uniqid(mt_rand(), true)), 16, 36));

            $passwordEnClaro = 'usuario'.$i;
            $encoder = $this->container->get('security.encoder_factory')->getEncoder($usuario);
            $passwordCodificado = $encoder->encodePassword($passwordEnClaro, $usuario->getSalt());
            $usuario->setPassword($passwordCodificado);

            //$ciudad = $ciudades[array_rand($ciudades)];
            //$usuario->setDireccion($this->getDireccion($ciudad));
            //$usuario->setCiudad($ciudad);
            $usuario->setDireccion('calle'.$i);

            $usuario->setFechaNacimiento(new \DateTime('now - '.rand(7000, 20000).' days'));

            $ci = substr(rand(), 0, 11);
            $usuario->setCI($ci.substr("TRWAGMYFPDXBNJZSQVHLCKE", strtr($ci, "XYZ", "012")%23, 1));

            $usuario->setPais('pais'.$i);

            $usuario->setCiudad($ciudades[$i-1]);
            $usuario->setEpicrisis("NINGUNA");
            $usuario->setTratamiento("NINGUNO");
            $usuario->setFax("esteEsMiFax");
            $usuario->setSexo("m");
            $usuario->setTelefono("1111110");


            $manager->persist($usuario);
/*
            //Seguridad por ACL
            $proveedor = $this->container->get('security.acl.provider');
            //$this->get('security.context')->getToken()->setUser($usuario);
            //$usuario_security = $this->get('security.context')->getToken()->getUser();
            $idObjeto = ObjectIdentity::fromDomainObject($usuario);
            $idUsuario = UserSecurityIdentity::fromAccount($usuario);
            try {
                $acl = $proveedor->findAcl($idObjeto, array($idUsuario));
            } catch (\Symfony\Component\Security\Acl\Exception\AclNotFoundException $e) {
                $acl = $proveedor->createAcl($idObjeto);
            }
            $aces = $acl->getObjectAces();
            foreach ($aces as $index => $ace) {
                $acl->deleteObjectAce($index);
            }
            $acl->insertObjectAce($idUsuario, MaskBuilder::MASK_EDIT);
            $proveedor->updateAcl($acl);
            //Fin Seguridad por ACL
*/
        }

        $manager->flush();
    }

    /**
     * Generador aleatorio de nombres de personas.
     * Aproximadamente genera un 50% de hombres y un 50% de mujeres.
     *
     * @return string Nombre aleatorio generado para el usuario.
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
     * @return string Apellido aleatorio generado para el usuario.
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
