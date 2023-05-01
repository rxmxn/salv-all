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

class UsuarioController extends Controller
{
    public function usuarioRegistroAction(Request $peticion)
    {
        $usuario = new Usuario();

        $formulario = $this->createForm(new UsuarioType(), $usuario);

        if($peticion->getMethod() == 'POST')
        {
            $formulario->handleRequest($peticion);

            if ($formulario->isValid())
            {
                $user = twig_split_filter($usuario->getEmail(),'@');
                $usuario->setUsername($user[0]);

                $encoder = $this->container->get('security.encoder_factory')->getEncoder($usuario);
                $usuario->setSalt(md5(time()));
                $passwordCodificado = $encoder->encodePassword(
                    $usuario->getPassword(),
                    $usuario->getSalt()
                );
                $usuario->setPassword($passwordCodificado);

                $em = $this->getDoctrine()->getManager();
                $em->persist($usuario);
                $em->flush();

                //Seguridad por ACL
                $this->get('security.context')->getToken()->setUser($usuario);
                $usuario_security = $this->get('security.context')->getToken()->getUser();

                $idObjeto = ObjectIdentity::fromDomainObject($usuario);
                $idUsuario = UserSecurityIdentity::fromAccount($usuario_security);

                $acl = $this->get('security.acl.provider')->createAcl($idObjeto);
                $acl->insertObjectAce($idUsuario, MaskBuilder::MASK_EDIT);
                $this->get('security.acl.provider')->updateAcl($acl);
                // Fin de Seguridad por ACL

                return $this->redirect($this->generateUrl('backend_usuario_listar'));
                //$this->get('session')->getFlashBag()->add('notaBuena','Se ha introducido un nuevo '.$nivel);
            }
        }

        return $this->render(
            'BackendBundle:Usuarios:usuario_registro.html.twig',
            array('formulario' => $formulario->createView())
        );
    }

    public function usuarioEditarAction(Request $peticion, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $usuario = $em->getRepository('UsuarioBundle:Usuario')->findOneById($id);

        $formulario = $this->createForm(new UsuarioType(), $usuario);

        if ($peticion->getMethod() == 'POST')
        {
            $formulario->handleRequest($peticion);

            if ($formulario->isValid())
            {
                $encoder = $this->container->get('security.encoder_factory')->getEncoder($usuario);
                $usuario->setSalt(md5(time()));
                $passwordCodificado = $encoder->encodePassword(
                    $usuario->getPassword(),
                    $usuario->getSalt()
                );
                $usuario->setPassword($passwordCodificado);

                // actualizar el perfil del usuario
                $em->persist($usuario);
                $em->flush();

                $this->get('session')->getFlashBag()->add('notaBuena','Se ha modificado el usuario');

                //Si _todo sale bien, se envia el usuario para la portada.
                return $this->redirect($this->generateUrl('backend_usuario_listar'));
            }
        }

        return $this->render('BackendBundle:Usuarios:usuario_editar.html.twig', array(
            'usuario' => $usuario,
            'formulario' => $formulario->createView()
        ));
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
            return $this->redirect($this->generateUrl('backend_usuario_listar'));
        }

        return $this->render('BackendBundle:Usuarios:usuario_borrar.html.twig', array( 'usuario' => $usuario ));
    }

    public function usuarioListarAction()
    {
        $em = $this->getDoctrine()->getManager();

        $usuarios = $em->getRepository('UsuarioBundle:Usuario')->findAll();

        return $this->render('BackendBundle:Usuarios:listar_usuarios.html.twig', array(
            'usuarios' => $usuarios,
            'nivel' => "usuarios"
        ));
    }
}
