<?php
/**
 * Created by PhpStorm.
 * User: Ramon
 * Date: 08/04/2015
 * Time: 4:23
 */

namespace HPT\DefaultBundle\DataFixtures;

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

/**
 * Fixtures de la entidad Noticias.
 * Crea noticias de prueba con información muy realista.
 */
//la siguiente se pone si se quiere ordenado

//class MisNoticias implements FixtureInterface, ContainerAwareInterface
class Reservas extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    // Si se quiere ordenado
    public function getOrder()
    {
        return 60;
    }

    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {
        // Obtener todas las ciudades de la base de datos
        $servicios = $manager->getRepository('HPTDefaultBundle:Servicio')->findAll();
        $usuarios = $manager->getRepository('UsuarioBundle:Usuario')->findAll();

        for ($i=0; $i<5; $i++) {
            $reservacion = new Reservacion();

            $reservacion->setFecha(new \DateTime('now + '.rand(7000, 20000).' days'));

            $reservacion->addServicio($servicios[$i]);
            $reservacion->setUsuario($usuarios[$i]);
            $manager->persist($reservacion);
        }

        $manager->flush();
    }
}