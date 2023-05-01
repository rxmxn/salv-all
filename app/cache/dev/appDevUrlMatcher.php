<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_purge
                if ($pathinfo === '/_profiler/purge') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:purgeAction',  '_route' => '_profiler_purge',);
                }

                if (0 === strpos($pathinfo, '/_profiler/i')) {
                    // _profiler_info
                    if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                    }

                    // _profiler_import
                    if ($pathinfo === '/_profiler/import') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:importAction',  '_route' => '_profiler_import',);
                    }

                }

                // _profiler_export
                if (0 === strpos($pathinfo, '/_profiler/export') && preg_match('#^/_profiler/export/(?P<token>[^/\\.]++)\\.txt$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_export')), array (  '_controller' => 'web_profiler.controller.profiler:exportAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            if (0 === strpos($pathinfo, '/_configurator')) {
                // _configurator_home
                if (rtrim($pathinfo, '/') === '/_configurator') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_configurator_home');
                    }

                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',  '_route' => '_configurator_home',);
                }

                // _configurator_step
                if (0 === strpos($pathinfo, '/_configurator/step') && preg_match('#^/_configurator/step/(?P<index>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_configurator_step')), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',));
                }

                // _configurator_final
                if ($pathinfo === '/_configurator/final') {
                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  '_route' => '_configurator_final',);
                }

            }

        }

        if (0 === strpos($pathinfo, '/backend')) {
            // backend_homepage
            if (rtrim($pathinfo, '/') === '/backend') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'backend_homepage');
                }

                return array (  '_controller' => 'HPT\\BackendBundle\\Controller\\UsuarioController::usuarioListarAction',  '_route' => 'backend_homepage',);
            }

            if (0 === strpos($pathinfo, '/backend/trabajadores')) {
                // backend_trabajador
                if ($pathinfo === '/backend/trabajadores/index') {
                    return array (  '_controller' => 'HPT\\BackendBundle\\Controller\\TrabajadorController::indexAction',  '_route' => 'backend_trabajador',);
                }

                // backend_trabajador_nombrePost
                if (rtrim($pathinfo, '/') === '/backend/trabajadores/nombre') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'backend_trabajador_nombrePost');
                    }

                    return array (  '_controller' => 'HPT\\BackendBundle\\Controller\\TrabajadorController::nombrePostAction',  '_route' => 'backend_trabajador_nombrePost',);
                }

                // backend_trabajador_create
                if ($pathinfo === '/backend/trabajadores/create') {
                    return array (  '_controller' => 'HPT\\BackendBundle\\Controller\\TrabajadorController::createAction',  '_route' => 'backend_trabajador_create',);
                }

                // backend_trabajador_new
                if ($pathinfo === '/backend/trabajadores/new') {
                    return array (  '_controller' => 'HPT\\BackendBundle\\Controller\\TrabajadorController::newAction',  '_route' => 'backend_trabajador_new',);
                }

                // backend_trabajador_edit
                if (0 === strpos($pathinfo, '/backend/trabajadores/edit') && preg_match('#^/backend/trabajadores/edit/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'backend_trabajador_edit')), array (  '_controller' => 'HPT\\BackendBundle\\Controller\\TrabajadorController::editAction',));
                }

                // backend_trabajador_update
                if (0 === strpos($pathinfo, '/backend/trabajadores/update') && preg_match('#^/backend/trabajadores/update/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'backend_trabajador_update')), array (  '_controller' => 'HPT\\BackendBundle\\Controller\\TrabajadorController::updateAction',));
                }

                // backend_trabajador_delete
                if (0 === strpos($pathinfo, '/backend/trabajadores/delete') && preg_match('#^/backend/trabajadores/delete/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'backend_trabajador_delete')), array (  '_controller' => 'HPT\\BackendBundle\\Controller\\TrabajadorController::deleteAction',));
                }

                // backend_trabajador_filtronombre
                if (0 === strpos($pathinfo, '/backend/trabajadores/filtro') && preg_match('#^/backend/trabajadores/filtro/(?P<nombre>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'backend_trabajador_filtronombre')), array (  '_controller' => 'HPT\\BackendBundle\\Controller\\TrabajadorController::filtronombreAction',));
                }

            }

            if (0 === strpos($pathinfo, '/backend/s')) {
                if (0 === strpos($pathinfo, '/backend/sala')) {
                    // backend_sala
                    if ($pathinfo === '/backend/sala/index') {
                        return array (  '_controller' => 'HPT\\BackendBundle\\Controller\\SalaController::indexAction',  '_route' => 'backend_sala',);
                    }

                    // backend_sala_nombrePost
                    if (rtrim($pathinfo, '/') === '/backend/sala/nombre') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'backend_sala_nombrePost');
                        }

                        return array (  '_controller' => 'HPT\\BackendBundle\\Controller\\SalaController::nombrePostAction',  '_route' => 'backend_sala_nombrePost',);
                    }

                    // backend_sala_create
                    if ($pathinfo === '/backend/sala/create') {
                        return array (  '_controller' => 'HPT\\BackendBundle\\Controller\\SalaController::createAction',  '_route' => 'backend_sala_create',);
                    }

                    // backend_sala_new
                    if ($pathinfo === '/backend/sala/new') {
                        return array (  '_controller' => 'HPT\\BackendBundle\\Controller\\SalaController::newAction',  '_route' => 'backend_sala_new',);
                    }

                    // backend_sala_edit
                    if (0 === strpos($pathinfo, '/backend/sala/edit') && preg_match('#^/backend/sala/edit/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'backend_sala_edit')), array (  '_controller' => 'HPT\\BackendBundle\\Controller\\SalaController::editAction',));
                    }

                    // backend_sala_update
                    if (0 === strpos($pathinfo, '/backend/sala/update') && preg_match('#^/backend/sala/update/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'backend_sala_update')), array (  '_controller' => 'HPT\\BackendBundle\\Controller\\SalaController::updateAction',));
                    }

                    // backend_sala_delete
                    if (0 === strpos($pathinfo, '/backend/sala/delete') && preg_match('#^/backend/sala/delete/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'backend_sala_delete')), array (  '_controller' => 'HPT\\BackendBundle\\Controller\\SalaController::deleteAction',));
                    }

                }

                if (0 === strpos($pathinfo, '/backend/servicio')) {
                    // backend_servicio
                    if ($pathinfo === '/backend/servicio/index') {
                        return array (  '_controller' => 'HPT\\BackendBundle\\Controller\\ServicioController::indexAction',  '_route' => 'backend_servicio',);
                    }

                    // backend_servicio_create
                    if ($pathinfo === '/backend/servicio/create') {
                        return array (  '_controller' => 'HPT\\BackendBundle\\Controller\\ServicioController::createAction',  '_route' => 'backend_servicio_create',);
                    }

                    // backend_servicio_new
                    if ($pathinfo === '/backend/servicio/new') {
                        return array (  '_controller' => 'HPT\\BackendBundle\\Controller\\ServicioController::newAction',  '_route' => 'backend_servicio_new',);
                    }

                    // backend_servicio_edit
                    if (0 === strpos($pathinfo, '/backend/servicio/edit') && preg_match('#^/backend/servicio/edit/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'backend_servicio_edit')), array (  '_controller' => 'HPT\\BackendBundle\\Controller\\ServicioController::editAction',));
                    }

                    // backend_servicio_update
                    if (0 === strpos($pathinfo, '/backend/servicio/update') && preg_match('#^/backend/servicio/update/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'backend_servicio_update')), array (  '_controller' => 'HPT\\BackendBundle\\Controller\\ServicioController::updateAction',));
                    }

                    // backend_servicio_delete
                    if (0 === strpos($pathinfo, '/backend/servicio/delete') && preg_match('#^/backend/servicio/delete/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'backend_servicio_delete')), array (  '_controller' => 'HPT\\BackendBundle\\Controller\\ServicioController::deleteAction',));
                    }

                }

            }

            if (0 === strpos($pathinfo, '/backend/noticias')) {
                // backend_noticias
                if (rtrim($pathinfo, '/') === '/backend/noticias/index') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'backend_noticias');
                    }

                    return array (  '_controller' => 'HPT\\BackendBundle\\Controller\\NoticiasController::indexAction',  '_route' => 'backend_noticias',);
                }

                // backend_noticias_create
                if (rtrim($pathinfo, '/') === '/backend/noticias/create') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'backend_noticias_create');
                    }

                    return array (  '_controller' => 'HPT\\BackendBundle\\Controller\\NoticiasController::createAction',  '_route' => 'backend_noticias_create',);
                }

                // backend_noticias_new
                if (rtrim($pathinfo, '/') === '/backend/noticias/new') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'backend_noticias_new');
                    }

                    return array (  '_controller' => 'HPT\\BackendBundle\\Controller\\NoticiasController::newAction',  '_route' => 'backend_noticias_new',);
                }

                // backend_noticias_show
                if (0 === strpos($pathinfo, '/backend/noticias/show') && preg_match('#^/backend/noticias/show/(?P<id>[^/]++)/?$#s', $pathinfo, $matches)) {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'backend_noticias_show');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'backend_noticias_show')), array (  '_controller' => 'HPT\\BackendBundle\\Controller\\NoticiasController::showAction',));
                }

                // backend_noticias_edit
                if (0 === strpos($pathinfo, '/backend/noticias/edit') && preg_match('#^/backend/noticias/edit/(?P<id>[^/]++)/?$#s', $pathinfo, $matches)) {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'backend_noticias_edit');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'backend_noticias_edit')), array (  '_controller' => 'HPT\\BackendBundle\\Controller\\NoticiasController::editAction',));
                }

                // backend_noticias_update
                if (0 === strpos($pathinfo, '/backend/noticias/update') && preg_match('#^/backend/noticias/update/(?P<id>[^/]++)/?$#s', $pathinfo, $matches)) {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'backend_noticias_update');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'backend_noticias_update')), array (  '_controller' => 'HPT\\BackendBundle\\Controller\\NoticiasController::updateAction',));
                }

                // backend_noticias_delete
                if (0 === strpos($pathinfo, '/backend/noticias/delete') && preg_match('#^/backend/noticias/delete/(?P<id>[^/]++)/?$#s', $pathinfo, $matches)) {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'backend_noticias_delete');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'backend_noticias_delete')), array (  '_controller' => 'HPT\\BackendBundle\\Controller\\NoticiasController::deleteAction',));
                }

                // backend_noticias_nombrePost
                if (rtrim($pathinfo, '/') === '/backend/noticias/nombreAutor') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'backend_noticias_nombrePost');
                    }

                    return array (  '_controller' => 'HPT\\BackendBundle\\Controller\\NoticiasController::nombrePostAction',  '_route' => 'backend_noticias_nombrePost',);
                }

            }

            if (0 === strpos($pathinfo, '/backend/usuarios')) {
                // backend_usuario_registro
                if ($pathinfo === '/backend/usuarios/registro') {
                    return array (  '_controller' => 'HPT\\BackendBundle\\Controller\\UsuarioController::usuarioRegistroAction',  '_route' => 'backend_usuario_registro',);
                }

                // backend_usuario_editar
                if (0 === strpos($pathinfo, '/backend/usuarios/editar') && preg_match('#^/backend/usuarios/editar/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'backend_usuario_editar')), array (  '_controller' => 'HPT\\BackendBundle\\Controller\\UsuarioController::usuarioEditarAction',));
                }

                if (0 === strpos($pathinfo, '/backend/usuarios/usuario')) {
                    // backend_usuario_borrar
                    if (0 === strpos($pathinfo, '/backend/usuarios/usuario/borrar') && preg_match('#^/backend/usuarios/usuario/borrar/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'backend_usuario_borrar')), array (  '_controller' => 'HPT\\BackendBundle\\Controller\\UsuarioController::usuarioBorrarAction',));
                    }

                    // backend_usuario_listar
                    if ($pathinfo === '/backend/usuarios/usuario/listar') {
                        return array (  '_controller' => 'HPT\\BackendBundle\\Controller\\UsuarioController::usuarioListarAction',  '_route' => 'backend_usuario_listar',);
                    }

                }

            }

            if (0 === strpos($pathinfo, '/backend/admins')) {
                // backend_admin_listar
                if ($pathinfo === '/backend/admins/listar') {
                    return array (  '_controller' => 'HPT\\BackendBundle\\Controller\\AdminController::listarAction',  '_route' => 'backend_admin_listar',);
                }

                // backend_admin_registro
                if ($pathinfo === '/backend/admins/registro') {
                    return array (  '_controller' => 'HPT\\BackendBundle\\Controller\\AdminController::adminRegistroAction',  '_route' => 'backend_admin_registro',);
                }

                // backend_admin_editar
                if (0 === strpos($pathinfo, '/backend/admins/editar') && preg_match('#^/backend/admins/editar/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'backend_admin_editar')), array (  '_controller' => 'HPT\\BackendBundle\\Controller\\AdminController::adminEditarAction',));
                }

                // backend_admin_borrar
                if (0 === strpos($pathinfo, '/backend/admins/admin/borrar') && preg_match('#^/backend/admins/admin/borrar/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'backend_admin_borrar')), array (  '_controller' => 'HPT\\BackendBundle\\Controller\\AdminController::adminBorrarAction',));
                }

            }

        }

        // hpt_default_homepage
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'hpt_default_homepage');
            }

            return array (  '_controller' => 'HPT\\DefaultBundle\\Controller\\DefaultController::inicioAction',  '_route' => 'hpt_default_homepage',);
        }

        // hpt_quienes_somos
        if (rtrim($pathinfo, '/') === '/quienes_somos') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'hpt_quienes_somos');
            }

            return array (  '_controller' => 'HPT\\DefaultBundle\\Controller\\DefaultController::quienessomosAction',  '_route' => 'hpt_quienes_somos',);
        }

        // hpt_contactanos
        if (rtrim($pathinfo, '/') === '/contactanos') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'hpt_contactanos');
            }

            return array (  '_controller' => 'HPT\\DefaultBundle\\Controller\\DefaultController::contactanosAction',  '_route' => 'hpt_contactanos',);
        }

        if (0 === strpos($pathinfo, '/servicios')) {
            // hpt_servicios
            if (rtrim($pathinfo, '/') === '/servicios') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'hpt_servicios');
                }

                return array (  '_controller' => 'HPT\\DefaultBundle\\Controller\\DefaultController::serviciosAction',  '_route' => 'hpt_servicios',);
            }

            // servicio_show
            if (0 === strpos($pathinfo, '/servicios/show') && preg_match('#^/servicios/show/(?P<id>[^/]++)/?$#s', $pathinfo, $matches)) {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'servicio_show');
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'servicio_show')), array (  '_controller' => 'HPT\\DefaultBundle\\Controller\\ServicioController::showAction',));
            }

            // servicio_categoria
            if (0 === strpos($pathinfo, '/servicios/categoria') && preg_match('#^/servicios/categoria/(?P<categoria>[^/]++)/?$#s', $pathinfo, $matches)) {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'servicio_categoria');
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'servicio_categoria')), array (  '_controller' => 'HPT\\DefaultBundle\\Controller\\ServicioController::categoriaAction',));
            }

        }

        // hpt_noticias
        if (rtrim($pathinfo, '/') === '/noticias/ultimas') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'hpt_noticias');
            }

            return array (  '_controller' => 'HPT\\DefaultBundle\\Controller\\NoticiasController::ultimasAction',  '_route' => 'hpt_noticias',);
        }

        if (0 === strpos($pathinfo, '/admin')) {
            if (0 === strpos($pathinfo, '/admin/trabajador')) {
                // trabajador
                if ($pathinfo === '/admin/trabajador/index') {
                    return array (  '_controller' => 'HPT\\DefaultBundle\\Controller\\TrabajadorController::indexAction',  '_route' => 'trabajador',);
                }

                // trabajador_nombrePost
                if (rtrim($pathinfo, '/') === '/admin/trabajador/nombre') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'trabajador_nombrePost');
                    }

                    return array (  '_controller' => 'HPT\\DefaultBundle\\Controller\\TrabajadorController::nombrePostAction',  '_route' => 'trabajador_nombrePost',);
                }

                // trabajador_create
                if ($pathinfo === '/admin/trabajador/create') {
                    return array (  '_controller' => 'HPT\\DefaultBundle\\Controller\\TrabajadorController::createAction',  '_route' => 'trabajador_create',);
                }

                // trabajador_new
                if ($pathinfo === '/admin/trabajador/new') {
                    return array (  '_controller' => 'HPT\\DefaultBundle\\Controller\\TrabajadorController::newAction',  '_route' => 'trabajador_new',);
                }

                // trabajador_show
                if (0 === strpos($pathinfo, '/admin/trabajador/show') && preg_match('#^/admin/trabajador/show/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'trabajador_show')), array (  '_controller' => 'HPT\\DefaultBundle\\Controller\\TrabajadorController::showAction',));
                }

                // trabajador_edit
                if (0 === strpos($pathinfo, '/admin/trabajador/edit') && preg_match('#^/admin/trabajador/edit/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'trabajador_edit')), array (  '_controller' => 'HPT\\DefaultBundle\\Controller\\TrabajadorController::editAction',));
                }

                // trabajador_update
                if (0 === strpos($pathinfo, '/admin/trabajador/update') && preg_match('#^/admin/trabajador/update/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'trabajador_update')), array (  '_controller' => 'HPT\\DefaultBundle\\Controller\\TrabajadorController::updateAction',));
                }

                // trabajador_delete
                if (0 === strpos($pathinfo, '/admin/trabajador/delete') && preg_match('#^/admin/trabajador/delete/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'trabajador_delete')), array (  '_controller' => 'HPT\\DefaultBundle\\Controller\\TrabajadorController::deleteAction',));
                }

                // trabajador_filtronombre
                if (0 === strpos($pathinfo, '/admin/trabajador/filtro') && preg_match('#^/admin/trabajador/filtro/(?P<nombre>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'trabajador_filtronombre')), array (  '_controller' => 'HPT\\DefaultBundle\\Controller\\TrabajadorController::filtronombreAction',));
                }

            }

            if (0 === strpos($pathinfo, '/admin/s')) {
                if (0 === strpos($pathinfo, '/admin/sala')) {
                    // sala
                    if ($pathinfo === '/admin/sala/index') {
                        return array (  '_controller' => 'HPT\\DefaultBundle\\Controller\\SalaController::indexAction',  '_route' => 'sala',);
                    }

                    // sala_nombrePost
                    if (rtrim($pathinfo, '/') === '/admin/sala/nombre') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'sala_nombrePost');
                        }

                        return array (  '_controller' => 'HPT\\DefaultBundle\\Controller\\SalaController::nombrePostAction',  '_route' => 'sala_nombrePost',);
                    }

                    // sala_create
                    if ($pathinfo === '/admin/sala/create') {
                        return array (  '_controller' => 'HPT\\DefaultBundle\\Controller\\SalaController::createAction',  '_route' => 'sala_create',);
                    }

                    // sala_new
                    if ($pathinfo === '/admin/sala/new') {
                        return array (  '_controller' => 'HPT\\DefaultBundle\\Controller\\SalaController::newAction',  '_route' => 'sala_new',);
                    }

                    // sala_edit
                    if (0 === strpos($pathinfo, '/admin/sala/edit') && preg_match('#^/admin/sala/edit/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'sala_edit')), array (  '_controller' => 'HPT\\DefaultBundle\\Controller\\SalaController::editAction',));
                    }

                    // sala_show
                    if (0 === strpos($pathinfo, '/admin/sala/show') && preg_match('#^/admin/sala/show/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'sala_show')), array (  '_controller' => 'HPT\\DefaultBundle\\Controller\\SalaController::showAction',));
                    }

                    // sala_update
                    if (0 === strpos($pathinfo, '/admin/sala/update') && preg_match('#^/admin/sala/update/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'sala_update')), array (  '_controller' => 'HPT\\DefaultBundle\\Controller\\SalaController::updateAction',));
                    }

                    // sala_delete
                    if (0 === strpos($pathinfo, '/admin/sala/delete') && preg_match('#^/admin/sala/delete/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'sala_delete')), array (  '_controller' => 'HPT\\DefaultBundle\\Controller\\SalaController::deleteAction',));
                    }

                }

                if (0 === strpos($pathinfo, '/admin/servicio')) {
                    // servicio
                    if (rtrim($pathinfo, '/') === '/admin/servicio/index') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'servicio');
                        }

                        return array (  '_controller' => 'HPT\\DefaultBundle\\Controller\\ServicioController::indexAction',  '_route' => 'servicio',);
                    }

                    // servicio_create
                    if (rtrim($pathinfo, '/') === '/admin/servicio/create') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'servicio_create');
                        }

                        return array (  '_controller' => 'HPT\\DefaultBundle\\Controller\\ServicioController::createAction',  '_route' => 'servicio_create',);
                    }

                    // servicio_new
                    if (rtrim($pathinfo, '/') === '/admin/servicio/new') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'servicio_new');
                        }

                        return array (  '_controller' => 'HPT\\DefaultBundle\\Controller\\ServicioController::newAction',  '_route' => 'servicio_new',);
                    }

                    // servicio_edit
                    if (0 === strpos($pathinfo, '/admin/servicio/edit') && preg_match('#^/admin/servicio/edit/(?P<id>[^/]++)/?$#s', $pathinfo, $matches)) {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'servicio_edit');
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'servicio_edit')), array (  '_controller' => 'HPT\\DefaultBundle\\Controller\\ServicioController::editAction',));
                    }

                    // servicio_update
                    if (0 === strpos($pathinfo, '/admin/servicio/update') && preg_match('#^/admin/servicio/update/(?P<id>[^/]++)/?$#s', $pathinfo, $matches)) {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'servicio_update');
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'servicio_update')), array (  '_controller' => 'HPT\\DefaultBundle\\Controller\\ServicioController::updateAction',));
                    }

                    // servicio_delete
                    if (0 === strpos($pathinfo, '/admin/servicio/delete') && preg_match('#^/admin/servicio/delete/(?P<id>[^/]++)/?$#s', $pathinfo, $matches)) {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'servicio_delete');
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'servicio_delete')), array (  '_controller' => 'HPT\\DefaultBundle\\Controller\\ServicioController::deleteAction',));
                    }

                }

            }

            if (0 === strpos($pathinfo, '/admin/noticias')) {
                // noticias
                if (rtrim($pathinfo, '/') === '/admin/noticias/index') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'noticias');
                    }

                    return array (  '_controller' => 'HPT\\DefaultBundle\\Controller\\NoticiasController::indexAction',  '_route' => 'noticias',);
                }

                // noticias_create
                if (rtrim($pathinfo, '/') === '/admin/noticias/create') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'noticias_create');
                    }

                    return array (  '_controller' => 'HPT\\DefaultBundle\\Controller\\NoticiasController::createAction',  '_route' => 'noticias_create',);
                }

                // noticias_new
                if (rtrim($pathinfo, '/') === '/admin/noticias/new') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'noticias_new');
                    }

                    return array (  '_controller' => 'HPT\\DefaultBundle\\Controller\\NoticiasController::newAction',  '_route' => 'noticias_new',);
                }

                // noticias_edit
                if (0 === strpos($pathinfo, '/admin/noticias/edit') && preg_match('#^/admin/noticias/edit/(?P<id>[^/]++)/?$#s', $pathinfo, $matches)) {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'noticias_edit');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'noticias_edit')), array (  '_controller' => 'HPT\\DefaultBundle\\Controller\\NoticiasController::editAction',));
                }

                // noticias_update
                if (0 === strpos($pathinfo, '/admin/noticias/update') && preg_match('#^/admin/noticias/update/(?P<id>[^/]++)/?$#s', $pathinfo, $matches)) {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'noticias_update');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'noticias_update')), array (  '_controller' => 'HPT\\DefaultBundle\\Controller\\NoticiasController::updateAction',));
                }

                // noticias_delete
                if (0 === strpos($pathinfo, '/admin/noticias/delete') && preg_match('#^/admin/noticias/delete/(?P<id>[^/]++)/?$#s', $pathinfo, $matches)) {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'noticias_delete');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'noticias_delete')), array (  '_controller' => 'HPT\\DefaultBundle\\Controller\\NoticiasController::deleteAction',));
                }

            }

        }

        if (0 === strpos($pathinfo, '/reservaciones')) {
            // reservacion
            if (rtrim($pathinfo, '/') === '/reservaciones/index') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'reservacion');
                }

                return array (  '_controller' => 'HPT\\DefaultBundle\\Controller\\ReservacionController::indexAction',  '_route' => 'reservacion',);
            }

            // reservacion_create
            if (rtrim($pathinfo, '/') === '/reservaciones/create') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'reservacion_create');
                }

                return array (  '_controller' => 'HPT\\DefaultBundle\\Controller\\ReservacionController::createAction',  '_route' => 'reservacion_create',);
            }

            // reservacion_new
            if (rtrim($pathinfo, '/') === '/reservaciones/new') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'reservacion_new');
                }

                return array (  '_controller' => 'HPT\\DefaultBundle\\Controller\\ReservacionController::newAction',  '_route' => 'reservacion_new',);
            }

            // reservacion_show
            if (0 === strpos($pathinfo, '/reservaciones/show') && preg_match('#^/reservaciones/show/(?P<id>[^/]++)/?$#s', $pathinfo, $matches)) {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'reservacion_show');
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'reservacion_show')), array (  '_controller' => 'HPT\\DefaultBundle\\Controller\\ReservacionController::showAction',));
            }

            // reservacion_edit
            if (0 === strpos($pathinfo, '/reservaciones/edit') && preg_match('#^/reservaciones/edit/(?P<id>[^/]++)/?$#s', $pathinfo, $matches)) {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'reservacion_edit');
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'reservacion_edit')), array (  '_controller' => 'HPT\\DefaultBundle\\Controller\\ReservacionController::editAction',));
            }

            // reservacion_update
            if (0 === strpos($pathinfo, '/reservaciones/update') && preg_match('#^/reservaciones/update/(?P<id>[^/]++)/?$#s', $pathinfo, $matches)) {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'reservacion_update');
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'reservacion_update')), array (  '_controller' => 'HPT\\DefaultBundle\\Controller\\ReservacionController::updateAction',));
            }

            // reservacion_delete
            if (0 === strpos($pathinfo, '/reservaciones/delete') && preg_match('#^/reservaciones/delete/(?P<id>[^/]++)/?$#s', $pathinfo, $matches)) {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'reservacion_delete');
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'reservacion_delete')), array (  '_controller' => 'HPT\\DefaultBundle\\Controller\\ReservacionController::deleteAction',));
            }

        }

        if (0 === strpos($pathinfo, '/noticias')) {
            // noticias_categoria
            if (0 === strpos($pathinfo, '/noticias/categoria') && preg_match('#^/noticias/categoria/(?P<categoria>[^/]++)/?$#s', $pathinfo, $matches)) {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'noticias_categoria');
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'noticias_categoria')), array (  '_controller' => 'HPT\\DefaultBundle\\Controller\\NoticiasController::FindCategoriaAction',));
            }

            // noticias_nombrePost
            if (rtrim($pathinfo, '/') === '/noticias/nombreAutor') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'noticias_nombrePost');
                }

                return array (  '_controller' => 'HPT\\DefaultBundle\\Controller\\NoticiasController::nombrePostAction',  '_route' => 'noticias_nombrePost',);
            }

            // noticias_show
            if (0 === strpos($pathinfo, '/noticias/show') && preg_match('#^/noticias/show/(?P<id>[^/]++)/?$#s', $pathinfo, $matches)) {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'noticias_show');
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'noticias_show')), array (  '_controller' => 'HPT\\DefaultBundle\\Controller\\NoticiasController::showAction',));
            }

        }

        if (0 === strpos($pathinfo, '/usuario')) {
            if (0 === strpos($pathinfo, '/usuario/log')) {
                if (0 === strpos($pathinfo, '/usuario/login')) {
                    // usuario_login
                    if ($pathinfo === '/usuario/login') {
                        return array (  '_controller' => 'HPT\\UsuarioBundle\\Controller\\DefaultController::loginAction',  '_route' => 'usuario_login',);
                    }

                    // usuario_login_check
                    if ($pathinfo === '/usuario/login_check') {
                        return array('_route' => 'usuario_login_check');
                    }

                }

                // usuario_logout
                if ($pathinfo === '/usuario/logout') {
                    return array('_route' => 'usuario_logout');
                }

            }

            // usuario_registro
            if (rtrim($pathinfo, '/') === '/usuario/registro') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'usuario_registro');
                }

                return array (  '_controller' => 'HPT\\UsuarioBundle\\Controller\\DefaultController::usuarioRegistroAction',  '_route' => 'usuario_registro',);
            }

            // usuario_editar
            if (0 === strpos($pathinfo, '/usuario/editar') && preg_match('#^/usuario/editar/(?P<id>[^/]++)/?$#s', $pathinfo, $matches)) {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'usuario_editar');
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'usuario_editar')), array (  '_controller' => 'HPT\\UsuarioBundle\\Controller\\DefaultController::usuarioEditarAction',));
            }

            // usuario_perfil
            if (0 === strpos($pathinfo, '/usuario/perfil') && preg_match('#^/usuario/perfil/(?P<id>[^/]++)/?$#s', $pathinfo, $matches)) {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'usuario_perfil');
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'usuario_perfil')), array (  '_controller' => 'HPT\\UsuarioBundle\\Controller\\DefaultController::usuarioPerfilAction',));
            }

            if (0 === strpos($pathinfo, '/usuario/reservacion')) {
                // usuario_add_reservacion
                if (preg_match('#^/usuario/reservacion/(?P<id>[^/]++)/(?P<servicio_id>[^/]++)/?$#s', $pathinfo, $matches)) {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'usuario_add_reservacion');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'usuario_add_reservacion')), array (  '_controller' => 'HPT\\UsuarioBundle\\Controller\\DefaultController::addReservacionAction',));
                }

                // usuario_cancel_reservacion
                if (0 === strpos($pathinfo, '/usuario/reservacion/cancelar') && preg_match('#^/usuario/reservacion/cancelar/(?P<id>[^/]++)/(?P<reservacion_id>[^/]++)/?$#s', $pathinfo, $matches)) {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'usuario_cancel_reservacion');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'usuario_cancel_reservacion')), array (  '_controller' => 'HPT\\UsuarioBundle\\Controller\\DefaultController::cancelReservacionAction',));
                }

            }

        }

        if (0 === strpos($pathinfo, '/admin')) {
            if (0 === strpos($pathinfo, '/admin/log')) {
                if (0 === strpos($pathinfo, '/admin/login')) {
                    // admin_login
                    if ($pathinfo === '/admin/login') {
                        return array (  '_controller' => 'HPT\\UsuarioBundle\\Controller\\AdminController::loginAction',  '_route' => 'admin_login',);
                    }

                    // admin_login_check
                    if ($pathinfo === '/admin/login_check') {
                        return array('_route' => 'admin_login_check');
                    }

                }

                // admin_logout
                if ($pathinfo === '/admin/logout') {
                    return array('_route' => 'admin_logout');
                }

            }

            if (0 === strpos($pathinfo, '/admin/usuario')) {
                // admin_usuario_listar
                if ($pathinfo === '/admin/usuario/listar') {
                    return array (  '_controller' => 'HPT\\UsuarioBundle\\Controller\\AdminController::usuarioListarAction',  '_route' => 'admin_usuario_listar',);
                }

                // usuario_borrar
                if (0 === strpos($pathinfo, '/admin/usuario/borrar') && preg_match('#^/admin/usuario/borrar/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'usuario_borrar')), array (  '_controller' => 'HPT\\UsuarioBundle\\Controller\\AdminController::usuarioBorrarAction',));
                }

            }

            // admin_editar
            if (0 === strpos($pathinfo, '/admin/editar') && preg_match('#^/admin/editar/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_editar')), array (  '_controller' => 'HPT\\UsuarioBundle\\Controller\\AdminController::adminEditarAction',));
            }

            // admin_perfil
            if (0 === strpos($pathinfo, '/admin/perfil') && preg_match('#^/admin/perfil/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_perfil')), array (  '_controller' => 'HPT\\UsuarioBundle\\Controller\\AdminController::adminPerfilAction',));
            }

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
