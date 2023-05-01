<?php
/**
 * Created by PhpStorm.
 * User: Ramon
 * Date: 08/04/2015
 * Time: 3:35
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
use HPT\DefaultBundle\Entity\Trabajador;

/**
 * Fixtures de la entidad Trabajador.
 * Crea noticias de prueba con información muy realista.
 */
//la siguiente se pone si se quiere ordenado

//class Salas implements FixtureInterface, ContainerAwareInterface
class Trabajadores extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    // Si se quiere ordenado
    public function getOrder()
    {
        return 30;
    }

    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {
        // Obtener todas las salas de la base de datos
        $salas = $manager->getRepository('HPTDefaultBundle:Sala')->findAll();

        $nombres = ['Abel', 'Jose', 'Claudia', 'Dulce', 'Ernesto'];
        $codigos = ['3.14', '1.5', '9.2', '6.5', '13'];
        $categorias = ['Doctor', 'Enfermero', 'Limpieza', 'Profesor', 'Auxiliar'];
        $tipos_categorias = ['Medicina', 'Medicina', 'Staff', 'Docencia', 'Medicina'];


        for ($i=0; $i<5; $i++) {
            $trabajadores = new Trabajador();

            $trabajadores->setNombre($nombres[$i]);
            $trabajadores->setCodigo($codigos[$i]);
            $trabajadores->setCategoria($categorias[$i]);
            $trabajadores->setTipoDeCategoria($tipos_categorias[$i]);
            $trabajadores->setSala($salas[$i]);

            $manager->persist($trabajadores);
        }

        $manager->flush();
    }
}