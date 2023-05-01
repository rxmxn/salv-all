<?php

namespace HPT\DefaultBundle\Controller;

use HPT\DefaultBundle\Entity\ReadMore;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use HPT\DefaultBundle\Entity\Noticias;
use HPT\DefaultBundle\Form\NoticiasType;
use HPT\DefaultBundle\Form\NoticiasNombreType;

/**
 * Noticias controller.
 *
 * @Route("/noticias")
 */
class NoticiasController extends Controller
{

    public function FindCategoriaAction($categoria)
    {
        $noticia=new Noticias();
        $em=$this->getDoctrine()->getManager();
        $form= $this->createNombreForm($noticia);
        $entity=$em->getRepository('HPTDefaultBundle:Noticias')->FindCat($categoria);

        $categorias=$em->getRepository('HPTDefaultBundle:Noticias')->FindAllCat();

        return $this->render('HPTDefaultBundle:Default:noticias.html.twig', array('entities'=>$entity,
            'entity'=>$noticia,
            'form'=>$form->createView(),
            'categoria'=>$categorias));
    }

    /**
     * Lists all Noticias entities.
     *
     * @Route("/", name="hpt_noticias")
     * @Template("HPTDefaultBundle:Default:noticias.html.twig")
     */
    public function ultimasAction()
    {
        $noticia=new Noticias();
        $form= $this->createNombreForm($noticia);
        $em=$this->getDoctrine()->getManager();

        $categorias=$em->getRepository('HPTDefaultBundle:Noticias')->FindAllCat();
        $entity=$em->getRepository('HPTDefaultBundle:Noticias')->FindUltimasNews(5);

        if (!$entity)
        {
            throw $this->createNotFoundException('No hay noticias nuevas');
        }

        return array(
          'entities'=>$entity,
            'entity'=>$noticia,
            'form'=>$form->createView(),
            'categoria'=>$categorias,
        );

    }

    /**
     * Lists all Noticias entities.
     *
     * @Route("/", name="noticias")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('HPTDefaultBundle:Noticias')->findAll();

        if(!$entities)
        {
            throw $this->createNotFoundException('Unable to find Noticias entity.');
        }

        return array(
            'entities' => $entities,

        );
    }

    /**
     * Find a Sala by Name.
     *
     * @Route("/", name="noticias_nombrePost")
     * @Method("POST")
     * @Template("HPTDefaultBundle:Default:noticias.html.twig")
     */
    public function nombrePostAction(Request $request)
    {
        $noticia = new Noticias();
        $form = $this->createNombreForm($noticia);
        $form->handleRequest($request);

        $em = $this->getDoctrine()->getManager();
        $categorias=$em->getRepository('HPTDefaultBundle:Noticias')->FindAllCat();
        $entity = $em->getRepository('HPTDefaultBundle:Noticias')->FindNombreNoticia($noticia);

        if(!$entity)
        {
            throw $this->createNotFoundException('No hay Noticias bajo el nombre '.$noticia->getNombreAutor());
        }
        return array(
            'entities' => $entity,
            'form'   => $form->createView(),
            'categoria'=>$categorias,
            'entity'=>$noticia,
        );
    }

    private function createNombreForm(Noticias $noticias)
    {
        $form = $this->createForm(new NoticiasNombreType(), $noticias, array(
            'action' => $this->generateUrl('noticias_nombrePost'),
            'method' => 'POST',
        ));

        return $form;
    }

    /**
     * Creates a new Noticias entity.
     *
     * @Route("/", name="noticias_create")
     * @Method("POST")
     * @Template("HPTDefaultBundle:Noticias:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Noticias();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $entity->subirFoto();
            $resumen=substr($entity->getTexto(),0,20);
            $entity->setResumen($resumen);     //Para mostrar un resumen en la Pag. inicio
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('noticias_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Noticias entity.
    *
    * @param Noticias $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Noticias $entity)
    {
        $form = $this->createForm(new NoticiasType(), $entity, array(
            'action' => $this->generateUrl('noticias_create'),
            'method' => 'POST',
        ));

//        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Noticias entity.
     *
     * @Route("/new", name="noticias_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Noticias();
        $entity->setFechaArticulo(new \DateTime('now'));
        $form   = $this->createCreateForm($entity);

        return $this->render('HPTDefaultBundle:Noticias:new.html.twig',
            array(
                'form' => $form->createView(),
                'entity'=>$entity,
            )
        );

    }

    /**
     * Finds and displays a Noticias entity.
     *
     * @Route("/{id}", name="noticias_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $obj=new ReadMore();
        $obj->setLimite(70);
        $obj->setRomper(' ');
        $em = $this->getDoctrine()->getManager();
//
        $noticias=$em->getRepository('HPTDefaultBundle:Noticias')->FindUltimasNews(3);

        foreach($noticias as $noticia)
        {
            $obj->setTexto($noticia->getTexto());
            $noticia->setTexto($obj->myTruncate());
        }

        $entity = $em->getRepository('HPTDefaultBundle:Noticias')->findOneById($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Noticias entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        //$entity = new Noticias();
        return $this->render('HPTDefaultBundle:Noticias:show.html.twig',array('entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
            'entities' => $noticias));
//        return array(
//            'entity'      => $entity,
//            'delete_form' => $deleteForm->createView(),
//            'entities' => $entity,
//        );
    }

    /**
     * Displays a form to edit an existing Noticias entity.
     *
     * @Route("/{id}/edit", name="noticias_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HPTDefaultBundle:Noticias')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Noticias entity.');
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
    * Creates a form to edit a Noticias entity.
    *
    * @param Noticias $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Noticias $entity)
    {
        $form = $this->createForm(new NoticiasType(), $entity, array(
            'action' => $this->generateUrl('noticias_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Noticias entity.
     *
     * @Route("/{id}", name="noticias_update")
     * @Method("PUT")
     * @Template("HPTDefaultBundle:Noticias:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HPTDefaultBundle:Noticias')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Noticias entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);

        $rutaFotoOriginal=$editForm->getData()->getRutaFoto();
        $editForm->handleRequest($request);



        if ($editForm->isValid()) {

            if(null==$entity->getFoto()){
                $entity->setRutaFoto($rutaFotoOriginal);
            }else{
                $entity->subirFoto();
                if(!empty($rutaFotoOriginal)){
                    $fs=new Filesystem();
                    $fs->remove($rutaFotoOriginal);
                }
            }
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('noticias', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Noticias entity.
     *
     * @Route("/{id}", name="noticias_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
//        $form = $this->createDeleteForm($id);
//        $form->handleRequest($request);

//        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('HPTDefaultBundle:Noticias')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Noticias entity.');
            }

            $em->remove($entity);
            $em->flush();
//        }

        return $this->redirect($this->generateUrl('noticias'));
    }

    /**
     * Creates a form to delete a Noticias entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('noticias_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
