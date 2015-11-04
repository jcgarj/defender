<?php

namespace DsCorp\Equipo\EquipoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use DsCorp\Equipo\EquipoBundle\Entity\capacidad;
use DsCorp\Equipo\EquipoBundle\Form\capacidadType;

/**
 * capacidad controller.
 *
 */
class capacidadController extends Controller
{

    /**
     * Lists all capacidad entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('EquipoBundle:capacidad')->findAll();

        return $this->render('EquipoBundle:capacidad:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new capacidad entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new capacidad();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('capacidad_show', array('id' => $entity->getId())));
        }

        return $this->render('EquipoBundle:capacidad:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a capacidad entity.
     *
     * @param capacidad $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(capacidad $entity)
    {
        $form = $this->createForm(new capacidadType(), $entity, array(
            'action' => $this->generateUrl('capacidad_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new capacidad entity.
     *
     */
    public function newAction()
    {
        $entity = new capacidad();
        $form   = $this->createCreateForm($entity);

        return $this->render('EquipoBundle:capacidad:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a capacidad entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EquipoBundle:capacidad')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find capacidad entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EquipoBundle:capacidad:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing capacidad entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EquipoBundle:capacidad')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find capacidad entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EquipoBundle:capacidad:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a capacidad entity.
    *
    * @param capacidad $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(capacidad $entity)
    {
        $form = $this->createForm(new capacidadType(), $entity, array(
            'action' => $this->generateUrl('capacidad_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing capacidad entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EquipoBundle:capacidad')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find capacidad entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('capacidad_edit', array('id' => $id)));
        }

        return $this->render('EquipoBundle:capacidad:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a capacidad entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('EquipoBundle:capacidad')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find capacidad entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('capacidad'));
    }

    /**
     * Creates a form to delete a capacidad entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('capacidad_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
