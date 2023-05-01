<?php

namespace HPT\DefaultBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Trabajador
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="HPT\DefaultBundle\Entity\TrabajadorRepository")
 */
class Trabajador
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
     * @ORM\Column(name="Codigo", type="string", length=255)
     */
    private $codigo;

    /**
     * @var string
     *
     * @ORM\Column(name="Nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="Categoria", type="string", length=255)
     */
    private $categoria;

    /**
     * @var string
     *
     * @ORM\Column(name="TipoDeCategoria", type="string", length=255)
     */
    private $tipoDeCategoria;

    /**
     * @ORM\ManyToOne(targetEntity="HPT\DefaultBundle\Entity\Sala", inversedBy="trabajador")
     * @ORM\JoinColumn(name="sala_id", referencedColumnName="id")
     */
    private $sala;

    /**
     *@ORM\ManyToMany(targetEntity="Servicio", inversedBy="trabajador")
     *@ORM\JoinTable(name="serv_trab", joinColumns= {@ORM\JoinColumn(name="servicio_id", referencedColumnName="id")}, inverseJoinColumns={@ORM\JoinColumn(name="trabajador_id", referencedColumnName="id")})
     */
    private $servicio;

    public function __construct()
    {
        $this->servicio = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function addServicio(\HPT\DefaultBundle\Entity\Servicio $servicio)
    {
        $this->servicio[] = $servicio;
    }

    public function getServicio()
    {
        return $this->servicio;
    }

    public function RemoveServivio(\HPT\DefaultBundle\Entity\Servicio $servicio)
    {
        $this->servicio->removeElement($servicio);
    }

    /**
     * @param \HPT\DefaultBundle\Entity\Sala $sala
     * @return Trabajador
     */
    public function setSala(\HPT\DefaultBundle\Entity\Sala $sala)
    {
        $this->sala=$sala;
    }

    /**
     * @return \HPT\DefaultBundle\Entity\Sala
     */
    public function getSala()
    {
        return $this->sala;
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
     * Set codigo
     *
     * @param string $codigo
     * @return Trabajador
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

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Trabajador
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
     * Set categoria
     *
     * @param string $categoria
     * @return Trabajador
     */
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
    
        return $this;
    }

    /**
     * Get categoria
     *
     * @return string 
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * Set tipoDeCategoria
     *
     * @param string $tipoDeCategoria
     * @return Trabajador
     */
    public function setTipoDeCategoria($tipoDeCategoria)
    {
        $this->tipoDeCategoria = $tipoDeCategoria;
    
        return $this;
    }

    /**
     * Get tipoDeCategoria
     *
     * @return string 
     */
    public function getTipoDeCategoria()
    {
        return $this->tipoDeCategoria;
    }

    public function __toString()
    {
        return $this->getNombre();
    }
}
