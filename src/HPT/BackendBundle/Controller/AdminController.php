<?php

namespace HPT\BackendBundle\Controller;

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
use HPT\BackendBundle\Form\UsuarioType;
use HPT\UsuarioBundle\Entity\Admin;
use HPT\BackendBundle\Form\AdminType;

class AdminController extends Controller
{
    public function adminRegistroAction(Request $peticion)
    {
        $admin = new Admin();

        $formulario = $this->createForm(new AdminType(), $admin);

        if($peticion->getMethod() == 'POST')
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

                $em = $this->getDoctrine()->getManager();
                $em->persist($admin);
                $em->flush();

                return $this->redirect($this->generateUrl('backend_admin_listar'));
                //$this->get('session')->getFlashBag()->add('notaBuena','Se ha introducido un nuevo '.$nivel);
            }
        }

        return $this->render(
            'BackendBundle:Admin:admin_registro.html.twig',
            array('formulario' => $formulario->createView())
        );
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
                return $this->redirect($this->generateUrl('backend_admin_listar'));
            }
        }

        return $this->render('BackendBundle:Admin:admin_editar.html.twig', array(
            'admin' => $admin,
            'formulario' => $formulario->createView()
        ));
    }

    public function listarAction()
    {
        $em = $this->getDoctrine()->getManager();

        $admins = $em->getRepository('UsuarioBundle:Admin')->findAll();

        return $this->render('BackendBundle:Admin:listar_admins.html.twig', array(
            'usuarios' => $admins,
            'nivel' => "administradores"
        ));
    }

    public function adminBorrarAction(Request $peticion, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $usuario = $em->getRepository('UsuarioBundle:Admin')->findOneById($id);

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
            return $this->redirect($this->generateUrl('backend_admin_listar'));
        }

        return $this->render('BackendBundle:Admin:admin_borrar.html.twig', array( 'usuario' => $usuario ));
    }
}
