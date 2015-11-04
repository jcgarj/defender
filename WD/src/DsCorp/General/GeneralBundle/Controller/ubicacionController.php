<?php

namespace DsCorp\General\GeneralBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use DsCorp\General\GeneralBundle\Entity\ubicacion;
use DsCorp\General\GeneralBundle\Form\ubicacionType;

/**
 * ubicacion controller.
 *
 */
class ubicacionController extends Controller
{

    /**
     * Lists all ubicacion entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('GeneralBundle:ubicacion')->findAll();

        return $this->render('GeneralBundle:ubicacion:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new ubicacion entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new ubicacion();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('ubicacion_show', array('id' => $entity->getId())));
        }

        return $this->render('GeneralBundle:ubicacion:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a ubicacion entity.
     *
     * @param ubicacion $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(ubicacion $entity)
    {
        $form = $this->createForm(new ubicacionType(), $entity, array(
            'action' => $this->generateUrl('ubicacion_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new ubicacion entity.
     *
     */
    public function newAction()
    {
        $entity = new ubicacion();
        $form   = $this->createCreateForm($entity);

        return $this->render('GeneralBundle:ubicacion:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ubicacion entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GeneralBundle:ubicacion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ubicacion entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('GeneralBundle:ubicacion:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ubicacion entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GeneralBundle:ubicacion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ubicacion entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('GeneralBundle:ubicacion:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a ubicacion entity.
    *
    * @param ubicacion $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(ubicacion $entity)
    {
        $form = $this->createForm(new ubicacionType(), $entity, array(
            'action' => $this->generateUrl('ubicacion_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing ubicacion entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GeneralBundle:ubicacion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ubicacion entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('ubicacion_edit', array('id' => $id)));
        }

        return $this->render('GeneralBundle:ubicacion:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a ubicacion entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('GeneralBundle:ubicacion')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ubicacion entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('ubicacion'));
    }

    /**
     * Creates a form to delete a ubicacion entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ubicacion_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
