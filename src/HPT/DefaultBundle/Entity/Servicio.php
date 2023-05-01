<?php

namespace HPT\DefaultBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Servicio
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="HPT\DefaultBundle\Entity\ServicioRepository")
 */
class Servicio
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
     * @ORM\Column(name="Categoria", type="string", length=255)
     */
    private $categoria;

    /**
     * @var string
     *
     * @ORM\Column(name="Nombre_serv", type="text")
     */
    private $nombreServ;

    /**
     * @var string
     *
     * @ORM\Column(name="Descripcion", type="text")
     */
    private $descripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="Unidad", type="string", length=255)
     */
    private $unidad;

    /**
     * @var float
     *
     * @ORM\Column(name="Precio", type="float")
     */
    private $precio;

    /**
     *@ORM\ManyToMany(targetEntity="Trabajador", mappedBy="servicio")
     */
    private $trabajador;

    /**
     *@ORM\ManyToMany(targetEntity="Reservacion", mappedBy="servicio")
     */
    private $reservacion;

    public function addReservacion(\HPT\DefaultBundle\Entity\Reservacion $reservacion)
    {
        //$reservacion->addServicio($this);
        $this->reservacion[] = $reservacion;
    }

    public function getReservacion()
    {
        return $this->reservacion;
    }

    public function  RemoveReservacion(\HPT\DefaultBundle\Entity\Reservacion $reservacion)
    {
        //$reservacion->RemoveServivio($this);
        $this->reservacion->removeElement($reservacion);

    }

    public function __construct()
    {
        $this->trabajador = new \Doctrine\Common\Collections\ArrayCollection();
        $this->reservacion = new \Doctrine\Common\Collections\ArrayCollection();
    }

    //\HPT\DefaultBundle\Entity\Trabajador
    public function addTrabajador(\HPT\DefaultBundle\Entity\Trabajador $trabajador)
    {
        $trabajador->addServicio($this);
        $this->trabajador[] = $trabajador;
    }

    public function getTrabajador()
    {
        return $this->trabajador;
    }

    public function  RemoveTrabajadores(\HPT\DefaultBundle\Entity\Trabajador $trabajador)
    {
//        foreach ($this->trabajador as $trab) {
//            $this->trabajador->removeElement($trab);
//        }

        //$trabajador->RemoveServivio();
        $trabajador->RemoveServivio($this);
        $this->trabajador->removeElement($trabajador);

    }

    public function __toString()
    {
        return $this->getNombreServ();
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
     * @return Servicio
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
     * Set categoria
     *
     * @param string $categoria
     * @return Servicio
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
     * Set nombreServ
     *
     * @param string $nombreServ
     * @return Servicio
     */
    public function setNombreServ($nombreServ)
    {
        $this->nombreServ = $nombreServ;
    
        return $this;
    }

    /**
     * Get nombreServ
     *
     * @return string 
     */
    public function getNombreServ()
    {
        return $this->nombreServ;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Servicio
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set unidad
     *
     * @param string $unidad
     * @return Servicio
     */
    public function setUnidad($unidad)
    {
        $this->unidad = $unidad;
    
        return $this;
    }

    /**
     * Get unidad
     *
     * @return string 
     */
    public function getUnidad()
    {
        return $this->unidad;
    }

    /**
     * Set precio
     *
     * @param float $precio
     * @return Servicio
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;
    
        return $this;
    }

    /**
     * Get precio
     *
     * @return float 
     */
    public function getPrecio()
    {
        return $this->precio;
    }
}
