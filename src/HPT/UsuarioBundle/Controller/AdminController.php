<?php

namespace HPT\UsuarioBundle\Controller;

use Symfony\Component\Security\Acl\Domain\ObjectIdentity,
    Symfony\Component\Security\Acl\Domain\UserSecurityIdentity,
    Symfony\Component\Security\Acl\Permission\MaskBuilder;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;
use HPT\UsuarioBundle\Entity\Usuario;
use HPT\UsuarioBundle\Form\Frontend\UsuarioType;
use HPT\UsuarioBundle\Entity\Admin;
use HPT\UsuarioBundle\Form\Extranet\AdminType;

class AdminController extends Controller
{
    public function loginAction(Request $peticion)
    {
        /*
         * A través de SecurityContext se obtiene el token que representa al usuario de la
         * aplicación (incluso a los usuarios anónimos).
         */
        $sesion = $peticion->getSession();

        $error = $peticion->attributes->get(
            SecurityContext::AUTHENTICATION_ERROR,
            $sesion->get(SecurityContext::AUTHENTICATION_ERROR)
        );

        return $this->render('UsuarioBundle:Admin:login.html.twig', array(
            'last_username' => $sesion->get(SecurityContext::LAST_USERNAME),
            'error' => $error
        ));
    }

    public function adminEditarAction(Request $peticion, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $admin = $em->getRepository('UsuarioBundle:Admin')->findOneById($id);

        $formulario = $this->createForm(new AdminType(), $admin);

        if ($peticion->getMethod() == 'POST')
        {
            $formulario->handleRequest($peticion);

            if ($formulario->isValid())
            {
                $encoder = $this->container->get('security.encoder_factory')->getEncoder($admin);
                $admin->setSalt(md5(time()));
                $passwordCodificado = $encoder->encodePassword(
                    $admin->getPassword(),
                    $admin->getSalt()
                );
                $admin->setPassword($passwordCodificado);

                // actualizar el perfil del usuario
                $em->persist($admin);
                $em->flush();

                $this->get('session')->getFlashBag()->add('notaBuena','Se ha modificado el admin');

                //Si _todo sale bien, se envia el usuario para la portada.
                return $this->render('UsuarioBundle:Admin:admin_perfil.html.twig', array( 'admin' => $admin ));
            }
        }

        return $this->render('UsuarioBundle:Admin:admin_editar.html.twig', array(
            'admin' => $admin,
            'formulario' => $formulario->createView()
        ));
    }

    public function adminPerfilAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $admin = $em->getRepository('UsuarioBundle:Admin')->findOneById($id);

        return $this->render('UsuarioBundle:Admin:admin_perfil.html.twig', array( 'admin' => $admin ));
    }

    public function usuarioBorrarAction(Request $peticion, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $usuario = $em->getRepository('UsuarioBundle:Usuario')->findOneById($id);

        if ($peticion->getMethod() == 'POST')
        {
            // borrar el usuario
            $em->remove($usuario);
            $em->flush();

            //Hay que tener cuidado con borrar, pq el usuario que se esta borrando esta logueado,
            //por lo que habria que desloguearlo 1ro para despues borrarlo.
            //Talvez se le podria mandar un correo a su gmail con un link para borrar su usuario!
            //Si _todo sale bien, y es un admin, se le envia a ver la lista de usuarios
            //Mientras no se logre lo del email, el unico que puede borrar es el admin
            return $this->redirect($this->generateUrl('admin_usuario_listar'));
        }

        return $this->render('UsuarioBundle:Admin:usuario_borrar.html.twig', array( 'usuario' => $usuario ));
    }

    public function usuarioListarAction()
    {
        $em = $this->getDoctrine()->getManager();

        $usuarios = $em->getRepository('UsuarioBundle:Usuario')->findAll();

        return $this->render('UsuarioBundle:Admin:listar_usuarios.html.twig', array(
            'usuarios' => $usuarios,
            'nivel' => "usuarios"
        ));
    }

}
