<?php
/**
 * Created by PhpStorm.
 * User: Ramon
 * Date: 08/04/2015
 * Time: 3:45
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
use HPT\DefaultBundle\Entity\Servicio;

/**
 * Fixtures de la entidad Trabajador.
 * Crea noticias de prueba con información muy realista.
 */
//la siguiente se pone si se quiere ordenado

//class Salas implements FixtureInterface, ContainerAwareInterface
class Servicios extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    // Si se quiere ordenado
    public function getOrder()
    {
        return 40;
    }

    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {
        // Obtener todas las salas de la base de datos
        $trabajadores = $manager->getRepository('HPTDefaultBundle:Trabajador')->findAll();

        $nombres = ['Adiestramiento para realizar trabajos manuales sencillos.',
            'Arreglo facial por encargo.',
            'Ludoterapia',
            'Elaboración de resumenes médicos a petición del paciente.',
            'Servicio de ambulancia en aeropuerto.'];
        $categorias = ['TERAPIA OCUPACIONAL', 'SERVICIOS DE MEDICINA LEGAL', 'TERAPIA OCUPACIONAL',
            'SERVICIO DE ADMISION', 'SERVICIO DE AMBULANCIA Y AUTOS'];
        $codigos = ['29.09.001', '32.00.001', '29.29.007', '30.01.001', '30.02.006'];
        $descripciones = ['REALIZACION DE TRABAJOS MANUALES SENCILLOS',
            'ARREGLOS FACIALES', 'LUDOTERAPIA', 'RESUMENES MEDICOS', 'TRANSPORTACION POR AMBULANCIA'];
        $precios = [5.00,40.00,10.00,10.00,45.00];


        for ($i=0; $i<5; $i++) {
            $servicios = new Servicio();

            $servicios->setNombreServ($nombres[$i]);
            $servicios->setCategoria($categorias[$i]);
            $servicios->setCodigo($codigos[$i]);
            $servicios->setDescripcion($descripciones[$i]);
            $servicios->setPrecio($precios[$i]);
            $servicios->setUnidad('CUC');
            $servicios->addTrabajador($trabajadores[$i]);

            $manager->persist($servicios);
        }

        $manager->flush();
    }
}