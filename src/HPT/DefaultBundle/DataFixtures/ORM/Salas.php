<?php
/**
 * Created by PhpStorm.
 * User: Ramon
 * Date: 08/04/2015
 * Time: 3:28
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
use HPT\DefaultBundle\Entity\Sala;

/**
 * Fixtures de la entidad Sala.
 * Crea noticias de prueba con información muy realista.
 */
//la siguiente se pone si se quiere ordenado

//class Salas implements FixtureInterface, ContainerAwareInterface
class Salas extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    // Si se quiere ordenado
    public function getOrder()
    {
        return 20;
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

        $nombres = ['A', 'B', 'C', 'D', 'E'];
        $codigos = ['1.1', '2.3', '5.8', '8.13', '13.21'];

        for ($i=0; $i<5; $i++) {
            $salas = new Sala();

            $salas->setNombre($nombres[$i]);
            $salas->setCodigo($codigos[$i]);

            $manager->persist($salas);
        }

        $manager->flush();
    }
}
