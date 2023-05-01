<?php

namespace HPT\DefaultBundle\Entity;


use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Sala
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="HPT\DefaultBundle\Entity\SalaRepository")
 */
class Sala
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="Nombre", type="string", length=100)
     * @Assert\NotBlank(message="Por favor,escriba el nombre de la Sala")
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="Codigo", type="string", length=255)
     */
    private $codigo;

    /**
     * @ORM\OneToMany(targetEntity="HPT\DefaultBundle\Entity\Trabajador", mappedBy="sala")
     */
    private $trabajador;

    public function  __construct()
    {
        $this->trabajador=new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function addTrabajador(\HPT\DefaultBundle\Entity\Trabajador $trabajadores)
    {
        $this->trabajador[]=$trabajadores;
    }

    public  function getTrabajadores()
    {
        return $this->trabajador;
    }


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Sala
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    
        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set codigo
     *
     * @param string $codigo
     * @return Sala
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    
        return $this;
    }

    /**
     * Get codigo
     *
     * @return string 
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    public function __toString()
    {
        return $this->getNombre();
    }

}
