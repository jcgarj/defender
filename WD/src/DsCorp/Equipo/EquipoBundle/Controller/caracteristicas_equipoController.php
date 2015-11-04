<?php

namespace DsCorp\Equipo\EquipoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use DsCorp\Equipo\EquipoBundle\Entity\caracteristicas_equipo;
use DsCorp\Equipo\EquipoBundle\Form\caracteristicas_equipoType;

/**
 * caracteristicas_equipo controller.
 *
 */
class caracteristicas_equipoController extends Controller
{

    /**
     * Lists all caracteristicas_equipo entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('EquipoBundle:caracteristicas_equipo')->findAll();

        return $this->render('EquipoBundle:caracteristicas_equipo:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new caracteristicas_equipo entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new caracteristicas_equipo();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('caracteristicas_equipo_show', array('id' => $entity->getId())));
        }

        return $this->render('EquipoBundle:caracteristicas_equipo:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a caracteristicas_equipo entity.
     *
     * @param caracteristicas_equipo $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(caracteristicas_equipo $entity)
    {
        $form = $this->createForm(new caracteristicas_equipoType(), $entity, array(
            'action' => $this->generateUrl('caracteristicas_equipo_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new caracteristicas_equipo entity.
     *
     */
    public function newAction()
    {
        $entity = new caracteristicas_equipo();
        $form   = $this->createCreateForm($entity);

        return $this->render('EquipoBundle:caracteristicas_equipo:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a caracteristicas_equipo entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EquipoBundle:caracteristicas_equipo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find caracteristicas_equipo entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EquipoBundle:caracteristicas_equipo:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing caracteristicas_equipo entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EquipoBundle:caracteristicas_equipo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find caracteristicas_equipo entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EquipoBundle:caracteristicas_equipo:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a caracteristicas_equipo entity.
    *
    * @param caracteristicas_equipo $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(caracteristicas_equipo $entity)
    {
        $form = $this->createForm(new caracteristicas_equipoType(), $entity, array(
            'action' => $this->generateUrl('caracteristicas_equipo_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing caracteristicas_equipo entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EquipoBundle:caracteristicas_equipo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find caracteristicas_equipo entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('caracteristicas_equipo_edit', array('id' => $id)));
        }

        return $this->render('EquipoBundle:caracteristicas_equipo:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a caracteristicas_equipo entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('EquipoBundle:caracteristicas_equipo')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find caracteristicas_equipo entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('caracteristicas_equipo'));
    }

    /**
     * Creates a form to delete a caracteristicas_equipo entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('caracteristicas_equipo_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
