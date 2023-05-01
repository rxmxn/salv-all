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
use HPT\DefaultBundle\Entity\Reservacion;

class DefaultController extends Controller
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

        return $this->render('UsuarioBundle:Default:login.html.twig', array(
                'last_username' => $sesion->get(SecurityContext::LAST_USERNAME),
                'error' => $error
            ));
    }

    public function cajaLoginAction(Request $peticion)
    {
        return $this->render('UsuarioBundle:Default:cajaLogin.html.twig', array(
                'last_username' => $peticion->request->get(SecurityContext::LAST_USERNAME)
            ));
    }

    public function usuarioRegistroAction(Request $peticion)
    {
        $usuario = new Usuario();
        //poner los valores que se desean por defecto
        //$usuario->setPermiteEmail(true);
        //$usuario->setFechaNacimiento(new \DateTime('today - 18 years'));

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

                /*
                 * TODO:
                 * Si _todo sale OK, enviar un correo al mail que puso el nuevo usuario para comprobar que
                 * es su email. Cuando el usuario le de al link que se le proporcione en el email,
                 * entonces es que se loguea.
                 * Si es un admin el que creo el usuario, se debe de redireccionar para la lista de usuarios.
                 * Hay que ver como saber desde el controlador si el tipo esta logueado como admin.
                */

                return $this->redirect($this->generateUrl('usuario_login'));
                //$this->get('session')->getFlashBag()->add('notaBuena','Se ha introducido un nuevo '.$nivel);
            }
        }

        return $this->render(
            'UsuarioBundle:Default:usuario_registro.html.twig',
            array('formulario' => $formulario->createView())
        );
    }

    public function usuarioEditarAction(Request $peticion, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $usuario = $em->getRepository('UsuarioBundle:Usuario')->findOneById($id);

        //Descomentariar esto cuando no se vayan a usar mas los data fixtures!
//        if (false === $this->get('security.context')->isGranted('EDIT', $usuario))
//        {
//            //Esta linea FUNCIONA PERFECTAMENTE. Esta comentariada pq como cree los usuarios con DataFixtures
//            //y no me funciono bien el ACL, los usuarios no pueden editarse ni ver perfil si dejo esta linea
//            //En cuanto se creen usuarios reales o se arregle lo de dataFixtures, descomentariar esto!!!
//            throw new AccessDeniedException();
//        }

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
                return $this->render('UsuarioBundle:Default:usuario_perfil.html.twig', array( 'usuario' => $usuario ));
            }
        }

        return $this->render('UsuarioBundle:Default:usuario_editar.html.twig', array(
            'usuario' => $usuario,
            'formulario' => $formulario->createView()
        ));
    }

    public function usuarioPerfilAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $usuario = $em->getRepository('UsuarioBundle:Usuario')->findOneById($id);

        //Descomentariar esto cuando no se vayan a usar mas los data fixtures!
//        if (false === $this->get('security.context')->isGranted('VIEW', $usuario))
//        {
//            //Esta linea FUNCIONA PERFECTAMENTE. Esta comentariada pq como cree los usuarios con DataFixtures
//            //y no me funciono bien el ACL, los usuarios no pueden editarse ni ver perfil si dejo esta linea
//            //En cuanto se creen usuarios reales o se arregle lo de dataFixtures, descomentariar esto!!!
//            throw new AccessDeniedException();
//        }

        return $this->render('UsuarioBundle:Default:usuario_perfil.html.twig', array( 'usuario' => $usuario ));
    }

    public function addReservacionAction(Request $request, $id, $servicio_id)
    {
        $em = $this->getDoctrine()->getManager();
        $usuario = $em->getRepository('UsuarioBundle:Usuario')->findOneById($id);

        //Descomentariar esto cuando no se vayan a usar mas los data fixtures!
//        if (false === $this->get('security.context')->isGranted('EDIT', $usuario))
//        {
//            //Esta linea FUNCIONA PERFECTAMENTE. Esta comentariada pq como cree los usuarios con DataFixtures
//            //y no me funciono bien el ACL, los usuarios no pueden editarse ni ver perfil si dejo esta linea
//            //En cuanto se creen usuarios reales o se arregle lo de dataFixtures, descomentariar esto!!!
//            throw new AccessDeniedException();
//        }

        $reservacion = new Reservacion();

//        $fecha = $request->get("fecha");
        $fecha = date_create();
        $reservacion->setFecha($fecha);

        $servicio = $em->getRepository('HPTDefaultBundle:Servicio')->findOneById($servicio_id);
        $reservacion->addServicio($servicio);
        $reservacion->setUsuario($usuario);
        $em->persist($reservacion);

//        $usuario->addReservacion($reservacion);
//        $em->persist($usuario);

        $em->flush();

        return $this->render('UsuarioBundle:Default:usuario_perfil.html.twig', array( 'usuario' => $usuario ));
    }

    public function cancelReservacionAction(Request $request, $id, $reservacion_id)
    {
        $em = $this->getDoctrine()->getManager();

        $reservacion = $em->getRepository('HPTDefaultBundle:Reservacion')->findOneById($reservacion_id);

        //Descomentariar esto cuando no se vayan a usar mas los data fixtures!
//        if (false === $this->get('security.context')->isGranted('EDIT', $usuario))
//        {
//            //Esta linea FUNCIONA PERFECTAMENTE. Esta comentariada pq como cree los usuarios con DataFixtures
//            //y no me funciono bien el ACL, los usuarios no pueden editarse ni ver perfil si dejo esta linea
//            //En cuanto se creen usuarios reales o se arregle lo de dataFixtures, descomentariar esto!!!
//            throw new AccessDeniedException();
//        }

        if ($request->getMethod() == 'POST')
        {
            // borrar el usuario
            $em->remove($reservacion);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('usuario_perfil', array('id' => $id)));
    }
}
