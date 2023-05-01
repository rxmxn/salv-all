<?php
/**
 * Created by PhpStorm.
 * User: Ramon
 * Date: 08/04/2015
 * Time: 2:50
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
use HPT\DefaultBundle\Entity\Noticias;

/**
 * Fixtures de la entidad Noticias.
 * Crea noticias de prueba con información muy realista.
 */
//la siguiente se pone si se quiere ordenado

//class MisNoticias implements FixtureInterface, ContainerAwareInterface
class MisNoticias extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    // Si se quiere ordenado
    public function getOrder()
    {
        return 10;
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

        $titulos = ['Nueva vacuna', 'Celebración!', 'Encuentro anual', 'Postgrado', 'Construcción'];
        $autores = ['Francisco', 'Jorge', 'Vivian', 'Jose', 'Maria'];
        $categorias = ['Med', 'Cel', 'Cel', 'Edu', 'Otr'];
        $textos = [
            "Trabajar por la satisfacción plena de nuestros pacientes y población y por
            consolidar una adecuada práctica médica que garantice la calidad de nuestros Hospitales.",
            "Brindamos Docencia Médica Superior y de Licenciatura en Enfermería, así como Docencia Médica
            Media y pertenecemos a la Facultad del mismo nombre Dr. Salvador Allende.",
            "Atendemos una población aproximada de 500 000 habitantes, distribuidos en 12 áreas de Atención
            Primaria de Salud en Ciudad de La Habana y en 9 Municipios de provincia Habana.",
            "Misión Garantizar las acciones de promoción, prevención, atención y rehabilitación de las enfermedades
            con una mayor calidad y satisfacción de la población y los trabajadores. Visión Somos un hospital que
            consolida y perfecciona sus procesos.",
            "Hospital Provincial Clínico Quirúrgico, categoría II, de estructura horizontal, pabellonal, con
            136 000 m² de extensión. Cuenta con 40 edificaciones, de ellas 24 salas de hospitalización, que atiende
            a la población del país."
        ];
        $rutas = ['DSC00026.jpg', 'DSC00028.jpg', 'DSC00496.jpg', 'pic1.jpg', 'pic3.jpg'];

        for ($i=0; $i<5; $i++) {
            $noticias = new Noticias();

            $noticias->setTitular($titulos[$i]);
            $noticias->setNombreAutor($autores[$i]);
            $noticias->setCategoria($categorias[$i]);
            $noticias->setFechaArticulo(new \DateTime('now - '.rand(7000, 20000).' days'));
            $noticias->setTexto($textos[$i]);
            $noticias->setResumen(substr($textos[$i],0,20));
            $noticias->setRutaFoto($rutas[$i]);

            $manager->persist($noticias);
        }

        $manager->flush();
    }
}
