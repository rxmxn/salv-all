<?php

namespace HPT\DefaultBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reservacion
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="HPT\DefaultBundle\Entity\ReservacionRepository")
 */
class Reservacion
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
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="datetime")
     */
    private $fecha;

    /**
     *@ORM\ManyToMany(targetEntity="Servicio", inversedBy="reservacion")
     *@ORM\JoinTable(name="serv_reser", joinColumns= {@ORM\JoinColumn(name="servicio_id", referencedColumnName="id")}, inverseJoinColumns={@ORM\JoinColumn(name="reservacion_id", referencedColumnName="id")})
     */
    private $servicio;

    /**
     * @ORM\ManyToOne(targetEntity="HPT\UsuarioBundle\Entity\Usuario", inversedBy="reservacion")
     * @ORM\JoinColumn(name="usuario_id", referencedColumnName="id")
     */
    private $usuario;

    public function setUsuario(\HPT\UsuarioBundle\Entity\Usuario $usuario)
    {
        $this->usuario = $usuario;
    }

    public function getUsuario()
    {
        return $this->usuario;
    }

    public function __construct()
    {
        $this->servicio = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function addServicio(\HPT\DefaultBundle\Entity\Servicio $servicio)
    {
        $servicio->addReservacion($this);
        $this->servicio[] = $servicio;
    }

    public function getServicio()
    {
        return $this->servicio;
    }

    public function RemoveServivio(\HPT\DefaultBundle\Entity\Servicio $servicio)
    {
        $servicio->RemoveReservacion($this);
        $this->servicio->removeElement($servicio);
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
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return Reservacion
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    
        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime 
     */
    public function getFecha()
    {
        return $this->fecha;
    }
}
