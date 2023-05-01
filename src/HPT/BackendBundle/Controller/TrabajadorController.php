<?php

namespace HPT\BackendBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use HPT\DefaultBundle\Entity\Trabajador;
use HPT\BackendBundle\Form\TrabajadorType;
use HPT\BackendBundle\Form\TrabajadorNombreType;

/**
 * Trabajador controller.
 *
 * @Route("/backend_trabajador")
 */
class TrabajadorController extends Controller
{



    /**
     * Lists all Trabajador entities.
     *
     * @Route("/", name="backend_trabajador")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $trabajador=new Trabajador();
        $form=$this->createNombreForm($trabajador);
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('HPTDefaultBundle:Trabajador')->findAll();

        return array(
            'entities' => $entities,
            'entity'=>$trabajador,
            'form'=>$form->createView(),
        );
    }

    /**
     * Find a Trabajador by name.
     *
     * @Route("/", name="backend_trabajador_nombrePost")
     * @Method("POST")
     * @Template("BackendBundle:Trabajador:index.html.twig")
     */
    public function nombrePostAction(Request $request)
    {
        $trabajador = new Trabajador();
        $form = $this->createNombreForm($trabajador);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $query=$em->createQuery('SELECT t FROM HPTDefaultBundle:Trabajador t WHERE t.nombre=:nombre');
            $query->setParameter('nombre',$trabajador->getNombre());
            $entity=$query->getResult();

            if(!$entity)
            {
                throw $this->createNotFoundException('No hay Trabajador bajo el nombre '.$trabajador->getNombre());
            }

            return array(
                'entities' => $entity,
                'form'   => $form->createView(),
            );
//
        }
        throw $this->createNotFoundException('No hay Trabajador bajo el nombre '.$trabajador->getNombre());
    }

    private function createNombreForm(Trabajador $trabajador)
    {
        $form = $this->createForm(new TrabajadorNombreType(), $trabajador, array(
            'action' => $this->generateUrl('backend_trabajador_nombrePost'),
            'method' => 'POST',
        ));

        return $form;
    }

    /**
     * Lists all Trabajador entities.
     *
     * @Route("/", name="backend_trabajador_filtronombre")
     * @Method("POST")
     * @Template()
     */
    public function filtronombreAction($nombre)
    {

//        $trabajador=new Trabajador();
//        $form=$this->createFormBuilder($trabajador);
//
//        if($request->getMethod()=='POST')
//        {
//            if
//        }


        $em = $this->getDoctrine()->getManager();
        $consulta=$em->createQuery('SELECT s FROM HPTDefaultBundle:Trabajador s WHERE s.nombre ORDER s.nombre ASC');
        if (!$consulta) {
            throw $this->createNotFoundException('No hay trabajador bajo ese nombre');
        }

        $trabajadores=$consulta->getResult();

        //return $this->redirect($this->generateUrl('trabajador', array('id' => $entity->getId())));

        return array(
            'entities' => $trabajadores,
        );
    }

    /**
     * Creates a new Trabajador entity.
     *
     * @Route("/", name="backend_trabajador_create")
     * @Method("POST")
     * @Template("BackendBundle:Trabajador:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Trabajador();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('backend_trabajador', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Trabajador entity.
    *
    * @param Trabajador $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Trabajador $entity)
    {
        $form = $this->createForm(new TrabajadorType(), $entity, array(
            'action' => $this->generateUrl('backend_trabajador_create'),
            'method' => 'POST',
        ));

        //$form->add('submit', 'submit', array('label' => 'Crear'));

        return $form;
    }

    /**
     * Displays a form to create a new Trabajador entity.
     *
     * @Route("/new", name="backend_trabajador_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Trabajador();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }


    /**
     * Displays a form to edit an existing Trabajador entity.
     *
     * @Route("/{id}/edit", name="backend_trabajador_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HPTDefaultBundle:Trabajador')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('El trabajador requerido no existe.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Trabajador entity.
    *
    * @param Trabajador $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Trabajador $entity)
    {
        $form = $this->createForm(new TrabajadorType(), $entity, array(
            'action' => $this->generateUrl('backend_trabajador_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

       // $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Trabajador entity.
     *
     * @Route("/{id}", name="backend_trabajador_update")
     * @Method("PUT")
     * @Template("BackendBundle:Trabajador:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HPTDefaultBundle:Trabajador')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Trabajador entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('backend_trabajador', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Trabajador entity.
     *
     * @Route("/{id}", name="backend_trabajador_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        //$form = $this->createDeleteForm($id);
        //$form->handleRequest($request);

        //if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('HPTDefaultBundle:Trabajador')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Trabajador entity.');
            }

            $em->remove($entity);
            $em->flush();
        //}


        return $this->redirect($this->generateUrl('backend_trabajador'));
    }

    /**
     * Creates a form to delete a Trabajador entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('backend_trabajador_delete', array('id' => $id)))
            ->setMethod('DELETE')
            //->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
