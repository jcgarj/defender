<?php

namespace DsCorp\Equipo\EquipoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use DsCorp\Equipo\EquipoBundle\Entity\procesador;
use DsCorp\Equipo\EquipoBundle\Form\procesadorType;

/**
 * procesador controller.
 *
 */
class procesadorController extends Controller
{

    /**
     * Lists all procesador entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('EquipoBundle:procesador')->findAll();

        return $this->render('EquipoBundle:procesador:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new procesador entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new procesador();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('procesador_show', array('id' => $entity->getId())));
        }

        return $this->render('EquipoBundle:procesador:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a procesador entity.
     *
     * @param procesador $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(procesador $entity)
    {
        $form = $this->createForm(new procesadorType(), $entity, array(
            'action' => $this->generateUrl('procesador_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new procesador entity.
     *
     */
    public function newAction()
    {
        $entity = new procesador();
        $form   = $this->createCreateForm($entity);

        return $this->render('EquipoBundle:procesador:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a procesador entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EquipoBundle:procesador')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find procesador entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EquipoBundle:procesador:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing procesador entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EquipoBundle:procesador')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find procesador entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EquipoBundle:procesador:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a procesador entity.
    *
    * @param procesador $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(procesador $entity)
    {
        $form = $this->createForm(new procesadorType(), $entity, array(
            'action' => $this->generateUrl('procesador_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing procesador entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EquipoBundle:procesador')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find procesador entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('procesador_edit', array('id' => $id)));
        }

        return $this->render('EquipoBundle:procesador:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a procesador entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('EquipoBundle:procesador')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find procesador entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('procesador'));
    }

    /**
     * Creates a form to delete a procesador entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('procesador_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
