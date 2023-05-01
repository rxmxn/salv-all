<?php

namespace HPT\DefaultBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Exception;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;
use HPT\DefaultBundle\Entity\Servicio;
use HPT\DefaultBundle\Entity\ReadMore;

class DefaultController extends Controller
{
//
//    public function indexAction()
//    {
//        return $this->render('HPTDefaultBundle:Default:index.html.twig');
//    }
//
//    public function quienes_somosAction()
//    {
//        return $this->render('HPTDefaultBundle:Default:quienes_somos.html.twig');
//    }

    public function inicioAction()
    {
        $obj=new ReadMore();
        $obj->setLimite(250);
        $obj->setRomper(' ');
        $em=$this->getDoctrine()->getManager();
        $entity=$em->getRepository('HPTDefaultBundle:Noticias')->FindUltimasNews(3);

        foreach($entity as $noticia)
        {
            $obj->setTexto($noticia->getTexto());
            $noticia->setTexto($obj->myTruncate());
        }

        if (!$entity)
        {
            throw $this->createNotFoundException('No hay noticias nuevas');
        }

        return $this->render('HPTDefaultBundle:Default:index.html.twig', array('entities' => $entity));

//        return array(
//          'entities'=>$entity,
//            'entity'=>$noticia,
//            'form'=>$form->createView(),
//        );

    }

    public function quienessomosAction()
    {
        $obj=new ReadMore();
        $obj->setLimite(70);
        $obj->setRomper(' ');

        $em=$this->getDoctrine()->getManager();
        $entity=$em->getRepository('HPTDefaultBundle:Noticias')->FindUltimasNews(3);

        foreach($entity as $noticia)
        {
            $obj->setTexto($noticia->getTexto());
            $noticia->setTexto($obj->myTruncate());
        }

        if (!$entity)
        {
            throw $this->createNotFoundException('No hay noticias nuevas');
        }

        return $this->render('HPTDefaultBundle:Default:quienes_somos.html.twig', array('entities' => $entity));

//        return array(
//          'entities'=>$entity,
//
//        );

    }

    public function contactanosAction(Request $request)
    {
        if($request->isMethod('POST'))
        {
            $nombre = $request->get("nombre");
            $email = $request->get("email");
            $asunto = $request->get("asunto");
            $mensaje = $request->get("mensaje");

            try
            {
                $mailer = $this->get('mailer');
                $message = $mailer->createMessage()
                    ->setSubject($asunto.' de '.$nombre)
                    ->setFrom($email)
                    ->setTo('ramonhetfield000@gmail.com')
                    ->setBody($mensaje);

                $mailer->send($message);

                /*
                 * ->setBody(
                        $this->renderView(
                            // app/Resources/views/Emails/registration.html.twig
                            'Emails/registration.html.twig',
                            array('name' => $name)
                        ),
                        'text/html'
                    )
                    /*
                     * If you also want to include a plaintext version of the message
                    ->addPart(
                        $this->renderView(
                            'Emails/registration.txt.twig',
                            array('name' => $name)
                        ),
                        'text/plain'
                    )
                */

                $this->get('session')->getFlashBag()->add('success','Correo enviado correctamente!');
            }catch (\Swift_TransportException $e)
            {
                //if (spool: { type: memory }) in config.yml is commented then this exception can be catched.
                //else i need to do an event listener
                $this->get('session')->getFlashBag()->add('danger','No se ha podido enviar el correo correctamente.
                Por favor, inténtelo más tarde.');
            }
        }

        return $this->render('HPTDefaultBundle:Default:contactanos.html.twig');
    }

    public function serviciosAction()
    {
        $em=$this->getDoctrine()->getManager();
        $entities=$em->getRepository('HPTDefaultBundle:Servicio')->findAllOrdered();

        if (!$entities)
        {
            throw $this->createNotFoundException('No hay servicios');
        }

        $categorias=$em->getRepository('HPTDefaultBundle:Servicio')->FindAllCategorias();

        return $this->render('HPTDefaultBundle:Default:servicios.html.twig', array('entities' => $entities,
            'categorias' => $categorias));
//        return $this->render('HPTDefaultBundle:Default:servicios.html.twig');
    }

    public function noticiasAction()
    {
        return $this->render('HPTDefaultBundle:Default:noticias.html.twig');
    }
}
