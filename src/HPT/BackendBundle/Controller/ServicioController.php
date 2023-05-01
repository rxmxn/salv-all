<?php

namespace HPT\BackendBundle\Controller;

use HPT\DefaultBundle\Entity\Trabajador;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use HPT\DefaultBundle\Entity\Servicio;
use HPT\BackendBundle\Form\ServicioType;

/**
 * Servicio controller.
 *
 * @Route("/backend_servicio")
 */
class ServicioController extends Controller
{

    /**
     * Lists all Servicio entities.
     *
     * @Route("/", name="backend_servicio")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('HPTDefaultBundle:Servicio')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Servicio entity.
     *
     * @Route("/", name="backend_servicio_create")
     * @Method("POST")
     * @Template("BackendBundle:Servicio:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Servicio();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            //por mi

            $trab = $entity->getTrabajador();

            foreach ($trab as $trabajador) {
                $entity->addTrabajador($trabajador);
            }

           // $entity->addTrabajador($trab[0]);
            //end
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('backend_servicio', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Servicio entity.
    *
    * @param Servicio $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Servicio $entity)
    {
        $form = $this->createForm(new ServicioType(), $entity, array(
            'action' => $this->generateUrl('backend_servicio_create'),
            'method' => 'POST',
        ));

//        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Servicio entity.
     *
     * @Route("/new", name="backend_servicio_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Servicio();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Servicio entity.
     *
     * @Route("/{id}", name="backend_servicio_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HPTDefaultBundle:Servicio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Servicio entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Servicio entity.
     *
     * @Route("/{id}/edit", name="backend_servicio_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HPTDefaultBundle:Servicio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Servicio entity.');
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
    * Creates a form to edit a Servicio entity.
    *
    * @param Servicio $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Servicio $entity)
    {
        $form = $this->createForm(new ServicioType(), $entity, array(
            'action' => $this->generateUrl('backend_servicio_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

//        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Servicio entity.
     *
     * @Route("/{id}", name="backend_servicio_update")
     * @Method("PUT")
     * @Template("BackendBundle:Servicio:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HPTDefaultBundle:Servicio')->find($id);



        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Servicio entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);

        //por mi
        $trab_orig = $entity->getTrabajador();
        foreach ($trab_orig as $trabajador) {
            $entity->RemoveTrabajadores($trabajador);
        }

        $editForm->handleRequest($request);

        //$trab = $em->getRepository('HPTDefaultBundle:Trabajador')->find(1);
        if ($editForm->isValid()) {

            //por mi
            //$entity->addTrabajador($trab);
            $trab_update = $entity->getTrabajador();

            foreach ($trab_update as $trabajador) {
                $entity->addTrabajador($trabajador);
            }

            //$em->persist($entity);
            //end

            $em->flush();

            return $this->redirect($this->generateUrl('backend_servicio'));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Servicio entity.
     *
     * @Route("/{id}", name="backend_servicio_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
       /* $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {*/
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('HPTDefaultBundle:Servicio')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Servicio entity.');
            }

            $em->remove($entity);
            $em->flush();
       // }

        return $this->redirect($this->generateUrl('backend_servicio'));
    }

    /**
     * Creates a form to delete a Servicio entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('backend_servicio_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
