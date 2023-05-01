<?php

namespace HPT\UsuarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints as DoctrineAssert;
use Symfony\Component\Validator\ExecutionContext;

/**
 * Usuario
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="HPT\UsuarioBundle\Entity\UsuarioRepository")
 * @DoctrineAssert\UniqueEntity("email")
 */
class Usuario implements UserInterface
{
    function eraseCredentials()
    {
    }
    function getRoles()
    {
        return array('ROLE_USUARIO');
    }

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
     * @ORM\Column(name="nombre", type="string", length=100)
     * @Assert\NotBlank(message = "Por favor, escribe tu nombre")
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="apellidos", type="string", length=255)
     */
    private $apellidos;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=100)
     * UniqueEntity (antes de iniciar la clase) busca en la BD que no haya ningun username igual
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, unique=true)
     * @Assert\Email()
     * Email() obliga a que el formato sea el correspondiente a un email valido
     * Assert\Email(checkMX=true) permite asegurar que el email exista, utiliza la
     * función checkdnsrr() de PHP para comprobar que existe el servidor al que referencia el email.
     * Poner esto cuando se terminen de hacer las pruebas con los usuarios y pasemos a produccion!!!!!!!
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255)
     * @Assert\Length(min = 6)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="salt", type="string", length=255)
     */
    private $salt;

    /**
     * @var string
     *
     * @ORM\Column(name="Direccion", type="text")
     */
    private $direccion;

    /**
     * @var string
     *
     * @ORM\Column(name="CI", type="string", length=11)
     */
    private $ci;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Fecha_nacimiento", type="datetime")
     */
    private $fechaNacimiento;

    /**
     * @var string
     *
     * @ORM\Column(name="Pais", type="string", length=30)
     */
    private $pais;

    /**
     * @var string
     *
     * @ORM\Column(name="Ciudad", type="string", length=30)
     */
    private $ciudad;

    /**
     * @var string
     *
     * @ORM\Column(name="Sexo", type="string", length=10)
     */
    private $sexo;

    /**
    * @var string
    *
    * @ORM\Column(name="Telefono", type="string", length=30)
    */
    private $telefono;

    /**
     * @var string
     *
     * @ORM\Column(name="Fax", type="string", length=30)
     */
    private $fax;

    /**
     * @var string
     *
     * @ORM\Column(name="Epicrisis", type="text")
     */
    private $epicrisis;

    /**
     * @var string
     *
     * @ORM\Column(name="Tratamiento", type="text")
     */
    private $tratamiento;

    /**
     * @ORM\OneToMany(targetEntity="HPT\DefaultBundle\Entity\Reservacion", mappedBy="usuario")
     */
    private $reservacion;

    public function __construct()
    {
        $this->reservacion = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function addReservacion(\HPT\DefaultBundle\Entity\Reservacion $reservacion)
    {
        $this->reservacion[] = $reservacion;
    }

    public function getReservacion()
    {
        return $this->reservacion;
    }

    public function RemoveReservacion(\HPT\DefaultBundle\Entity\Reservacion $reservacion)
    {
        $this->reservacion->removeElement($reservacion);
    }

/*
    public function __construct($nivel)
    {
        if($nivel=="admin")
            $admin = true;
        else
            $admin = false;
    }
*/
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
     * @return Usuario
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
     * Set apellidos
     *
     * @param string $apellidos
     * @return Usuario
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    /**
     * Get apellidos
     *
     * @return string
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * Set username
     *
     * @param string $username
     * @return Usuario
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Usuario
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return Usuario
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set salt
     *
     * @param string $salt
     * @return Usuario
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;

        return $this;
    }

    /**
     * Get salt
     *
     * @return string 
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     * @return Usuario
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get direccion
     *
     * @return string 
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    //A esto se le llama metodo magico, y es como se vera la Entidad como texto, cuando me quiera referir a ella
    //__ significa que se esta modificando el metodo toString() para esta clase en especifico
    public function __toString()
    {
        return $this->getNombre().' '.$this->getApellidos();
    }

    /**
     * Set ci
     *
     * @param string $ci
     * @return Usuario
     */
    public function setCI($ci)
    {
        $this->ci = $ci;

        return $this;
    }

    /**
     * Get ci
     *
     * @return string
     */
    public function getCI()
    {
        return $this->ci;
    }

    /**
     * Set fechaNacimiento
     *
     * @param \DateTime $fechaNacimiento
     * @return Usuario
     */
    public function setFechaNacimiento($fechaNacimiento)
    {
        $this->fechaNacimiento = $fechaNacimiento;

        return $this;
    }

    /**
     * Get fechaNacimiento
     *
     * @return \DateTime
     */
    public function getFechaNacimiento()
    {
        return $this->fechaNacimiento;
    }

    /**
     * Set pais
     *
     * @param string $pais
     * @return Usuario
     */
    public function setPais($pais)
    {
        $this->pais = $pais;

        return $this;
    }

    /**
     * Get pais
     *
     * @return string
     */
    public function getPais()
    {
        return $this->pais;
    }

    /**
    * Set sexo
    *
    * @param string $sexo
    * @return Usuario
    */
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;

        return $this;
    }

    /**
     * Get sexo
     *
     * @return string
     */
    public function getSexo()
    {
        return $this->sexo;
    }

    /**
    * Set telefono
    *
    * @param string $telefono
    * @return Usuario
    */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get telefono
     *
     * @return string
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set fax
     *
     * @param string $fax
     * @return Usuario
     */
    public function setFax($fax)
    {
        $this->fax = $fax;

        return $this;
    }

    /**
     * Get fax
     *
     * @return string
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * Set ciudad
     *
     * @param string $ciudad
     * @return Usuario
     */
    public function setCiudad($ciudad)
    {
        $this->ciudad = $ciudad;

        return $this;
    }

    /**
     * Get ciudad
     *
     * @return string
     */
    public function getCiudad()
    {
        return $this->ciudad;
    }

    /**
     * Set epicrisis
     *
     * @param string $epicrisis
     * @return Usuario
     */
    public function setEpicrisis($epicrisis)
    {
        $this->epicrisis = $epicrisis;

        return $this;
    }

    /**
     * Get epicrisis
     *
     * @return string
     */
    public function getEpicrisis()
    {
        return $this->epicrisis;
    }

    /**
     * Set tratamiento
     *
     * @param string $tratamiento
     * @return Usuario
     */
    public function setTratamiento($tratamiento)
    {
        $this->tratamiento = $tratamiento;

        return $this;
    }

    /**
     * Get tratamiento
     *
     * @return string
     */
    public function getTratamiento()
    {
        return $this->tratamiento;
    }

    /*
        public function esCIValido(ExecutionContext $context)
        {
            $dni = $this->getCI();
            // Comprobar que el formato sea correcto
            if (0 === preg_match("^[11]$", $dni))
            {
                $context->addViolationAt('dni', 'El CI introducido no tiene
                el formato correcto (11 digitos consecutivos, sin guiones y
                sin dejar ningún espacio en blanco)', array(), null);
                return;
            }
        }
    */
    /**
     * @Assert\True(message = "Debes tener al menos 18 años")
     */
    public function isMayorDeEdad()
    {
        return $this->fechaNacimiento <= new \DateTime('today - 18 years');
    }
}
