<?php

namespace DsCorp\Equipo\EquipoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use DsCorp\Equipo\EquipoBundle\Entity\equipo;
use DsCorp\Equipo\EquipoBundle\Form\equipoType;

/**
 * equipo controller.
 *
 */
class equipoController extends Controller
{

    /**
     * Lists all equipo entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('EquipoBundle:equipo')->findAll();

        return $this->render('EquipoBundle:equipo:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new equipo entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new equipo();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('equipo_show', array('id' => $entity->getId())));
        }

        return $this->render('EquipoBundle:equipo:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a equipo entity.
     *
     * @param equipo $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(equipo $entity)
    {
        $form = $this->createForm(new equipoType(), $entity, array(
            'action' => $this->generateUrl('equipo_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new equipo entity.
     *
     */
    public function newAction()
    {
        $entity = new equipo();
        $form   = $this->createCreateForm($entity);

        return $this->render('EquipoBundle:equipo:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a equipo entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EquipoBundle:equipo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find equipo entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EquipoBundle:equipo:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing equipo entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EquipoBundle:equipo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find equipo entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EquipoBundle:equipo:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a equipo entity.
    *
    * @param equipo $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(equipo $entity)
    {
        $form = $this->createForm(new equipoType(), $entity, array(
            'action' => $this->generateUrl('equipo_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing equipo entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EquipoBundle:equipo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find equipo entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('equipo_edit', array('id' => $id)));
        }

        return $this->render('EquipoBundle:equipo:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a equipo entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('EquipoBundle:equipo')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find equipo entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('equipo'));
    }

    /**
     * Creates a form to delete a equipo entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('equipo_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
