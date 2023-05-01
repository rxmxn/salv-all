<?php
/**
 * Created by PhpStorm.
 * User: ramon
 * Date: 13/05/14
 * Time: 19:54
 */

namespace HPT\UsuarioBundle\Listener;

use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Routing\Router;
use Symfony\Component\HttpFoundation\RedirectResponse;

class LoginListener
{
    private $contexto;
    private $router;
    private $conectado;

    public function __construct(SecurityContext $context, Router $router)
    {
        $this->router = $router;
        $this->contexto = $context;
    }

    public function onSecurityInteractiveLogin(InteractiveLoginEvent $event)
    {
        $token = $event->getAuthenticationToken();
        if($token != null)
            $this->conectado=true;
    }

    public function onKernelResponse(FilterResponseEvent $event)
    {
        if($this->conectado)
        {
            if ($this->contexto->isGranted('ROLE_ADMIN'))
            {
                $portada = $this->router->generate('admin_usuario_listar');
            }
            else if($this->contexto->isGranted('ROLE_USUARIO'))
            {
                $portada = $this->router->generate('usuario_perfil',
                    array('id'=> $this->contexto->getToken()->getUser()->getId()));
            }
            else
            {
                $portada = $this->router->generate('hpt_default_homepage');
            }

            $event->setResponse(new RedirectResponse($portada));
            $event->stopPropagation();
        }
    }
} 