<?php

namespace DsCorp\Equipo\EquipoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use DsCorp\Equipo\EquipoBundle\Entity\disco_duro;
use DsCorp\Equipo\EquipoBundle\Form\disco_duroType;

/**
 * disco_duro controller.
 *
 */
class disco_duroController extends Controller
{

    /**
     * Lists all disco_duro entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('EquipoBundle:disco_duro')->findAll();

        return $this->render('EquipoBundle:disco_duro:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new disco_duro entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new disco_duro();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('disco_duro_show', array('id' => $entity->getId())));
        }

        return $this->render('EquipoBundle:disco_duro:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a disco_duro entity.
     *
     * @param disco_duro $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(disco_duro $entity)
    {
        $form = $this->createForm(new disco_duroType(), $entity, array(
            'action' => $this->generateUrl('disco_duro_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new disco_duro entity.
     *
     */
    public function newAction()
    {
        $entity = new disco_duro();
        $form   = $this->createCreateForm($entity);

        return $this->render('EquipoBundle:disco_duro:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a disco_duro entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EquipoBundle:disco_duro')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find disco_duro entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EquipoBundle:disco_duro:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing disco_duro entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EquipoBundle:disco_duro')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find disco_duro entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EquipoBundle:disco_duro:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a disco_duro entity.
    *
    * @param disco_duro $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(disco_duro $entity)
    {
        $form = $this->createForm(new disco_duroType(), $entity, array(
            'action' => $this->generateUrl('disco_duro_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing disco_duro entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EquipoBundle:disco_duro')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find disco_duro entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('disco_duro_edit', array('id' => $id)));
        }

        return $this->render('EquipoBundle:disco_duro:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a disco_duro entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('EquipoBundle:disco_duro')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find disco_duro entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('disco_duro'));
    }

    /**
     * Creates a form to delete a disco_duro entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('disco_duro_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
